<?php

namespace App\Livewire\Application\License;

use Livewire\Component;

class LicenseIndex extends Component
{
    public $license;
    public function render()
    {
        return view('livewire.application.license.license-index');
    }
}
