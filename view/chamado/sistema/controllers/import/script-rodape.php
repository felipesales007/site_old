<script>
    // Ativa a grid da tela de chamados global de analista
    $('.box').boxfish();

    // Abrir e fechar do botão mobile
    $("#menu-button-abrir").click(function(e) {
        e.preventDefault();
        $("#menu-mobile").toggleClass("active");
    });
        
    $("#menu-button-fechar").click(function(e) {
        e.preventDefault();
        $("#menu-mobile").toggleClass("active");
    });
            
    // Ativação de aviso para o modal vazio
    $("#feedbacks-feedback").click(function(event) {
        if (document.getElementById("feedbacks-feedback").value.length < 5) {
            $('#enter-modal').click();
        }
    });
        
    // Evita quebra de linha no textarea
    $('textarea').on('keypress', function(event) {
        var ENTER_KEY = 13;
        var char = event.which || event.keyCode;
        if (char == ENTER_KEY) {
            event.preventDefault();
            $(this).parent('form').submit();
        }
    });

    // Mostra imagem de usuário em tooltip
    $('img[data-toggle="tooltip-img"]').tooltip({
        animated: 'fade',
        placement: 'top',
        html: true
    });

    // Passa o id e o nome do banco de dados para o modal
    $('#modal-enviar-chamado').on('show.bs.modal', function (event) {
        var button     = $(event.relatedTarget);
        var usuario_id = button.data('usuario') ;
        var chamado_id = button.data('id');
        var nome       = button.data('nome');
        var sobrenome  = button.data('sobrenome');
        var modal      = $(this);
        
        modal.find('.usuario_id').val(usuario_id);
        modal.find('.chamado_id').val(chamado_id);
        modal.find('.usuarios_nome').text(nome + ' ');
        modal.find('.usuarios_sobrenome').text(sobrenome);
    });

    // Passa o id, o setor, a permissão, e o status do banco de dados para o modal
    $('#modal-alterar-usuario').on('show.bs.modal', function (event) {
        var button            = $(event.relatedTarget);
        var usuario_id        = button.data('id');
        var usuario_setor     = document.getElementById("login-setor").value;
        var usuario_permissao = document.getElementById("usuario-permissao").value;
        var usuario_status    = document.getElementById("usuario-status").value;
        var modal             = $(this);

        modal.find('.usuario_id').val(usuario_id);
        modal.find('.usuario_setor').val(usuario_setor);
        modal.find('.usuario_permissao').val(usuario_permissao);
        modal.find('.usuario_status').val(usuario_status);
    });

    // Passa o id, o setor, a permissão, e o status do banco de dados para o modal
    $('#modal-administrador-alterar-usuario').on('show.bs.modal', function (event) {
        var button            = $(event.relatedTarget);
        var usuario_id        = button.data('id');
        var usuario_setor     = document.getElementById("login-setor").value;
        var usuario_permissao = document.getElementById("usuario-permissao").value;
        var usuario_status    = document.getElementById("usuario-status").value;
        var modal             = $(this);

        modal.find('.usuario_id').val(usuario_id);
        modal.find('.usuario_setor').val(usuario_setor);
        modal.find('.usuario_permissao').val(usuario_permissao);
        modal.find('.usuario_status').val(usuario_status);
    });

    // Passa o id da ocorrência do banco de dados para o modal desativar
    $('#modal-desativar-ocorrencia').on('show.bs.modal', function (event) {
        var button        = $(event.relatedTarget);
        var ocorrencia_id = button.data('id');
        var modal         = $(this);

        modal.find('.ocorrencia_id').val(ocorrencia_id);
    });

    // Passa o id da ocorrência do banco de dados para o modal ativar
    $('#modal-ativar-ocorrencia').on('show.bs.modal', function (event) {
        var button        = $(event.relatedTarget);
        var ocorrencia_id = button.data('id');
        var modal         = $(this);

        modal.find('.ocorrencia_id').val(ocorrencia_id);
    });

    // Passa o id do setor do banco de dados para o modal desativar
    $('#modal-desativar-setor').on('show.bs.modal', function (event) {
        var button   = $(event.relatedTarget);
        var setor_id = button.data('id');
        var modal    = $(this);

        modal.find('.setor_id').val(setor_id);
    });

    // Passa o id do setor do banco de dados para o modal ativar
    $('#modal-ativar-setor').on('show.bs.modal', function (event) {
        var button   = $(event.relatedTarget);
        var setor_id = button.data('id');
        var modal    = $(this);

        modal.find('.setor_id').val(setor_id);
    });

    // Passa o id do setor de serviços do banco de dados para o modal desativar
    $('#modal-desativar-setor-servicos').on('show.bs.modal', function (event) {
        var button            = $(event.relatedTarget);
        var setor_servicos_id = button.data('id');
        var modal             = $(this);

        modal.find('.setor_servicos_id').val(setor_servicos_id);
    });

    // Passa o id do setor de serviços do banco de dados para o modal ativar
    $('#modal-ativar-setor-servicos').on('show.bs.modal', function (event) {
        var button            = $(event.relatedTarget);
        var setor_servicos_id = button.data('id');
        var modal             = $(this);

        modal.find('.setor_servicos_id').val(setor_servicos_id);
    });
</script>