<?php

namespace App\Livewire\Application;

use App\Models\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class ApplicationPage extends Component
{
    public $applications;

    #[On('application-created')] 
    public function mount()
    {
        $this->applications = Application::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.application.application-page');
    }
}
