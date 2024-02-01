<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeAvatar extends Component
{
    use WithFileUploads;

    public $avatar;
    protected $rules = [
        'avatar' => 'required|image|max:1024',
    ];
    public function changeAvatar()
    {
        try {
            $this->validate();
            $user = auth()->user();
            if ($user->avatar) {
                if (file_exists(public_path('storage/' . $user->avatar))) {
                    unlink(public_path('storage/' . $user->avatar));
                }
            }
            $updated = $user->update([
                'avatar' => $this->avatar->storeAs('avatars', rand(1000, 10000) . '-' . time() . '.' . $this->avatar->getClientOriginalExtension(), 'public')
            ]);
            if (!$updated) {
                session()->flash('error', 'Something went wrong.');
                return;
            }
            session()->flash('success', 'Avatar changed successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.profile.change-avatar');
    }
}
