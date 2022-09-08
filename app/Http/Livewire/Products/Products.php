<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $productName = '';
    public $selectedItem, $action, $productEdit;

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
            $this->productEdit = $text;
            $this->dispatchBrowserEvent('openEditModal');
        } elseif ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function saveProduct()
    {
        Product::create([
            'name' => $this->productName,
        ]);
        $this->productName = null;
        flash()->addSuccess('Novo produto adicionado com sucesso!');
    }
    public function editProduct()
    {
        Product::find($this->selectedItem)->update([
            'name' => $this->productEdit,
        ]);
        flash()->addSuccess('Produto atualizado com sucesso!');
    }
    public function deleteProduct()
    {
        Product::destroy($this->selectedItem);
        flash()->addSuccess('Produto deletado com sucesso!');
    }

    public function render()
    {
        return view('livewire.products.products', [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ])->layout('layouts.dashboard');
    }
}
