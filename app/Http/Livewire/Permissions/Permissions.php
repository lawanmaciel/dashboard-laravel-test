<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Permission;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Permissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selectedItem;

    public function selectItem($itemId)
    {
        $this->selectedItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }
    public function delete()
    {
        $permissions = User::where('permission_id', '=', $this->selectedItem)->count();
        if ($permissions > 0) {
            flash()->addError('Existem usuários que usam essa permissão!');
        } else {
            Permission::destroy($this->selectedItem);
            flash()->addSuccess('Permissão deletada com sucesso!');
        }
    }

    public function render()
    {
        return view('livewire.permissions.permissions', [
            'permissions' => Permission::where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ])->layout('layouts.dashboard');
    }
}
