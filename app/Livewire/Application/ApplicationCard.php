<?php

namespace App\Livewire\Application;

use Livewire\Component;

class ApplicationCard extends Component
{
    public $application;

    public function showApplication()
    {
        return redirect()->route('application.show', $this->application);
    }
    public function render()
    {
        return view('livewire.application.application-card');
    }
}
