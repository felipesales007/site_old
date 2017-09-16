<!-- CONFIRMAÇÃO PARA DELETAR CHAMADO -->
    <script src='../../view/chamado/recursos/css/bootstrap/js/bootstrap.min.js'></script>
<!-- /CONFIRMAÇÃO PARA DELETAR CHAMADO -->

<!-- /ENTER EM TELA DE CONFIRMAÇÃO -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- /ENTER EM TELA DE CONFIRMAÇÃO -->

<!-- Para enter direito no botão -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- /Para enter direito no botão -->

<!-- Validador do formulario -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <script src="../../view/chamado/recursos/js/chamado_validador.js"></script>
<!-- /Validador do formulario -->

<!-- Auto clique na aba da tabela -->
    <script async src="../../view/chamado/recursos/js/tabela_barra.js"></script>
<!-- /Auto clique na aba da tabela -->

<script>
    // Ação do Menu lateral
        $(document).on("click",".sidebar-toggle",function(){
            $(".wrapper").toggleClass("toggled");
        });  
        
    // Mouse sobre item aparece diferente (com balão escuro)
        $(function () {
            $('[data-mensager="tooltip"]').tooltip();
        });
        
    // Botão de fechar do menu de opções do cabeçalho
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#msidebar-wrapper").toggleClass("active");
        });
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#msidebar-wrapper").toggleClass("active");
        });

    // Mostra notificações na tela
        $('.popovers').popover();
            window.setTimeout(function() {
                $(".popupunder").fadeTo(2000, 500).slideUp(500, function(){
                    $(this).remove(); 
                });
            // 500 : Tempo que permanecerá na tela
            }, 500);

    // Animação do botão do menu lateral
            $(function () {   
            $('.navbar-toggler').on('click', function(event) {
                event.preventDefault();
                $(this).closest('.navbar-minimal').toggleClass('open');
            })
        });

    // Filtra os dados da tabela
        (function(){
            'use strict';
            var $ = jQuery;
            $.fn.extend({
                filterTable: function(){
                    return this.each(function(){
                        $(this).on('keyup', function(e){
                            $('.filterTable_no_results').remove();
                            var $this = $(this), 
                                search = $this.val().toLowerCase(), 
                                target = $this.attr('data-filters'), 
                                $target = $(target), 
                                $rows = $target.find('tbody tr');
                                
                            if(search == '') {
                                $rows.show(); 
                            } else {
                                $rows.each(function(){
                                    var $this = $(this);
                                    $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                })
                                if($target.find('tbody tr:visible').size() === 0) {
                                    var col_count = $target.find('tr').first().find('td').size();
                                    // var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">Nada econtrado</td></tr>')
                                    $target.find('tbody').append(no_results);
                                }
                            }
                        });
                    });
                }
            });
        })(jQuery);

        $(function(){
            // Passa o filto para a tabela
            $('[data-action="filtery"]').filterTable();
        })

    // Copiar o IP digitado
        var copyTextareaBtn = document.querySelector('.copiar');
        copyTextareaBtn.addEventListener('click', function(event) {
            var copyTextarea = document.querySelector('#copia');
            copyTextarea.select();
            var successful = document.execCommand('copy');
        });
        
    // Enter direto no botão principal da tela
        $(document).keypress(function(e) {
            if(e.which == 13) $('#enter').click();
        }); 
    
    // Permitir somente digitos numericos no campo ramal
        function numeroR(e){
            var expressao;
            expressao = /[0-9]+$/;
            if(expressao.test(String.fromCharCode(e.keyCode))){
                return true;
            }else{
                return false;
            }
        }

    // Permitir somente digitos numericos no campo IP
        function numero(e){
            var expressao;
            expressao = /[0-9.]+$/;
            if(expressao.test(String.fromCharCode(e.keyCode))){
                return true;
            }else{
                return false;
            }
        }
</script>