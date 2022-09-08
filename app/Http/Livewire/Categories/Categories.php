<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $categoryName = '';
    public $selectedItem, $action, $categoryEdit;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function selectItem($itemId, $action, $text = null)
    {
        $this->selectedItem = $itemId;

        if ($action == 'edit') {
            $this->categoryEdit = $text;
            $this->dispatchBrowserEvent('openEditModal');
        } elseif ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function saveCategory()
    {
        Category::create([
            'name' => $this->categoryName,
        ]);
        $this->categoryName = null;
        flash()->addSuccess('Novo Categoria adicionado com sucesso!');
    }
    public function editCategory()
    {
        Category::find($this->selectedItem)->update([
            'name' => $this->categoryEdit,
        ]);
        flash()->addSuccess('Categoria atualizado com sucesso!');
    }
    public function deleteCategory()
    {
        Category::destroy($this->selectedItem);
        flash()->addSuccess('Categoria deletado com sucesso!');
    }

    public function render()
    {
        return view('livewire.categories.categories', [
            'categories' => Category::where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ])->layout('layouts.dashboard');
    }
}
