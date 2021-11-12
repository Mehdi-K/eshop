<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminProfile extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-profile')->layout('layouts.base');
    }
}
