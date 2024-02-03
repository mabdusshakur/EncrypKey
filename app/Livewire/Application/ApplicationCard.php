<?php

namespace App\Livewire\Application;

use Livewire\Component;

class ApplicationCard extends Component
{
    public $application;
    public function render()
    {
        return view('livewire.application.application-card');
    }
}
