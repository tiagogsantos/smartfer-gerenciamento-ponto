@extends('login.layout.header')

@section('content')

    <!-- Content -->

    <div class="container">
        <div class="authentication-wrapper authentication-cover">
            <!-- /Logo -->
            <div class="authentication-inner row m-0">
                <!-- /Left Text -->
                <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                    <div class="w-100 d-flex justify-content-center">
                        <img
                            src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/boy-with-rocket-light.png"
                            class="img-fluid"
                            alt="Login image"
                            width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png"
                            data-app-light-img="illustrations/boy-with-rocket-light.png"/>
                    </div>
                </div>
                <!-- /Left Text -->

                <!-- Login -->
                <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
                    <div class="w-px-400 mx-auto mt-sm-12 mt-8">
                        <h4 class="mb-1">Bem-vindo a Smartfer! 👋</h4>
                        <p class="mb-6">Digite suas credenciais para acessar o sistema</p>

                        <form id="formAuthentication" class="mb-6">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Por favor, digite o seu e-mail"/>
                            </div>
                            <div class="form-password-toggle form-control-validation">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                           placeholder="Por favor, digite sua senha"
                                           aria-describedby="password"/>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="icon-base bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="my-7">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="remember-me"/>
                                        <label class="form-check-label" for="remember-me">Lembrar-me</label>
                                    </div>
                                    <a href="#">
                                        <p class="mb-0">Esqueceu sua senha?</p>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100">Entrar</button>
                        </form>

                        <p class="text-center">
                            <span>Novo na plataforma?</span>
                            <a href="#">
                                <span>Criar Contat</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    <script>

        $('#formAuthentication').on('submit', function(e) {
            e.preventDefault(); // evita o submit normal

            let url = "{{ route('web.login.do') }}";

            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(), // serializa os campos do form
                success: function(response) {
                    window.location.href = '/administrativo';
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao entrar',
                            text: xhr.responseJSON.message || 'Credenciais inválidas.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Ocorreu um erro inesperado.',
                        });
                    }
                }
            });
        });


    </script>



@endsection
