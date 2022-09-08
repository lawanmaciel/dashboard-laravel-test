<div>
    <x-detail-page title="Edição de usuário" subtitle="Edite um novo usuário no sistema." />
    <div class="content">
        <div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="flex-grow-1 me-3">
                <p class="mb-0">
                    <strong>OBS:</strong> Caso esse seja o único usuário com a permissão administrador ou comum, <br>sugiro que não troque a permissão, pois se não, não poderá ver as páginas.
                </p>
            </div>
            <div class="flex-shrink-0">
                <i class="fa fa-fw fa-exclamation-circle"></i>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-content">
                <div class="row row-cols-2">
                    <div class="col mb-4">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control form-control-alt" wire:model="user.name"
                            placeholder="Exemplo: Fulano da Silva">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Permissão</label>
                        <select class="form-select form-control-alt" wire:model="user.permission_id">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" wire:model="user.email" disabled>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Nova senha</label>
                        <input type="password" class="form-control form-control-alt" wire:model="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col mb-4">
                        <label class="form-label">Confirmar nova senha</label>
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
