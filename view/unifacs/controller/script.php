<!-- Arquivos Core JS -->
<script type="text/javascript" src="../view/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../view/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../view/assets/js/material.min.js"></script>

<!-- Plugin para Sliders, documentação completa aqui: http://refreshless.com/nouislider/ -->
<script type="text/javascript" src="../view/assets/js/nouislider.min.js"></script>

<!-- Plugin para o Datepicker, documentação completa aqui: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script type="text/javascript" src="../view/assets/js/bootstrap-datepicker.js"></script>

<!-- Centro de Controle para Material Kit: ativando as ondulações, os efeitos de paralaxe, os scripts das páginas de exemplo etc -->
<script type="text/javascript" src="../view/assets/js/material-kit.js"></script>

<!-- Animações de aparecer -->
<script type="text/javascript" src="../view/assets/js/wow.min.js"></script>

<script type="text/javascript">
    // Inicializa as animações do wow.min.js no site
    new WOW().init();

    // Mostra icone de carregamento do login
    function login_valida () {
        if((document.getElementById("login_nome").value != "") 
        || (document.getElementById("login_senha").value != "")) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }

    // Enter direto no botão principal da tela
    $(document).keypress(function(e) {
        if(e.which == 13) $('#enter').click();
    });

    // Mostra o menu lateral esquerdo
    $(document).on("click",".menu_lateral_esquerdo", function() {
        $(".wrapper").toggleClass("toggled");
    });

    // Animação do botão do menu lateral esquerdo
    $(function () {   
        $('.navbar-toggler').on('click', function(event) {
            event.preventDefault();
            $(this).closest('.navbar-minimal').toggleClass('open');
        })
    });
        
    // Para visualização do Google Maps
    function myMap() {
        // Aqui é necessario você colocar a sua localização por coordenadas (por numeros) acesse: http://www.mapcoordinates.net/pt para obtelas
        myCenter = new google.maps.LatLng(-12.93172685, -38.44441295);
        var mapOptions = {
            center: myCenter,
            zoom: 14, scrollwheel: true, draggable: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }

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

        // Posicionamento rodapé
        window.onload = posicionaRodape;
        window.onresize = posicionaRodape;

        function posicionaRodape() {

            var rodape = document.querySelector("#rodape");

            var tamanhoTela = window.innerHeight;

            if (rodape.offsetTop < tamanhoTela - rodape.offsetHeight) {
                conteudo.style.marginBottom = (tamanhoTela - rodape.offsetHeight - 20) + "px";
            } else {
                conteudo.style.marginBottom = "20px";
            }
        }
</script>