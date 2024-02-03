<?php

namespace App\Livewire\Application;

use App\Models\Application;
use Livewire\Component;

class ApplicationShow extends Component
{
    public $application;
    public function mount($application)
    {
        $this->application = Application::find($application);
        $isUserAuthorized = auth()->user()->id === $this->application->user_id;
        if (!$isUserAuthorized) {
            return redirect()->route('applications');
        }
    }
    public function render()
    {
        return view('livewire.application.application-show');
    }
}
