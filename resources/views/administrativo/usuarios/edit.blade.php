@extends('administrativo.layout.header')

@section('content')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-align-top">
                        <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:void(0);"><i
                                        class="icon-base bx bx-user icon-sm me-1_5"></i> Conta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="icon-base bx bx-lock-alt icon-sm me-1_5"></i> Segurança</a>
                            </li>
                        </ul>
                    </div>
                    <form id="editarFuncionario" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                                    <img src="{{ asset($perfil->foto_capa ? 'storage/'. $perfil->foto_capa : 'img/avatar/1.png') }}"
                                         alt="Foto do perfil"
                                         class="d-block w-px-100 h-px-100 rounded"
                                         id="uploadedAvatar"/>

                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Atualizar Foto</span>
                                            <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="foto_capa" class="account-file-input" hidden
                                                   accept="image/png, image/jpeg"/>
                                        </label>
                                        <div>Arquivos suportados JPG/JPEG ou PNG. Max de tamanho 2Mb</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-4">

                                <input type="hidden" id="idFuncionario" name="idFuncionario" value="{{ $perfil->user_id }}">

                                <div class="row g-6">
                                    <div class="col-md-6 form-control-validation">
                                        <label for="firstName" class="form-label">Nome</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                               value="{{ $user->name }}" autofocus/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                               value="{{ $user->email }}"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="language" class="form-label">Tipo</label>
                                        <select id="" class="select2 form-select" name="tipo">
                                            <option value="">Selecione</option>
                                            <option
                                                value="rh" {{ old('tipo') === 'rh' ? 'selected' : ($user->tipo === 'rh' ? 'selected' : '') }}>
                                                RH
                                            </option>
                                            <option
                                                value="funcionario" {{ old('tipo') === 'funcionario' ? 'selected' : ($user->tipo === 'funcionario' ? 'selected' : '') }}>
                                                Funcionario
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="language" class="form-label">Status</label>
                                        <select id="" class="select2 form-select" name="status">
                                            <option value="">Selecione</option>
                                            <option
                                                value="1" {{ old('status') === '1' ? 'selected' : ($user->status === 1 ? 'selected' : '') }}>
                                                Ativo
                                            </option>
                                            <option
                                                value="0" {{ old('status') === '0' ? 'selected' : ($user->status === 0 ? 'selected' : '') }}>
                                                Inativo
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="organization" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="" name="cpf"
                                               value="{{ $perfil->cpf }}"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="organization" class="form-label">RG</label>
                                        <input type="text" class="form-control" id="" name="rg"
                                               value="{{ $perfil->rg }}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="phoneNumber">Telefone / Celular</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">BR (+55)</span>
                                            <input type="text" id="" name="telefone" class="form-control"
                                                   value="{{ $perfil->telefone }}"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="phoneNumber">Data Nascimento</label>
                                        <div class="input-group input-group-merge">
                                            <input type="date" id="" name="data_nascimento" class="form-control"
                                                   value="{{ $perfil->data_nascimento }}"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="zipCode" class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="" value="{{ $perfil->cep }}"
                                               name="cep" maxlength="8"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="" name="rua"
                                               value="{{ $perfil->rua }}"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Número</label>
                                        <input type="text" class="form-control" id="" name="numero"
                                               value="{{ $perfil->numero }}"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="" name="complemento"
                                               value="{{ $perfil->complemento }}"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="" name="bairro"
                                               value="{{ $perfil->bairro }}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="form-label">Cidade</label>
                                        <input class="form-control" type="text" id="cidade" name="cidade"
                                               value="{{ $perfil->cidade }}">
                                    </div>

                                    <div class="mt-6">
                                        <button type="button" id="atualizarFuncionario" class="btn btn-primary me-3">Atualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
