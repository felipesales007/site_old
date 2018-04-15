<!-- Arquivos Core JS -->
<script type="text/javascript" src="../../../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../assets/js/material.min.js"></script>

<!-- Valida iformações digitadas pelo usuários em tempo real -->
<script type="text/javascript" src="../../../assets/js/bootstrap-validator.js"></script>
<script type="text/javascript" src="../../../assets/js/validador.js"></script>

<!-- Plugin para Sliders, documentação completa aqui: http://refreshless.com/nouislider/ -->
<script type="text/javascript" src="../../../assets/js/nouislider.min.js"></script>

<!-- Plugin para o Datepicker, documentação completa aqui: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script type="text/javascript" src="../../../assets/js/bootstrap-datepicker.js"></script>

<!-- Centro de Controle para Material Kit: ativando as ondulações, os efeitos de paralaxe, os scripts das páginas de exemplo etc -->
<script type="text/javascript" src="../../../assets/js/material-kit.js"></script>

<!-- Animações de aparecer -->
<script type="text/javascript" src="../../../assets/js/wow.min.js"></script>

<!-- Filtro de selects para listagem de dados -->
<script type="text/javascript" src="../../../assets/js/jsapi.js"></script>

<!-- Grids responsivos -->
<script type="text/javascript" src="../../../assets/js/boxfish.js"></script>

