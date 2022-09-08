<?php

namespace App\Http\Livewire\Home;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function mount()
    {
        $this->products = Product::all()->count();
        $this->categorys = Category::all()->count();
        $this->brands = Brand::all()->count();
        $this->users = User::all()->count();
        $this->permissions = Permission::all()->count();
    }

    public function render()
    {
        return view('livewire.home.home')->layout('layouts.dashboard');
    }
}
