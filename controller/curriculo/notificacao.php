<!-- GERENCIAMENTO DE NOTIFICAÇÕES E SEUS RESPECTIVOS TIPOS -->
<!-- TIPOS: success, info, warning, danger -->
<?php
    session_start();

    function mostraAlerta($tipo) {
        if(isset($_SESSION[$tipo])) {
        ?>
            <audio autoplay>
                <source src="recursos/som/notificacao.mp3">
            </audio>
            
            <!-- MOSTRA A NOTIFICAÇÃO A DEPENDER DO TIPO DE ALERTA -->
            <div class="popup alert alert-<?= $tipo ?>">
                <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="material-icons">speaker_notes</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <?= $_SESSION[$tipo] ?>
                </div>
            </div>
        <?php
            unset($_SESSION[$tipo]);
        }
    }
?>

