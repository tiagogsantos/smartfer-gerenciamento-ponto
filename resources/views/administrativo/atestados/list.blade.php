@extends('administrativo.layout.header')

@section('content')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="app-academy">
                <div class="card mb-6">
                    <div class="card-header d-flex flex-wrap justify-content-between gap-4">
                        <div class="card-title mb-0 me-1">
                            <h5 class="mb-0">Meus Atestados</h5>
                            <p class="mb-0">Total {{ $qtdAtestados }} course you have purchased</p>
                        </div>

                        <a href="{{ route('admin.createaestados') }}" class="btn btn-primary text-white">Criar
                            atestado</a>
                    </div>
                    <div class="card-body">

                        <div class="row gy-6 mb-6">
                            @foreach($atestados as $atestado)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card p-2 h-100 shadow-none border">
                                        <div class="rounded-2 text-center mb-4">
                                            <a href="{{ route('admin.editaestados', ['id' => $atestado->id,
                                                        'user_id' => $atestado->user_id]) }}">
                                                <img class="img-fluid"
                                                     src="{{ $atestado->arquivo ? asset('storage/' . $atestado->arquivo) : url('https://placehold.co/600x400/png') }}"
                                                     alt="Foto Atestado" /></a>
                                        </div>
                                        <div class="card-body p-4 pt-2">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                @if($atestado->status === "aprovado")
                                                    <span class="badge bg-label-success">{{ $atestado->status }}</span>
                                                @elseif($atestado->status === "pendente")
                                                    <span class="badge bg-label-warning">{{ $atestado->status }}</span>
                                                @else
                                                    <span class="badge bg-label-danger">{{ $atestado->status }}</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('admin.editaestados', ['id' => $atestado->id,
                                                'user_id' => $atestado->user_id]) }}"
                                               class="h5">{{ $atestado->justificativa }}</a>
                                            <p class="mt-1">{{ $atestado->descricao }}</p>
                                            <p class="d-flex align-items-center mb-1"><i
                                                    class="icon-base bx bx-calendar me-1"></i>
                                                <strong>Inicio</strong>: {{ date('d/m/Y', strtotime($atestado->data_inicio)) }}
                                                -
                                                <strong>Termino</strong>: {{ date('d/m/Y', strtotime($atestado->data_fim)) }}
                                            </p>
                                            <div
                                                class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap
                                                flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                                <a class="w-100 btn btn-label-primary d-flex align-items-center"
                                                   href="{{ route('admin.editaestados', ['id' => $atestado->id,
                                                        'user_id' => $atestado->user_id]) }}"> <span
                                                        class="me-2">Visualizar Detalhes</span><i
                                                        class="icon-base bx bx-chevron-right icon-sm lh-1 scaleX-n1-rtl"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
