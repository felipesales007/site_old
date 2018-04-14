<!-- Menu lateral esquerdo -->
    <aside class="sidebar">
        <ul class="sidebar-nav">
            <li id="chamado-menu-icone-lateral-esquerdo">
                <buttom onClick="chamado_novo();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'chamado_novo') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                    <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'chamado_novo') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-user-plus fa-2x glyphicon-f-pointer">
                        <span id="chamado-menu-fonte-lateral-esquerdo"> Novo chamado</span>
                    </i>
                </buttom>
            </li>
            
            <li id="chamado-menu-icone-lateral-esquerdo">
                <buttom onClick="chamado_lista();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'chamado_lista') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                    <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'chamado_lista') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-tasks fa-2x glyphicon-f-pointer">
                        <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Seus chamados</span>
                    </i>
                </buttom>
            </li>

            <?php if ($usuarios_permissao_id <= 3) { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="analista_global();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'analista_global') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'analista_global') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-globe fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Global</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>
            
            <?php if ($usuarios_permissao_id < 5) { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="servicos();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'servicos') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'servicos') { echo 'chamado-menu-item-lateral-ativado'; } ?> material-icons glyphicon-f-pointer chamado-icone-ajuste">build
                            <span id="chamado-menu-fonte-lateral-esquerdo" class="chamado-texto-ajuste">&ensp;Lista de serviços</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($usuarios_permissao_id < 3) { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="dashboard();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'dashboard') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'dashboard') { echo 'chamado-menu-item-lateral-ativado'; } ?> material-icons glyphicon-f-pointer chamado-icone-ajuste">dashboard
                            <span id="chamado-menu-fonte-lateral-esquerdo" class="chamado-texto-ajuste">&ensp;Dashboard</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'perfil') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="perfil();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'perfil') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'perfil') { echo 'chamado-menu-item-lateral-ativado'; } ?> material-icons glyphicon-f-pointer chamado-icone-ajuste">face
                            <span id="chamado-menu-fonte-lateral-esquerdo" class="chamado-texto-ajuste">&ensp;Perfil</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'analista_chamado_visualizar') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="analista_chamado_visualizar(<?= $usuarios_permissao_id ?>);" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'analista_chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'analista_chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-eye fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Visualizar chamado</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'tecnico_chamado_visualizar') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="tecnico_chamado_visualizar(<?= $usuarios_permissao_id ?>);" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'tecnico_chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'tecnico_chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-eye fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Visualizar chamado</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'chamado_visualizar') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="chamado_visualizar(<?= $usuarios_permissao_id ?>);" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'chamado_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-eye fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Visualizar chamado</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'usuario_setor_visualizar') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="usuario_setor_visualizar(<?= $usuarios_permissao_id ?>);" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'usuario_setor_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'usuario_setor_visualizar') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-eye fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Visualizar usuário</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'historico') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="historico();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'historico') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'historico') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-book fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo">&ensp;Seu histórico</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'adm') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="administrador();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'adm') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'adm') { echo 'chamado-menu-item-lateral-ativado'; } ?> fa fa-cog fa-2x glyphicon-f-pointer">
                            <span id="chamado-menu-fonte-lateral-esquerdo"> Administrador</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>

            <?php if ($tela == 'contato') { ?>
                <li id="chamado-menu-icone-lateral-esquerdo">
                    <buttom onClick="contato();" id="chamado-menu-lateral-esquerdo" class="<?php if ($tela == 'contato') { echo 'chamado-menu-item-lateral-ativado'; } ?> btn btn-primary btn-block btn-xs">
                        <i id="chamado-menu-icone-posicao" class="<?php if ($tela == 'contato') { echo 'chamado-menu-item-lateral-ativado'; } ?> material-icons glyphicon-f-pointer chamado-icone-ajuste">mail_outline
                            <span id="chamado-menu-fonte-lateral-esquerdo" class="chamado-texto-ajuste">&ensp;Contato</span>
                        </i>
                    </buttom>
                </li>
            <?php } ?>
        </ul>
    </aside>
<!-- /Menu lateral esquerdo -->

<!-- Redirecionamento de páginas -->
<script>
    function chamado_novo() {
        location.href="../usuario/chamado-novo"
    }

    function chamado_lista() {
        location.href="../usuario/chamado-lista"
    }

    function analista_global() {
        location.href="../analista/chamado-global"
    }

    function analista_chamado_visualizar($usuarios_permissao_id) {
        location.href="../analista/chamado-visualizar?chamado=<?= $ver["chamados_id"] ?>"
    }

    function tecnico_chamado_visualizar($usuarios_permissao_id) {
        location.href="../tecnico/chamado-visualizar?chamado=<?= $ver["chamados_id"] ?>"
    }

    function chamado_visualizar($usuarios_permissao_id) {
        location.href="../usuario/chamado-visualizar?chamado=<?= $ver["chamados_id"] ?>"
    }

    function historico() {
        location.href="../usuario/historico"
    }

    function servicos() {
        location.href="../tecnico/servicos"
    }
    
    function perfil() {
        location.href="../usuario/perfil"
    }

    function dashboard() {
        location.href="../supervisor/dashboard"
    }

    function usuario_setor_visualizar() {
        location.href="../supervisor/usuario-visualizar"
    }

    function administrador() {
        location.href="../administrador/administrador"
    }

    function contato() {
        location.href="../usuario/contato"
    }
</script>