<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.get("{{ route('admin.getListUsers') }}").done(response => {

        let obj = [];

        let ativo = `<span class="badge bg-label-success">Ativo</span>`
        let inativo = `<span class="badge bg-label-danger">Inativo</span>`

        $.each(response.funcionarios, function (index, item) {

            let linkExclusao = "{{ url('/administrativo/excluir-funcionario') }}/" + item.id;

            let excluir = `<div class="btn-group">
                                <a href="#" class="btn btn-icon delete-record" onclick="excluirFuncionario(${item.id})">
                                <i class="icon-base bx bx-trash icon-md"></i>
                           </div>`;

            let linkEdicao = "{{ url('/administrativo/editar-funcionario') }}/" + item.id;

            let editar = `<div class="btn-group">
                            <a href="${linkEdicao}" class="btn btn-icon delete-record">
                            <i class="icon-base bx bx-show icon-md"></i>
                      </div>`;

            obj.push([
                item.name,
                item.email,
                item.status === 1 ? ativo : inativo,
                excluir + editar
            ]);
        });

        // Limpa conteúdo do tbody
        $("#tabelaUsuario tbody").empty();

        $("#tabelaUsuario").on('draw.dt', function () {
            $("#tabelaUsuario td, #tabelaUsuario th").addClass('align-middle text-center');
        });

        // Inicializa ou reinicializa o DataTable
        $("#tabelaUsuario").DataTable({
            destroy: true,
            data: obj,
            pageLength: 10,
            responsive: true,
            searching: true,
            processing: true
        });
    });

    // Atualizar dados de funcionários
    $("#atualizarFuncionario").click(function (e) {
        e.preventDefault();

        let idUser = $("#idFuncionario").val();
        let formulario = $("#editarFuncionario");
        let formData = new FormData(formulario[0]);

        $.ajax({
            url: "{{ url('administrativo/atualizar-funcionario') }}" + '/' + idUser,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: response.message,
                    icon: 'success'
                });

                setTimeout(function () {
                    window.location.reload();
                }, 300);
            },
            error: function (response) {
                Swal.fire({
                    title: 'Erro!',
                    text: response.responseJSON?.error || 'Erro ao atualizar funcionário.',
                    icon: 'error'
                });
            }
        });
    });

    // Excluir Funcionario
    function excluirFuncionario(id) {
        Swal.fire({
            title: "Atenção!",
            text: "Deseja realmente excluir o funcionário?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, eu quero!",
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                let url = 'administrativo/excluir-funcionario' + '/' + id;

                $.post(url).done(response => {
                    if (response.error === '') {
                        Swal.fire({
                            title: "Atenção!",
                            text: "Não foi possível excluir o funcionário!",
                            icon: "danger"
                        });
                        return false;
                    }

                    Swal.fire({
                        title: "Sucesso!",
                        text: response.message,
                        icon: "success"
                    });

                    setTimeout(function () {
                        window.location.reload();
                    }, 300);
                });
            }
        });
    }


</script>
