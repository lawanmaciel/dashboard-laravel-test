<div>
    <x-detail-page title="Edição de permissão" subtitle="Edite as permissões abaixo." />
    <div class="content">
        <div class="bg-body-light p-3 mb-4">
            <div class="mb-4">
                <input type="text" class="form-control" placeholder="Nome" wire:model="permission.name">
                @error('permission.name') <span class="text-city">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="mb-4 col-6">
                    <label class="form-label">Usuários (users)</label>
                    <div class="space-x-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.users.view" />
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.users.create" />
                            <label class="form-check-label">Create</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.users.edit" />
                            <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.users.delete" />
                            <label class="form-check-label">Delete</label>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label">Permissões (permissions)</label>
                    <div class="space-x-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.permissions.view" />
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.permissions.create" />
                            <label class="form-check-label">Create</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.permissions.edit" />
                            <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.permissions.delete" />
                            <label class="form-check-label">Delete</label>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label">Produtos (products)</label>
                    <div class="space-x-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.products.view" />
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.products.create" />
                            <label class="form-check-label">Create</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.products.edit" />
                            <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.products.delete" />
                            <label class="form-check-label">Delete</label>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label">Categorias (categories)</label>
                    <div class="space-x-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.categories.view" />
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.categories.create" />
                            <label class="form-check-label">Create</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.categories.edit" />
                            <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.categories.delete" />
                            <label class="form-check-label">Delete</label>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-6">
                    <label class="form-label">Marcas (brands)</label>
                    <div class="space-x-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.brands.view" />
                            <label class="form-check-label">View</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.brands.create" />
                            <label class="form-check-label">Create</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.brands.edit" />
                            <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"
                                wire:model="permission.permissions.brands.delete" />
                            <label class="form-check-label">Delete</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" wire:click="save()">Atualizar</button>
            </div>
        </div>
    </div>
</div>
