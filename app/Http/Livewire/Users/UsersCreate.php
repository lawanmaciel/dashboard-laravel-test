<?php

namespace App\Http\Livewire\Users;

use App\Models\Permission;
use App\Models\User;
use Livewire\Component;

class UsersCreate extends Component
{
    public $name, $email, $password, $password_confirm;
    public $permission = 1;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:6',
        'password_confirm' => 'required_with:password|same:password',
    ];

    protected $messages = [
        'password.min' => 'É nescessário pelo menos 6 caracteres.',
        'password_confirm.required_with' => 'As senhas precisam ser iguais.',
        'required' => 'Este campo não pode ser nulo.'
    ];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function save()
    {
        $this->validate();
        $verifyEmail =  User::where('email', '=', $this->email)->first();
        if ($this->password && $this->password_confirm != null && $verifyEmail == false) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'permission_id' => $this->permission
            ]);
            flash()->addSuccess('Usuário cadastrado com sucesso!');
            return redirect()->route('dashboard.users');
        } else {
            flash()->addError('Existe um usuário com este e-mail!');
        }
    }

    public function render()
    {
        return view('livewire.users.users-create')->layout('layouts.dashboard');
    }
}
