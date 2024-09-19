<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class CreateUser extends Component
{
    use WithPagination;
    #[Rule('required', 'min:6')]
    public $name;
    #[Rule('required', 'email')]
    public $email;
    #[Rule('required','min:2')]
    public $password;

    public function create()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        // users = User
    }
    public function render()
    {
        return view('livewire.create-user', [
            'count' => User::count(),
            'users' => User::paginate(2)
            // 'users'=> User::orderBy('created_at','desc')->paginate(2),
        ]);
    }
}
