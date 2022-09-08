<div>
    <x-detail-page title="Cadastro de usuário" subtitle="Cadastre um novo usuário no sistema." />
    <div class="content">
        <div class="block block-rounded">
            <div class="block-content">
                <div class="row row-cols-2">
                    <div class="col mb-4">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control form-control-alt" wire:model="name"
                            placeholder="Exemplo: Fulano da Silva">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Permissão</label>
                        <select class="form-select form-control-alt" wire:model="permission">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" wire:model="email"
                            placeholder="Exemplo: google@google.com">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control form-control-alt" wire:model="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control form-control-alt" wire:model="password_confirm">
                        @if ($errors->has('password_confirm'))
                            <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary text-white" wire:click="save()">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
