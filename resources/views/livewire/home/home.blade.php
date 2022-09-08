<div>
    <x-detail-page title="Dashboard" subtitle="Aqui temos um resuminho de tudo cadastrado..." />
    <div class="content">
        <div class="row items-push">
            @if(Auth::user()->permission_id != 1)
            <div class="col">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div
                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold">{{ number_format($products, 0, '.', '.') }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Produtos</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-bookmark fs-3 text-danger"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div
                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold">{{ number_format($categorys, 0, '.', '.') }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Categorias</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-bookmark  fs-3 text-danger"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div
                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold">{{ number_format($brands, 0, '.', '.') }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Marcas</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-bookmark  fs-3 text-danger"></i>
                        </div>
                    </div>

                </div>
            </div>
            @else
            <div class="col">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div
                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold">{{ number_format($users, 0, '.', '.') }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Usuários</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-bookmark fs-3 text-danger"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div
                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                        <dl class="mb-0">
                            <dt class="fs-3 fw-bold">{{ number_format($permissions, 0, '.', '.') }}</dt>
                            <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Permissões</dd>
                        </dl>
                        <div class="item item-rounded-lg bg-body-light">
                            <i class="far fa-bookmark fs-3 text-danger"></i>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
