<?php
session_start();
    function mostraAlerta($tipo) {
        if(isset($_SESSION[$tipo])){
?>
    <div class="popupunder alert alert-<?= $tipo ?> fade in"><i class="fa fa-bullhorn"></i>
        <?= $_SESSION[$tipo]?>
    </div>
<?php
            unset($_SESSION[$tipo]);
        }
    }
?>