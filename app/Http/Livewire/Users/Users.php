<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete()
    {
        if (Auth::user()->id != $this->selectedItem) {
            User::destroy($this->selectedItem);
            flash()->addSuccess('Usuário deletado com sucesso!');
        } else {
            flash()->addError('Você não pode deletar seu próprio usuário!');
        }
    }

    public function render()
    {
        return view('livewire.users.users', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ])->layout('layouts.dashboard');
    }
}
