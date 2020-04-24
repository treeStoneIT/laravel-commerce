<?php

namespace App\Http\Livewire;

use App\DeliveryMethod;
use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeCheckoutSession;
use Treestoneit\ShoppingCart\Facades\Cart;

class OrderForm extends Component
{
    public $deliveryMethodOptions;
    public $cartContentCount;
    public $delivery_method = 1;
    public $name = '';
    public $tel = '';
    public $email = '';
    public $address = '';
    public $comments = '';

    protected $listeners = ['refreshItems'];

    public function refreshItems()
    {
        $this->cartContentCount = Cart::count();
    }

    public function mount()
    {
        $this->deliveryMethodOptions = DeliveryMethod::all()
                                                     ->pluck('label', 'id')
                                                     ->toArray();
        $this->cartContentCount      = Cart::count();

        if ($orderFormData = session('order-form')) {
            $this->delivery_method = $orderFormData['delivery_method'];
            $this->name            = $orderFormData['name'];
            $this->tel             = $orderFormData['tel'];
            $this->email           = $orderFormData['email'];
            $this->address         = $orderFormData['address'];
            $this->comments        = $orderFormData['comments'];
        }
    }

    public function render()
    {
        return view('livewire.order-form');
    }

    public function validateForm()
    {
        $validatedData = $this->validate([
            'delivery_method' => 'required',
            'name'            => 'required',
            'tel'             => 'required',
            'email'           => 'required|email',
            'address'         => 'required',
            'comments'        => 'nullable',
        ]);

        session(['order-form' => $validatedData]);
    }

    public function store()
    {
        $this->validateForm();
        $this->stripeSessionCreate();
    }

    public function stripeSessionCreate()
    {
        $cartContent      = Cart::content();

        $cartProducts = [];
        foreach ($cartContent as $lineItem) {
            $product = [
                'name'        => $lineItem['buyable']['name'] . " - (" . $lineItem['buyable']['id'] . ")",
                'amount'      => bcmul($lineItem['price'], 100),
                'currency'    => config('services.stripe.currency'),
                'quantity'    => $lineItem['quantity'],
            ];

            // stripe doesn't like empty params so we only include if there is a value
            if (!empty($lineItem['options']['product_note'])){
                $product['description'] = $lineItem['options']['product_note'];
            }

            $cartProducts[] = $product;
        }

        // add tax
        $cartProducts[] = [
            'name'        => "TAX",
            'description' => "HST",
            'amount'      => bcmul(Cart::tax(), 100),
            'currency'    => config('services.stripe.currency'),
            'quantity'    => 1,
        ];

        // delivery charges if needed
        if ($this->delivery_method == 2){
            $cartProducts[] = [
                'name'        => "Delivery Fee",
                'description' => "Local Delivery",
                'amount'      => 1000,
                'currency'    => config('services.stripe.currency'),
                'quantity'    => 1,
            ];
            $cartProducts[] = [
                'name'        => "Tax on Delivery Service",
                'description' => "HST",
                'amount'      => 130,
                'currency'    => config('services.stripe.currency'),
                'quantity'    => 1,
            ];
        }

        Stripe::setApiKey(config('services.stripe.sk'));

        $session = StripeCheckoutSession::create([
            'payment_intent_data' => [
                'setup_future_usage' => 'off_session',
                'capture_method' => 'manual',
            ],
            'payment_method_types' => ['card'],
            'line_items'           => $cartProducts,
            'success_url'          => route('payment.success')."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url'           => route('cart'),
        ]);

        session(['stripeCheckSes' => $session]);

        $this->emit('stripe-payment', $session->id);
    }
}
