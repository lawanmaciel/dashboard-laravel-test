<?php

namespace App\Http\Livewire\Users;

use App\Models\Permission;
use App\Models\User;
use Livewire\Component;

class UsersEdit extends Component
{
    public $user =  [];
    public $password, $password_confirm;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'password' => 'nullable|min:6',
        'password_confirm' => 'required_with:password|same:password',
    ];

    protected $messages = [
        'password.min' => 'É nescessário pelo menos 6 caracteres.',
        'password_confirm.required_with' => 'As senhas precisam ser iguais.',
        'required' => 'Este campo não pode ser nulo.'
    ];

    public function mount($id)
    {
        $this->userFind = User::find($id);
        $this->user = [
            'name' => $this->userFind->name,
            'email' => $this->userFind->email,
            'permission_id' => $this->userFind->permission_id,
        ];
        $this->permissions = Permission::all();
    }

    public function save()
    {
        $this->validate();
        if ($this->password && $this->password_confirm != null) {
            $this->userFind->update([
                'name' => $this->user['name'],
                'password' => bcrypt($this->user['password']),
                'permission_id' => $this->user['permission_id']
            ]);
            flash()->addSuccess('Usuário atualizado com sucesso!');
            return redirect()->route('dashboard.users');
        } else {
            $this->userFind->update([
                'name' => $this->user['name'],
                'permission_id' => $this->user['permission_id']
            ]);
            flash()->addSuccess('Usuário atualizado com sucesso!');
            return redirect()->route('dashboard.users');
        }
    }

    public function render()
    {
        return view('livewire.users.users-edit')->layout('layouts.dashboard');
    }
}
