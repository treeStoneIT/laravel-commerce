<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Treestoneit\ShoppingCart\Facades\Cart as CartFacade;

class Cart extends Component
{
    public $cartContent;
    public $cartSubtotal;
    public $cartTax;
    public $cartTotal;

    protected $listeners = ['refreshCartContents'];

    public function mount()
    {
        $this->cartContent = CartFacade::content()
                                       ->loadMissing('buyable.unit');

        $this->cartSubtotal = CartFacade::subtotal();
        $this->cartTax = CartFacade::tax();
        $this->cartTotal = $this->cartSubtotal + $this->cartTax;
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function refreshCartContents()
    {
        $this->cartContent = CartFacade::content()
                                       ->loadMissing('buyable.unit');

        $this->cartSubtotal = CartFacade::subtotal();
        $this->cartTax = CartFacade::tax();
        $this->cartTotal = $this->cartSubtotal + $this->cartTax;
    }

    public function hydrate()
    {
        $this->emit('refreshItems');
    }
}