<script type="text/javascript">
    // Inicializa as animações do wow.min.js no site
    new WOW().init();
    
    // Mostra icone de carregamento no botão
    function carregando_login() {
        if ((document.getElementById("login-usuario").value != "") 
        && (document.getElementById("login-senha").value != "")) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_recuperar_senha() {
        if ((document.getElementById("login-usuario").value != "") 
        && (document.getElementById("login-cpf").value != "")) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_criar_conta() {
        if ((document.getElementById("login-nome").value.length > 1) 
        && (document.getElementById("login-sobrenome").value.length > 1)
        && (document.getElementById("login-matricula").value != "")
        && (document.getElementById("login-usuario-auto").value != "")
        && (document.getElementById("login-senha").value.length > 5)
        && (document.getElementById("login-senha-repetir").value.length > 5)
        && (document.getElementById("login-setor").value != "")
        && (document.getElementById("login-telefone").value.length > 12)
        && (document.getElementById("login-cpf").value.length > 10)
        && (document.getElementById("login-sexo").value != "")) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_chamado_novo() {
        if ((document.getElementById("chamado_setor").value != "") 
        && (document.getElementById("chamado_categoria").value != "")
        && (document.getElementById("chamado-prioridade").value != "")
        && (document.getElementById("chamado-descricao").value.length == 0)
        || (document.getElementById("chamado_setor").value != "") 
        && (document.getElementById("chamado_categoria").value != "")
        && (document.getElementById("chamado-prioridade").value != "")
        && (document.getElementById("chamado-descricao").value.length > 4)) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_chamado_atualizar() {
        if ((document.getElementById("chamado-prioridade").value != "")
        && (document.getElementById("chamado-descricao").value.length == 0)
        || (document.getElementById("chamado-prioridade").value != "")
        && (document.getElementById("chamado-descricao").value.length > 4)) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_postagem() {
        if (document.getElementById("feedbacks-feedback").value != "") {
            document.getElementById('carregando-modal').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_finalizar_chamado() {
        document.getElementById('carregando-modal-finalizar').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
    }

    function carregando_cancelar_chamado() {
        if (document.getElementById("chamado-cancelar-chamado").value != "") {
            document.getElementById('carregando-modal-cancelar').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_pendente_chamado() {
        document.getElementById('carregando-modal-pendente').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
    }

    function carregando_perfil_atualizar() {
        if ((document.getElementById("login-nome").value.length > 1) 
        && (document.getElementById("login-sobrenome").value.length > 1)
        && (document.getElementById("login-matricula").value != "")
        && (document.getElementById("login-usuario-auto").value != "")
        && (document.getElementById("login-setor").value != "")
        && (document.getElementById("login-telefone").value.length > 12)
        && (document.getElementById("login-cpf").value.length > 10)
        && (document.getElementById("login-sexo").value != "")) {
            document.getElementById('carregando-alterar-perfil').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_senha_atualizar() {
        if ((document.getElementById("login-senha-atual").value.length > 5)
        && (document.getElementById("login-senha").value.length > 5)
        && (document.getElementById("login-senha-repetir").value.length > 5)) {
            document.getElementById('carregando-senha').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    function carregando_contato() {
        if ((document.getElementById("email-motivo").value != "")
        && (document.getElementById("email-mensagem").value.length > 5)) {
            document.getElementById('carregando-contato').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    // Enter direto no botão principal da tela
    $(document).keypress(function(e) {
        if (e.which == 13) $('#enter').click();
    });
    $(document).keypress(function(e) {
        if (e.which == 13 && document.getElementById("feedbacks-feedback").value.length > 4) {
            $('#enter-modal').click();
        }
    });
    $(document).keypress(function(e) {
        if (e.which == 13 && document.getElementById("chamado-finalizar-chamado").value.length > 4) {
            $('#enter-modal-finalizar').click();
        }
    });
    $(document).keypress(function(e) {
        if (e.which == 13 && document.getElementById("chamado-cancelar-chamado").value.length > 4) {
            $('#enter-modal-cancelar').click();
        }
    });

    // Mostra o menu lateral esquerdo
    $(document).on("click","#menu-button-lateral-esquerdo", function() {
        $(".wrapper").toggleClass("toggled");
    });

    // Animação do botão do menu lateral esquerdo
    $(function() {   
        $('.navbar-toggler').on('click', function(event) {
            event.preventDefault();
            $(this).closest('.navbar-minimal').toggleClass('open');
        })
    });

    // Permite somente dígitos numéricos
    $(document).ready(function() {
        $("#login-matricula").keyup(function() {
            $("#login-matricula").val(this.value.match(/[0-9]*/));
        });
    });
    $(document).ready(function() {
        $("#login-telefone").keyup(function() {
            $("#login-telefone").val(this.value.match(/[0-9-()]*/));
        });
    });
    $(document).ready(function() {
        $("#login-celular").keyup(function() {
            $("#login-celular").val(this.value.match(/[0-9-()]*/));
        });
    });
    $(document).ready(function() {
        $("#login-cpf").keyup(function() {
            $("#login-cpf").val(this.value.match(/[0-9.]*/));
        });
    });
    $(document).ready(function() {
        $("#login-data-nascimento").keyup(function() {
            $("#login-data-nascimento").val(this.value.match(/[0-9/]*/));
        });
    });

    // Permite somente dígitos de A a Z (letras)
    function somente_letras(e, args) {		
        if (document.all) {
            var evt = event.keyCode;
        } else {
            var evt = e.charCode;
        }
        var valid_chars = 'abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYK'+args;
        var chr= String.fromCharCode(evt);
        if (valid_chars.indexOf(chr) > -1) {
            return true;
        }
        if (valid_chars.indexOf(chr) >-1 || evt < 9) {
            return true;
        }
        return false;
    }

    // Permite somente dígitos de A a Z (letras) e números
    function somente_letras_numeros(e, args) {		
        if (document.all) {
            var evt = event.keyCode;
        } else {
            var evt = e.charCode;
        }
        var valid_chars = '0123456789abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYK'+args;
        var chr= String.fromCharCode(evt);
        if (valid_chars.indexOf(chr) > -1) {
            return true;
        }
        if (valid_chars.indexOf(chr) >-1 || evt < 9) {
            return true;
        }
        return false;
    }

    // Gera usuário com os campos nome e matrícula preenchidos
    jQuery(document).ready(function() {
        jQuery('input').on('keyup',function() {
            if (jQuery(this).attr('name') === 'usuario') {
                return false;
            }
            var nome = (jQuery('#login-nome').val() == '' ? '' : jQuery('#login-nome').val());
            var matricula = (jQuery('#login-matricula').val() == '' ? '' : jQuery('#login-matricula').val());
            var usuario = (nome) + (matricula);
            jQuery('#login-usuario-auto').val(usuario);
        });
    });

    // Evita que seja digitado zero a esquerda
    setInterval(function() {
        var l = document.getElementsByClassName('zero-esquerda');
        for (var i = 0; i < l.length; i++) {
            while (l[i].value.length > 0 && l[i].value.substring(0, 1) == '0') {
                var s = l[i].selectionStart;
                l[i].value = l[i].value.substring(1);
                l[i].selectionEnd = l[i].selectionStart = s - 1;
            }
        }
    }, 0);

    // Evita que seja digitado um número primeiro no usuário de login
    setInterval(function() {
        var l = document.getElementsByClassName('letra-primeiro');
        for (var i = 0; i < l.length; i++) {
            while (l[i].value.length > 0 && 
                l[i].value.substring(0, 1) == '0' || 
                l[i].value.substring(0, 1) == '1' || 
                l[i].value.substring(0, 1) == '2' || 
                l[i].value.substring(0, 1) == '3' || 
                l[i].value.substring(0, 1) == '4' || 
                l[i].value.substring(0, 1) == '5' || 
                l[i].value.substring(0, 1) == '6' || 
                l[i].value.substring(0, 1) == '7' || 
                l[i].value.substring(0, 1) == '8' || 
                l[i].value.substring(0, 1) == '9') {
                var s = l[i].selectionStart;
                l[i].value = l[i].value.substring(1);
                l[i].selectionEnd = l[i].selectionStart = s - 1;
            }
        }
    }, 0);

    // Máscara para formatação em CEP, RG, CPF, data, telefone e etc
    function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(2,3);
        var texto = mascara.substring(i);
        if (texto.substring(0,1) != saida) {
            documento.value += texto.substring(0,1);
        }
    }
    function formatar_data(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(i);
        if (texto.substring(0,1) != saida) {
            documento.value += texto.substring(0,1);
        }
    }
    
    // Data de nascimento estilizado
    $('.datepicker').datepicker({
        WeekStart: 1
    });

    // Preenche o campo telefônico automaticamente
    function auto_numero() {  
        if (document.formulario.usuarios_telefone.value == '') {  
            document.formulario.usuarios_telefone.value="(71)";
        }    
    }
    function auto_numero_opcional() {  
        if (document.formulario.usuarios_celular.value == '') {  
            document.formulario.usuarios_celular.value="(71)";
        }    
    }

    // Permite apenas a primeira letra maiúscula
    function maiuscula(id) {
        // Palavras para ser ignoradas
        var wordsToIgnore = [],
        minLength = 0;
        var str = $('#'+id).val(); 
        var getWords = function(str) {
            return str.match(/\S+\s*/g);
        }
        $('#'+id).each(function() {
            var words = getWords(this.value);
            $.each(words, function(i, word) {
                // Somente continua se a palavra nao estiver na lista de ignorados
                if (wordsToIgnore.indexOf($.trim(word)) == -1 && $.trim(word).length > minLength) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                } else {
                    words[i] = words[i].toLowerCase();
                }
            });
            this.value = words.join("");
        });
    };

    // Primeira letra maiúscula
    function primeira_letra_maiscula(letra) {
        str = letra.value;
        qtd = letra.value.length;
        primeira = str.substring(0,1);
        resto = str.substring(1,qtd);
        str = primeira.toUpperCase() + resto;
        letra.value = str;
    }

    // Mostra uma mensagem no input depois do arquivo selecionado no type="file" em login-criar-conta.php
    $(function() {
        $('#login-imagem').change(function() {
            $('.login-imagem-nome').html("<div class='imagem-texto'>Imagem carregada</div>");
        });
    });
    $(function() {
        $('#chamado-anexo').change(function() {
            $('.chamado-anexo-nome').html("<div class='imagem-texto'>Anexo carregado</div>");
        });
    });
    $(function() {
        $('#chamado-anexo-modal').change(function() {
            $('.chamado-anexo-nome').html("<div class='imagem-texto'>Anexo carregado</div>");
        });
    });

    // Volta para a tela anterior do navegador
    function button_voltar() {  
        window.history.back();
    }

    // Avança para a tela anterior do navegador
    function button_avancar() {  
        window.history.forward();
    }

    // Mostra notificações na tela
    $('.popovers').popover();

    window.setTimeout(function() {
        $(".popupunder").slideUp(2000, function() {
            $(this).remove(); 
        });
    }, 8200); // Tempo que permanecerá na tela
    window.setTimeout(function() {
        $(".popupunder-aviso").slideUp(2000, function() {
            $(this).remove(); 
        });
    }, 8200); // Tempo que permanecerá na tela

    // Realiza filtro nos selects para listagem de dados
    $(function() {
        $('#chamado_setor').on('change', function() {
            if($(this).val()) {
                $('#chamado_categoria').html(null);
                $.getJSON('../../models/chamado-selects.php?search=',{chamado_setor: $(this).val(), ajax:'true'}, function(j) {
                    var options = '<option value="">Selecione a categoria</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].ocorrencias_id + '">' + j[i].ocorrencias_ocorrencia + '</option>';
                    }
                    $('#chamado_categoria').html(options).show();
                });
            } else {
                $('#chamado_categoria').html('<option value="">Selecione a categoria</option>');
            }
        });
    });

    // Pesquisa um dado digitado na tabela
    (function() {
        'use strict';
        var $ = jQuery;
        $.fn.extend( {
            filterTable: function() {
                return this.each(function() {
                    $(this).on('keyup', function(e) {
                        $('.pesquisa-sem-resultado').remove();
                        var $this = $(this), 
                            search = $this.val().toLowerCase(), 
                            target = $this.attr('data-pesquisar'), 
                            $target = $(target), 
                            $rows = $target.find('tbody tr');
                            
                        if(search == '') {
                            $rows.show(); 
                        } else {
                            $rows.each(function() {
                                var $this = $(this);
                                $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                            })
                            if($target.find('tbody tr:visible').size() === 0) {
                                var remove_coluna = $target.find('tr').first().find('td').size();
                                var sem_resultado = $('<tr class="pesquisa-sem-resultado"><td colspan="'+remove_coluna+'"><center>Nenhum registro encontrado</center></td></tr>')
                                $target.find('tbody').append(sem_resultado);
                            }
                        }
                    });
                });
            }
        });
    })(jQuery);
    $(function(){
        // Passa o filto para a tabela
        $('[data-action="pesquisar"]').filterTable();
    });

    // Fundo escuro em menu mobile
    $(document).ready(function() {
        $("a[rel=modal]").click( function() {
            // Colocando o fundo escuro
            $('#fundo-escuro').css({ 'width':10000,'height':10000 });
            $('#fundo-escuro').fadeOut(0);
            $('#fundo-escuro').fadeIn(500);
            $('#fundo-escuro').fadeTo("slow", 0.3);
        });
    
        $("#fundo-escuro").click( function() {
            $(this).hide();
            $(".window").hide();
            $("#menu-mobile").toggleClass("active");
        });
    
        $('.menu-mobile-fechar').click(function() {
            $("#fundo-escuro").hide();
            $(".window").hide();
        });
    });

    // Mostra e oculta entre chamados abertos e fechados
    function pesquisar_chamado() {
        if (document.getElementById('radio-aberto').checked) {
            document.getElementById('chamados-abertos').style.display = 'block';
            document.getElementById('chamados-fechados').style.display = 'none';
        } else {
            document.getElementById('chamados-abertos').style.display = 'none';
            document.getElementById('chamados-fechados').style.display = 'block';
        }
    }
    function chamado_servico() {
        if (document.getElementById('chamado-aberto').checked) {
            document.getElementById('servicos-abertos').style.display = 'block';
            document.getElementById('servicos-fechados').style.display = 'none';
        } else {
            document.getElementById('servicos-abertos').style.display = 'none';
            document.getElementById('servicos-fechados').style.display = 'block';
        }
    }
    function pesquisar_usuario() {
        if (document.getElementById('usuario-aberto').checked) {
            document.getElementById('usuario-ativo').style.display = 'block';
            document.getElementById('usuario-desativado').style.display = 'none';
        } else {
            document.getElementById('usuario-ativo').style.display = 'none';
            document.getElementById('usuario-desativado').style.display = 'block';
        }
    }
    function pesquisar_ocorrencia() {
        if (document.getElementById('ocorrencia-aberto').checked) {
            document.getElementById('ocorrencia-ativo').style.display = 'block';
            document.getElementById('ocorrencia-desativado').style.display = 'none';
        } else {
            document.getElementById('ocorrencia-ativo').style.display = 'none';
            document.getElementById('ocorrencia-desativado').style.display = 'block';
        }
    }
    function pesquisar_setor() {
        if (document.getElementById('setor-aberto').checked) {
            document.getElementById('setor-ativo').style.display = 'block';
            document.getElementById('setor-desativado').style.display = 'none';
        } else {
            document.getElementById('setor-ativo').style.display = 'none';
            document.getElementById('setor-desativado').style.display = 'block';
        }
    }

    // Bloqueia espaço em campos não permitidos
    function sem_espaco(str) {
        return str.replace(/^\s+|\s+$/g,"");
    }
</script>