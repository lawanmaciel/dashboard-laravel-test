<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class PermissionsEdit extends Component
{

    public $permission = [
        'name' => '',
        'permissions' => [],
    ];

    protected $rules = [
        'permission.name' => 'required',
    ];
    protected $messages = [
        'permission.name.required' => 'O nome não pode ser nulo.',
    ];

    public function mount($id)
    {
        $this->permissions = Permission::find($id);
        $this->permission = [
            'name' => $this->permissions->name,
            'permissions' => json_decode($this->permissions->permissions, true),
        ];
    }

    public function save()
    {
        $this->permissions->update([
            'name' => $this->permission['name'],
            'permissions' => $this->permission['permissions']
        ]);
        flash()->addSuccess('Permissão atualizada com sucesso!');
        return redirect()->route('dashboard.permissions');
    }

    public function render()
    {
        return view('livewire.permissions.permissions-edit')->layout('layouts.dashboard');
    }
}
