<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationCart extends Component
{
    public $notificationOpen = 'false';
    public $notificationText = '';

    protected $listeners = ['productAddedToCart'];

    public function productAddedToCart($producName)
    {
        $this->notificationOpen = 'true';
        $this->notificationText = $producName;
    }

    public function render()
    {
        return view('livewire.notification-cart');
    }
}
