<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeCheckoutSession;
use Treestoneit\ShoppingCart\Facades\Cart;

class PaymentController extends Controller
{
    public function success(Request $request)
    {

        $request->validate(['session_id' => 'required']);
        $sessionID = $request->get('session_id');

        Stripe::setApiKey(config('services.stripe.sk'));

        try {
            $checkoutSession = StripeCheckoutSession::retrieve($sessionID);
            $payment_intent  = $checkoutSession->payment_intent;

            $this->processOrder($payment_intent);

            Cart::destroy();
            session()->forget(['order-form', 'stripeCheckSes']);
            return redirect()->route('categories');

        } catch (ApiErrorException $e) {
            return redirect()->route('cart');
        }
    }

    public function cancel()
    {
        Cart::destroy();
        session()->forget(['order-form', 'stripeCheckSes']);

        return redirect()->route('categories');
    }

    public function processOrder($payment_intent)
    {
        $cartContent      = Cart::content();

        $cartProducts = [];
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

        $orderFormData = session('order-form');

        $order = Order::create([
            'order_status_id'    => 1,
            'delivery_method_id' => $orderFormData['delivery_method'],
            'name'               => $orderFormData['name'],
            'tel'                => $orderFormData['tel'],
            'email'              => $orderFormData['email'],
            'address'            => $orderFormData['address'],
            'note'               => $orderFormData['comments'],
            'products'           => json_encode($cartProducts),
            'subtotal'           => $cartSubtotal,
            'tax'                => $cartTax,
            'total'              => $cartSubtotal + $cartTax,
            'paid_date'          => now(),
            'paid_detail'        => "Stripe PI: " . $payment_intent,
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
    }
}
