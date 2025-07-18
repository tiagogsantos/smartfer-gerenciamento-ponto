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
                                <a href="${linkExclusao}" class="btn btn-icon delete-record">
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

</script>
