<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Welcome extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user || !Hash::check($this->password, $user->password)) {
            $this->addError('email', 'Invalid credentials');
            return;
        }

        // ✅ Session login
        session([
            'admin_logged_in' => true,
            'admin_id' => $user->id,
            'admin_name' => $user->name,
        ]);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
