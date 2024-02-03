<?php

namespace App\Livewire\Application;

use App\Models\Application;
use Livewire\Component;

class ApplicationPage extends Component
{
    public $applications;

    public function mount()
    {
        $this->applications = Application::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.application.application-page');
    }
}
