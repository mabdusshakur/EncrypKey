<?php

namespace App\Livewire\Application\License;

use App\Models\License;
use Livewire\Component;

class LicenseCreate extends Component
{
    public $license_key, $expires_at;
    public $application;

    protected $rules = [
        'license_key' => 'required',
        'expires_at' => 'required|date'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createLicense()
    {
        $this->validate();

        $created = License::create([
            'license_key' => $this->license_key,
            'expires_at' => $this->expires_at,
            'application_id' => $this->application->id,
        ]);
        if(!$created) {
            session()->flash('error', 'License could not be created');
            return;
        }
        session()->flash('success', 'License created successfully');
        $this->reset('license_key', 'expires_at');
        $this->dispatch('license-created');
    }
    public function render()
    {
        return view('livewire.application.license.license-create');
    }
}
