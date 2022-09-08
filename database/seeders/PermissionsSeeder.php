<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $admin = [
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
    ];
    public $comum = [
        'users' => [
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 0
        ],
        'permissions' => [
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 0
        ],
        'products' => [
            'view' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1
        ],
        'categories' => [
            'view' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1
        ],
        'brands' => [
            'view' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1
        ],
    ];

    public function run()
    {
        Permission::create([
            'name' => 'Administrador',
            'permissions' => json_encode($this->admin),
        ]);
        Permission::create([
            'name' => 'Comum',
            'permissions' => json_encode($this->comum),
        ]);
    }
}
