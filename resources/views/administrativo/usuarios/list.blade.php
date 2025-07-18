
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6 mb-6">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="text-heading">Total de Funcionários</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">{{ $funcionarios }}</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                          <span class="avatar-initial rounded bg-label-primary">
                                            <i class="icon-base bx bx-group icon-lg"></i>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="text-heading">Funcionários Inativos</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">{{ $funcionariosInativos }}</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                          <span class="avatar-initial rounded bg-label-danger">
                                            <i class="icon-base bx bx-user-plus icon-lg"></i>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="text-heading">Funcionários Ativos</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">{{ $funcionariosAtivos }}</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                          <span class="avatar-initial rounded bg-label-success">
                                            <i class="icon-base bx bx-user-check icon-lg"></i>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="text-heading">Atestados Pendentes</span>
                                <div class="d-flex align-items-center my-1">
                                    <h4 class="mb-0 me-2">{{ $atestadoPendente }}</h4>
                                </div>
                            </div>
                            <div class="avatar">
                                          <span class="avatar-initial rounded bg-label-warning">
                                            <i class="icon-base bx bx-user-voice icon-lg"></i>
                                          </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Pesquisa de Filtros</h5>
                <div class="d-flex justify-content-between align-items-center row pt-4 gap-md-0 g-6">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <div class="card-datatable">
                <table class="tabelaUsuario table border-top text-center" id="tabelaUsuario">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Nome</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- / Layout page -->

