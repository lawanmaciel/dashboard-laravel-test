<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;
use Illuminate\Database\QueryException;

class PermissionsCreate extends Component
{

    public $permission = [
        'name' => '',
        'permissions' => [
            'users' => [
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1
            ],
            'permissions' => [
                'view' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1
            ],
            'products' => [
                'view' => 0,
                'create' => 0,
                'edit' => 0,
                'delete' => 0
            ],
            'categories' => [
                'view' => 0,
                'create' => 0,
                'edit' => 0,
                'delete' => 0
            ],
            'brands' => [
                'view' => 0,
                'create' => 0,
                'edit' => 0,
                'delete' => 0
            ],
        ],
    ];

    protected $rules = [
        'permission.name' => 'required',
    ];
    protected $messages = [
        'permission.name.required' => 'O nome não pode ser nulo.',
    ];

    public function save()
    {
        $this->validate();
        Permission::create([
            'name' => $this->permission['name'],
            'permissions' => json_encode($this->permission['permissions'])
        ]);
        flash()->addSuccess('Permissão atualizada com sucesso!');
        return redirect()->route('dashboard.permissions');
    }

    public function render()
    {
        return view('livewire.permissions.permissions-create')->layout('layouts.dashboard');
    }
}
