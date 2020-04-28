<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SimpleNotification extends Component
{
    public $notificationOpen = 'false';
    public $notificationTitle = 'test';
    public $notificationText = 'test';

    protected $listeners = ['showNotification'];

    public function showNotification($title, $msg)
    {
        $this->notificationOpen = 'true';
        $this->notificationTitle = $title;
        $this->notificationText = $msg;
    }

    public function mount()
    {
        if (session()->has('success')) {
            $this->notificationOpen = 'true';
            $this->notificationTitle = "Success";
            $this->notificationText = session('success');
        }

        if (session()->has('error-message')) {
            $this->notificationOpen = 'true';
            $this->notificationTitle = "Error";
            $this->notificationText = session('error-message');
        }
    }


    public function render()
    {
        return view('livewire.simple-notification');
    }
}
