<!-- GERENCIAMENTO DE NOTIFICAÇÕES E SEUS RESPECTIVOS TIPOS -->
<!-- TIPOS: success, info, warning, danger -->
<?php
    session_start();

    function mostraAlerta($tipo) {
        if(isset($_SESSION[$tipo])) {
?>
            <!-- MOSTRA A NOTIFICAÇÃO A DEPENDER DO TIPO DE ALERTA -->
            <div class="popupunder alert alert-<?= $tipo ?> fade in"><i class="fa fa-bullhorn"></i>
                <?= $_SESSION[$tipo] ?>
            </div>
<?php
            unset($_SESSION[$tipo]);
        }
    }
?>