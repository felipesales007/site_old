<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="font-size:17px;word-spacing:0px;">
    <br><br><br><br><br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="enter" data-dismiss="modal" aria-label="Close" title="Fechar" data-mensager="tooltip"><span aria-hidden="true">&times;</span></button>
                <a style="text-decoration:none;color:#00557d !important;text-transform:none;"><h4 id="exampleModalLabel"><b>Confirmação de Alteração</b></h4></a>
            </div>
            <br>
            <div class="alert alert-info" style="text-transform:none;font-size:14px;">
                <span class="glyphicon glyphicon-warning-sign"></span> Alterar o chamado de 
                <span class="modal-title" style="text-transform:capitalize;"></span>
                <input type="hidden" name="id" value="recipient-name">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success button" title="Alterar"><span class="glyphicon glyphicon-ok-sign"></span><b> Sim</b></button>
                &ensp;
                <button class="btn btn-default button" data-dismiss="modal" title="Cancelar"><span class="glyphicon glyphicon-remove"></span><b> Não</b></button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') 
        var nome = button.data('nome')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(nome + ' ?')
        modal.find('.alert-info input').val(recipient)
    })

    // Enter direto no botão principal da tela
    $(document).keypress(function(e) {
        if(e.which == 14) $('#enter').click();
    }); 
</script>