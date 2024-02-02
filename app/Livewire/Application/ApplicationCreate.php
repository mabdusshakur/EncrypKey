<?php

namespace App\Livewire\Application;

use Livewire\Component;

class ApplicationCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createApp()
    {
        $this->validate();
        // Create application
    }
    
    public function render()
    {
        return view('livewire.application.application-create');
    }
}
