<!-- SCRIPT PARA VISUALIZAÇÃO DE DADOS NA TELA DE CONFIRMAÇÃO -->
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') 
        var nome = button.data('nome')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(nome + ' ?')
        modal.find('.alert-danger input').val(recipient)
    })

    // Enter direto no botão principal da tela
    $(document).keypress(function(e) {
        if(e.which == 13) $('#enter').click();
    }); 
</script>