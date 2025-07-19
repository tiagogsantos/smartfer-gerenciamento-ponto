@extends('administrativo.layout.header')

@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            {{-- Sucesso --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            {{-- Erros de validação --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            <form action="{{ route('admin.storeaestados') }}" class="dropzone needsclick" id="dropzone-multi"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gy-6">
                    <!-- Multi  -->
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">Individual ou Multiplos Arquivos</h5>
                            <div class="card-body">
                                <input type="file" name="arquivo[]" multiple class="form-control" accept="image/png, image/jpeg">
                            </div>
                        </div>
                    </div>
                    <!-- Multi  -->
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <h5 class="card-header">Detalhe o Atestado</h5>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="" class="form-label">Descritivo:</label>
                                <input type="text" class="form-control" id="" name="descricao">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Data
                                    Inicio</label>
                                <input type="date" class="form-control" id="" name="data_inicio">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Data
                                    Termino</label>
                                <input type="date" class="form-control" id="" name="data_fim">
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                <select class="form-select" id="" name="status">
                                    <option value="pendente">Pendente</option>
                                </select>
                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1"
                                       class="form-label">Justificativa</label>
                                <textarea class="form-control" id="" name="justificativa" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar atestado</button>
            </form>
        </div>
    </div>

@endsection
