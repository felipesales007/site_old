<?php 
    require_once("../model/chamado.php");
?>

<html>
    <head>
        <title>Lista | Pendentes</title>
        <?php require_once("cabecalho.php"); ?>
    </head>
        <article class="wrapper">
            <!-- MENU LATERAL -->  
                <aside class="sidebar">
                    <ul class="sidebar-nav">
                        <hr>
                        <li><a href="chamado_novo"><i class="fa fa-user-plus fa-2x" title="Novo"><span id="menu-lateral"><b> Novo</b></span></i></a></li>
                        <hr>
                        <li class="active"><a title="Lista"><i class="fa fa-list-alt fa-2x"><span id="menu-lateral"><b> Lista</b></span></i></a></li>
                        <hr>
                    </ul>
                </aside>
            <!-- /MENU LATERAL -->
            
            <!-- LISTA PENDENTES -->
                <div class="tab">
                    <button style="color:#CFB53B;" tabindex="1" onclick="openCity(event, 'pendentes')" id="defaultOpen" title="Pendentes"><i class="fa fa-warning fa-2x"></i><b class="hidden-xs"> Pendentes</b></button>
                    <a style="color:#FF6666;" href="lista_nao_resolvidos"><button tabindex="2" title="Não resolvido"><i class="fa fa-thumbs-o-down fa-2x"></i><b class="hidden-xs"> Não resolvidos</b></button></a>
                    <a style="color:#32cd99;" href="lista_resolvidos"><button tabindex="3" title="Resolvidos"><i class="fa fa-thumbs-o-up fa-2x"></i><b class="hidden-xs"> Resolvidos</b></button></a>
                    <a style="color:#4d4d4d;" href="lista_todos"><button tabindex="4" title="Todos"><i class="fa fa-sort-amount-desc fa-2x"></i><b class="hidden-xs"> Todos</b></button></a>
                    <i id="contador"><?php echo count($chamados = listaChamadoPendente($conexao)) ?></i><i id="contador-n">nº </i>
                </div>

                <div id="pendentes" class="tabcontent">
                    <input type="text" class="form-control" data-action="filtery" data-filters="#dev-table" placeholder="Pesquisar" style="width:290px; margin-bottom:7px">
                    <?php
                        if(count($chamados = listaChamadoPendente($conexao)) <= 12 ) {
                            echo "<table>";
                        }
                        if(count($chamados = listaChamadoPendente($conexao)) > 12 ) {
                            echo "<table class='toping'>";
                        }
                    ?>
                    <thead>
                        <tr>
                            <th class="text-left">Nome</th>
                            <th class="text-left hidden-xs">Setor</th>
                            <th class="text-left">Ramal</th>
                            <th class="text-left visible-lg">IP</th>
                            <th class="text-left hidden-sm hidden-xs">Problema</th>
                            <th class="text-left visible-lg">Data</th>
                            <th style="width:12%; padding-right:7px" class="text-left"><center><i class="fa fa-cog"></i></center></th>
                        </tr>
                    </thead>
                </table>

                <div class="tablescroll" style="text-transform:capitalize;">
                    <tr>
                        <div class="tbl-content">
                            <table class="table-fill" id="dev-table">
                                <?php include("../controller/script.php"); ?>
                                <?php
                                    $chamados = listaChamadoPendente($conexao);
                                    foreach($chamados as $lista):
                                ?>
                                <tbody class="table-hover">
                                    <tr>
                                        <td class="text-left"><?= $lista['nome'] ?></td>
                                        <td class="text-left hidden-xs"><?= $lista['setor'] ?></td>
                                        <td class="text-left"><?= $lista['ramal'] ?></td>
                                        <td class="text-left visible-lg"><?= $lista['ip'] ?></td>
                                        <td class="text-left hidden-sm hidden-xs" style="text-transform:none;"><?= $lista['problema'] ?></td>
                                        <td class="text-left visible-lg"><?= $lista['hora'] ?></td>
                                        <td class="text-left" id="tabela-acao">
                                            <form action="../controller/deletar_chamado" method="POST">
                                                <center>
                                                    <a class="btn btn-default" title="Visualizar" data-mensager="tooltip" href="chamado_ver?id=<?= $lista['id'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-primary hidden-xs" title="Editar" data-mensager="tooltip" href="chamado_alterar?id=<?= $lista['id'] ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a class="btn btn-danger hidden-sm hidden-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $lista['id'] ?>" data-nome="<?= $lista['nome'] ?>" title="Excluir" data-mensager="tooltip"><i class="fa fa-trash-o"></i></a>
                                                    <?php include("confirmar_deletar"); ?>
                                                </center>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        endforeach
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </tr>									
                </div>
            <!-- /LISTA PENDENTES -->
        </article>
    </body>
</html>