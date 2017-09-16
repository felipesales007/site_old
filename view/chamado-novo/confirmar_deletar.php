<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="font-size:17px;word-spacing:0px;">
    <br><br><br><br><br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="enter" data-dismiss="modal" aria-label="Close" title="Fechar" data-mensager="tooltip"><span aria-hidden="true">&times;</span></button>
                <a style="text-decoration:none;color:#00557d !important;text-transform:none;"><h4 id="exampleModalLabel"><b>Confirmação de exclusão</b></h4></a>
            </div>
            <br>
            <div class="alert alert-danger" style="text-transform:none;font-size:14px;">
                <span class="glyphicon glyphicon-warning-sign"></span> Excluir o chamado de 
                <span class="modal-title" style="text-transform:capitalize;"></span>
                <input type="hidden" name="id" value="recipient-name">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success button" title="Excluir"><span class="glyphicon glyphicon-ok-sign"></span><b> Sim</b></button>
                &ensp;
                <button class="btn btn-default button" data-dismiss="modal" title="Cancelar"><span class="glyphicon glyphicon-remove"></span><b> Não</b></button>
            </div>
        </div>
    </div>
</div>
<?php include("../../controller/chamado/script_confirmacao.php"); ?>