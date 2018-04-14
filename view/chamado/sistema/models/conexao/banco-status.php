
<?php
	// Verifica e mostra na tela o estado de conexão com servidor
	if ($conexao) { 
		?>
			<span id="status-servidor" class="label label-success">
				Servidor: on
			</span>
		<?php
	} else {
		?>
			<span id="status-servidor" class="label label-danger">
				Servidor: off
			</span>
		<?php
	}
?>