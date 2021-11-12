<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Uploads extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {
        $this->validate([
            'photo' => 'required', // 1MB Max
        ]);

        Storage::disk('local')->put($this->photo, 'Contents');

        // $this->photo->store('files', 'public');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'file|max:1024', // 1MB Max
        ]);
        
    }

    public function render()
    {
        // $this->photo = "my PHoto";
        return view('livewire.uploads')->layout('layouts.base');
    }
}
