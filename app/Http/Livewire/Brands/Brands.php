<?php

namespace App\Http\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $brandName = '';
    public $selectedItem, $action, $brandEdit;

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
            $this->brandEdit = $text;
            $this->dispatchBrowserEvent('openEditModal');
        } elseif ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function saveBrand()
    {
        Brand::create([
            'name' => $this->brandName,
        ]);
        $this->brandName = null;
        flash()->addSuccess('Novo marca adicionada com sucesso!');
    }
    public function editBrand()
    {
        Brand::find($this->selectedItem)->update([
            'name' => $this->brandEdit,
        ]);
        flash()->addSuccess('Marca atualizada com sucesso!');
    }
    public function deleteBrand()
    {
        Brand::destroy($this->selectedItem);
        flash()->addSuccess('Marca deletada com sucesso!');
    }

    public function render()
    {
        return view('livewire.brands.brands', [
            'brands' => Brand::where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ])->layout('layouts.dashboard');
    }
}
