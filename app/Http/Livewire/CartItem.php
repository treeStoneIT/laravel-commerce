<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Treestoneit\ShoppingCart\Facades\Cart as CartFacade;

class CartItem extends Component
{
    public $item;
    public $even;

    protected $listeners = ['refreshItems' => 'refreshCartItem'];

    public function mount($item, $even)
    {
        $this->item = $item;
        $this->even = $even;
    }

    public function render()
    {
        return view('livewire.cart-item');
    }

    public function refreshCartItem()
    {
        // refresh
    }

    public function decreaseQty()
    {
        if ($this->item->quantity === 1){
            $this->removeItem();
        } else {
            CartFacade::update($this->item->id, $this->item->quantity - 1);
            $this->refreshCartContents();
        }
    }

    public function increaseQty()
    {
        CartFacade::update($this->item->id, $this->item->quantity + 1);
        $this->refreshCartContents();
    }

    public function removeItem()
    {
        CartFacade::remove($this->item->id);
        $this->refreshCartContents();
    }

    public function refreshCartContents()
    {
        $this->emitUp('refreshCartContents');
    }
}
