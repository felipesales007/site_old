<!-- Mostra notificação na tela por tipo -->
<!-- Tipos: success, info, warning, danger -->
<?php
    function notificacao($tipo) {
        if (isset($_SESSION[$tipo])) {
            ?>
                <!-- Notificação -->
                <div class="popupunder alert alert-<?= $tipo ?> wow fadeInUp" data-wow-duration="1s" data-wow-delay=".0s">
                    <i class="fa fa-bullhorn"></i>
                    <button type="button" class="close close-n" data-dismiss="alert" aria-label="Fechar">
                        <span aria-hidden="true">&ensp;<i class="material-icons">clear</i></span>
                    </button>
                    &ensp;<?= $_SESSION[$tipo] ?>
                </div>
            <?php
            unset($_SESSION[$tipo]);
        }
    }
?>