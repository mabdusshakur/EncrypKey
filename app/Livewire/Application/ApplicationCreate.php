<?php

namespace App\Livewire\Application;

use App\Models\Application;
use Livewire\Component;

class ApplicationCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createApp()
    {
        try {
            $this->validate();
            $created = Application::create([
                'name' => $this->name,
                'secret' => sha1(time()),
                'user_id' => auth()->id(),
            ]);
            if (!$created) {
                session()->flash('error', 'Application could not be created');
            }
            session()->flash('success', 'Application created successfully');
            $this->reset('name');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.application.application-create');
    }
}
