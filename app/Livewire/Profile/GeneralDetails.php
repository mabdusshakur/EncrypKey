<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class GeneralDetails extends Component
{
    public $name, $email, $owner_id, $authUser;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email',
        'owner_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $authUser = auth()->user();
        $this->name = $authUser->name;
        $this->email = $authUser->email;
        $this->owner_id = $authUser->owner_id;
        $this->authUser = $authUser;
    }

    public function generateOwnerId()
    {
        $owner_id = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
        $this->owner_id = $owner_id;
    }

    public function updateGeneralDetails()
    {
        try {
            $this->validate();
            $updated = $this->authUser->update([
                'name' => $this->name,
                'email' => $this->email,
                'owner_id' => $this->owner_id,
            ]);
            if (!$updated) {
                session()->flash('error', 'Something went wrong.');
                return;
            }
            session()->flash('success', 'General details updated successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.profile.general-details');
    }
}
