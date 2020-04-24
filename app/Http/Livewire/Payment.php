<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Treestoneit\ShoppingCart\Facades\Cart;

class Payment extends Component
{
    public $cartContent;
    public $cartContentCount;

    protected $listeners = ['refreshItems'];

    public function refreshItems()
    {
        $this->cartContent     = Cart::content();
        $this->cartContentCount = $this->cartContent->count();

    }

    public function mount()
    {
        $this->cartContent     = Cart::content();
        $this->cartContentCount = $this->cartContent->count();
    }


    public function render()
    {
        return view('livewire.payment');
    }
}
