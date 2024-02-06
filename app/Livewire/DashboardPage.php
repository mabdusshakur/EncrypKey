<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\License;
use Livewire\Component;

class DashboardPage extends Component
{
    public $application_count, $license_count;

    public function mount()
    {
        $this->application_count = Application::where('user_id', auth()->id())->count();
        $applicationIds = auth()->user()->applications->pluck('id');
        $this->license_count = License::whereIn('application_id', $applicationIds)->count();
    }
    public function render()
    {
        return view('livewire.dashboard-page');
    }
}
