<?php

namespace App\Http\Livewire;

use App\DeliveryMethod;
use App\Order;
use App\OrderItem;
use Livewire\Component;
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
    }

    public function render()
    {
        return view('livewire.order-form');
    }

    public function validateForm()
    {
        $this->validate([
            'delivery_method' => 'required',
            'name'            => 'required',
            'tel'             => 'required',
            'email'           => 'required|email',
            'address'         => 'required',
            'comments'        => 'nullable',
        ]);
    }

    public function store()
    {
        $this->validateForm();

        $cartContent      = Cart::content();
        $cartContentArray = $cartContent->toArray();

        $cartProducts     = [];
        foreach ($cartContent as $lineItem) {
            $cartProducts[] = [
                'id'       => $lineItem['buyable']['id'],
                'name'     => $lineItem['buyable']['name'],
                'qty'      => $lineItem['quantity'],
                'price'    => $lineItem['price'],
                'subtotal' => $lineItem['subtotal'],
                'options'  => $lineItem['options']
            ];
        }


        $cartSubtotal = Cart::subtotal();
        $cartTax      = Cart::tax();

        $order = Order::create([
            'order_status_id'    => 1,
            'delivery_method_id' => $this->delivery_method,
            'name'               => $this->name,
            'tel'                => $this->tel,
            'email'              => $this->email,
            'address'            => $this->address,
            'note'               => $this->comments,
            'products'           => json_encode($cartProducts),
            'subtotal'           => $cartSubtotal,
            'tax'                => $cartTax,
            'total'              => $cartSubtotal + $cartTax,
        ]);

        foreach ($cartProducts as $cartProduct) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $cartProduct['id'],
                'qty'          => $cartProduct['qty'],
                'price'        => $cartProduct['price'],
                'product_note' => $cartProduct['options']['product_note']
            ]);
        }


//        session()->flash('status', "<em>{$this->first_name} {$this->last_name}</em> was successfully added to the portal");
//        session(["$person->hashed_id" => true]);

//        return redirect()->to(route('view-person', $person->hashed_id));
    }
}
