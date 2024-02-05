<?php

namespace App\Livewire\Application\License;

use App\Models\License;
use Livewire\Attributes\On;
use Livewire\Component;

class LicenseIndex extends Component
{
    public $licenses;
    public $application;

    #[On(['license-created', 'license-deleted', 'license-banned', 'license-unbanned'])]
    public function mount()
    {
        $this->licenses = License::where('application_id', $this->application->id)->get();
    }

    public function unbanLicense($id)
    {
        $license = License::find($id);
        if ($license) {
            $license->update([
                'is_banned' => false,
                'ban_reason' => null,
                'banned_at' => null
            ]);
            $this->dispatch('license-unbanned');
            session()->flash('success', 'License unbanned successfully');
        }
    }

    public function banLicense($id)
    {
        $license = License::find($id);
        if ($license) {
            $license->update([
                'is_banned' => true,
                'ban_reason' => 'Banned by Admin',
                'banned_at' => now()
            ]);
            $this->dispatch('license-banned');
            session()->flash('success', 'License banned successfully');
        }
    }

    public function deleteLicense($id)
    {
        $license = License::find($id);
        if ($license) {
            $license->delete();
            $this->dispatch('license-deleted');
            session()->flash('success', 'License deleted successfully');
        }
    }
    
    public function render()
    {
        return view('livewire.application.license.license-index');
    }
}
