<?php

namespace App\Livewire\Application\License;

use App\Models\License;
use Livewire\Attributes\On;
use Livewire\Component;

class LicenseIndex extends Component
{
    public $licenses;
    public $application;

    #[On('license-created')]
    public function mount()
    {
        $this->licenses = License::where('application_id', $this->application->id)->get();
    }
    public function render()
    {
        return view('livewire.application.license.license-index');
    }
}
