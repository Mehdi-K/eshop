<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
// use Livewire\WithFileUploads;

class IndexUsers extends Component
{
    // use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $role;

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.users.index-users', ['users'=>$users ])->layout('layouts.base');
    }

    public function mount()
    {
        // Initializing the Object.
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User was updated successfuly !');
        return redirect(route('admin_users'));

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User was deleted successfuly !');
        return redirect(route('admin_users'));
    }
        
    public function closeModal()
    {
        return redirect(route('admin_users'));
    }

}
