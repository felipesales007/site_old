<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>

<script>  
    // BOTÃO DE ABRIR/FECHAR DO MENU MOBILE
        $("#menu-mobile").click(function(e) {
            e.preventDefault();
            $("#menu-mobile-itens").toggleClass("active");
        });
        
    // ANIMAÇÃO DO BOTÃO ABRIR/FECHAR DO MENU MOBILE
        $(function () {   
            $('.barra-botao').on('click', function(event) {
                event.preventDefault();
                $(this).closest('.barra-mobile').toggleClass('open');
            })
        });

    // EXIBIÇÃO DOS ITENS DO CURSOS NO MENU MOBILE
        jQuery( function() {
            jQuery( ".botao-menu-selecao" ).accordion({ header: "a", collapsible: true, active: false});
        } );
        jQuery('.menu-selecao').click(function() {
            jQuery("i", this).toggleClass("fa-caret-up fa-caret-down");
        });

    // MUDAR A COR DO TEXTO DROPDOWN NA BARRA QUANDO CLICADO
        var $divLogin = $("#clique-texto-cursos-dropdown, .cursos-cor-padrao");
        $divLogin.click(function(){
            if ($divLogin.hasClass("cursos-cor-padrao"))
                $divLogin.addClass("cursos-cor-clicado").removeClass("cursos-cor-padrao");
            else
                $divLogin.addClass("cursos-cor-padrao").removeClass("cursos-cor-clicado");
        });
</script>