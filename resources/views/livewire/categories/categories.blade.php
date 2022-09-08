<div>
    <x-detail-page title="Categorias" subtitle="Gerencie as categorias registradas." />
    <div class="content">
        <div class="bg-body-light p-3 mb-4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <input type="search" class="form-control form-control-sm" placeholder="Procurar.." wire:model="search">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-alt-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-block-popout">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th>Nome</th>
                        <th style="width: 20%;">Registado Em</th>
                        <th class="text-center" style="width: 100px;">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $i => $item)
                        <tr>
                            <td class="text-center">
                                {{ $item->id }}
                            </td>
                            <td class="fw-semibold fs-sm">
                                <span>{{ $item->name }}</span>
                            </td>
                            <td>
                                <span
                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill btn btn-sm btn-alt-secondary">{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                    data-bs-toggle="tooltip" aria-label="Edit" wire:click="selectItem({{ $item->id }}, 'edit', '{{ $item->name }}')">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" aria-label="Delete" wire:click="selectItem({{ $item->id }}, 'delete')">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}
    </div>
    <div class="modal fade" id="modal-block-popout" tabindex="-1" aria-labelledby="modal-block-popout"
        style="display: none;" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Adicionar novo</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <input type="text" class="form-control mb-3" placeholder="Digite algo..."
                            wire:model="categoryName">
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal"
                            wire:click="saveCategory()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalFormEdit" tabindex="-1" aria-labelledby="modal-block-popout"
        style="display: none;" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Editar</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm mb-3">
                        <input type="text" class="form-control mb-3" placeholder="Digite algo..."
                            wire:model="categoryEdit">
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                            wire:click="editCategory()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modal-block-popout"
        style="display: none;" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Deletar</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm mb-3">
                        <span><strong>Você está prestes a deletar o produto, tem certeza?</strong></span>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                            wire:click="deleteCategory()">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            window.addEventListener('openDeleteModal', event => {
                $("#modalFormDelete").modal('show');
            })
            window.addEventListener('openEditModal', event => {
                $("#modalFormEdit").modal('show');
            })
        </script>
    @endpush
</div>
