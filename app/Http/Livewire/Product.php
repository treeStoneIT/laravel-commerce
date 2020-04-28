<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Treestoneit\ShoppingCart\Facades\Cart;

class Product extends Component
{

    public $product;
    public $qty = 1;
    public $note = '';

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function decreaseQty()
    {
        if ($this->qty > 1){
            $this->qty--;
        }
    }

    public function increaseQty()
    {
        $this->qty++;
    }


    public function addToCart()
    {
        Cart::add($this->product, $this->qty, ['product_note' => $this->note]);
        $this->emit('productAddedToCart',$this->product->name);
        $this->refreshCartContents();
        $this->qty = 1;
        $this->note = '';
    }

    public function refreshCartContents()
    {
        $this->emit('refreshCartContents');
    }
}
