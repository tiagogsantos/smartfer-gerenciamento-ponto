@extends('administrativo.layout.header')

@section('content')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row g-6">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap mb-6 gap-2">
                                <div class="me-1">
                                    <h5 class="mb-0"><strong>Motivo:</strong> {{ $atestados->justificativa }}</h5>
                                    <p class="mb-0"><strong>Funcionário:</strong> <span
                                            class="fw-medium text-heading"> {{ $atestados->user->name }} </span>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    @if($atestados->status === "aprovado")
                                        <span class="badge bg-label-success">{{ $atestados->status }}</span>
                                    @elseif($atestados->status === "pendente")
                                        <span class="badge bg-label-warning">{{ $atestados->status }}</span>
                                    @else
                                        <span class="badge bg-label-danger">{{ $atestados->status }}</span>
                                    @endif
                                </div>
                            </div>
                            <hr/>
                            <h5>Descrições</h5>
                            <p>{{ $atestados->descricao }}</p>
                            <hr>
                            <div class="card academy-content shadow-none border">
                                <div class="p-2">
                                    <div class="cursor-pointer">
                                        <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade"
                                             data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100"
                                                         src="{{ asset($atestados->arquivo ? 'storage/'. $atestados->arquivo : 'img/avatar/1.png') }}"
                                                         alt="Foto Atestado"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
