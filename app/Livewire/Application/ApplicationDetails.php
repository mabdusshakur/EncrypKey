<?php

namespace App\Livewire\Application;

use Livewire\Component;

class ApplicationDetails extends Component
{
    public $name, $secret, $owner_id;
    public $application;

    public function mount($application)
    {
        $this->application = $application;
        $this->name = $application->name;
        $this->secret = $application->secret;
        $this->owner_id = $application->user->owner_id;
    }

    public function render()
    {
        return view('livewire.application.application-details');
    }
}
