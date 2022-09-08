<?php

use App\Http\Livewire\Brands\Brands;
use App\Http\Livewire\Categories\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Permissions\{Permissions, PermissionsCreate, PermissionsEdit};
use App\Http\Livewire\Products\Products;
use App\Http\Livewire\Users\{Users, UsersCreate, UsersEdit};

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', Home::class)->name('dashboard');
    Route::get('/products', Products::class)->middleware(['permissions:products,view'])->name('dashboard.products');
    Route::get('/categories', Categories::class)->middleware(['permissions:categories,view'])->name('dashboard.categories');
    Route::get('/brands', Brands::class)->middleware(['permissions:brands,view'])->name('dashboard.brands');
    Route::get('/users', Users::class)->middleware(['permissions:users,view'])->name('dashboard.users');
    Route::get('/users/create', UsersCreate::class)->middleware(['permissions:users,create'])->name('dashboard.users.create');
    Route::get('/users/edit/{id}', UsersEdit::class)->middleware(['permissions:users,edit'])->name('dashboard.users.edit');
    Route::get('/permissions', Permissions::class)->middleware(['permissions:permissions,view'])->name('dashboard.permissions');
    Route::get('/permissions/create', PermissionsCreate::class)->middleware(['permissions:permissions,edit'])->name('dashboard.permissions.create');
    Route::get('/permissions/edit/{id}', PermissionsEdit::class)->middleware(['permissions:permissions,edit'])->name('dashboard.permissions.edit');
});
