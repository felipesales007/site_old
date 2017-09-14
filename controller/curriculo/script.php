<!-- Arquivos Core JS -->
<script type="text/javascript" src="../../view/curriculo/recursos/js/jquery.min.js"></script>
<script type="text/javascript" src="../../view/curriculo/recursos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../view/curriculo/recursos/js/material.min.js"></script>

<!-- Plugin para Sliders, documentação completa aqui: http://refreshless.com/nouislider/ -->
<script type="text/javascript" src="../../view/curriculo/recursos/js/nouislider.min.js"></script>

<!-- Plugin para o Datepicker, documentação completa aqui: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script type="text/javascript" src="../../view/curriculo/recursos/js/bootstrap-datepicker.js"></script>

<!-- Centro de Controle para Material Kit: ativando as ondulações, os efeitos de paralaxe, os scripts das páginas de exemplo etc -->
<script type="text/javascript" src="../../view/curriculo/recursos/js/material-kit.js"></script>

<!-- Animações de aparecer no site -->
<script type="text/javascript" src="../../view/curriculo/recursos/js/wow.min.js"></script>

<script type="text/javascript">
    // Inicializa as animações do wow.min.js no site
    new WOW().init();

    // Muda a cor do icone i da caixa de contato
    var $divLogin1 = $(".i_padrao_email");
    var $divLogin2 = $(".i_padrao_whats");
    $divLogin1.click(function(){
        if ($divLogin1.hasClass("i_padrao_email"))
            $divLogin1.addClass("i_clicado_email").removeClass("i_padrao_email");
        else
            $divLogin1.addClass("i_padrao_email").removeClass("i_clicado_email");
    });
    $divLogin2.click(function(){
        if ($divLogin2.hasClass("i_padrao_whats"))
            $divLogin2.addClass("i_clicado_whats").removeClass("i_padrao_whats");
        else
            $divLogin2.addClass("i_padrao_whats").removeClass("i_clicado_whats");
    });
    
    // Para voltar ao topo da página
    $(document).ready(function() {
        $('#subir').click(function(){ 
            $('html, body').animate({scrollTop:0}, 'slow');
            return false;
        });
    });
    
    // Para mudar os itens em resumo
    $('#btn_resumo a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    // Para passagem dos slides automaticamente
    var slideIndex1 = 0;
    var slideIndex2 = 0;
    var slideIndex3 = 0;
    var slideIndex4 = 0;
    showSlides();
    function showSlides() {
        // Equipe Bravo
        var i;
        var slides1 = document.getElementsByClassName("slides1");
        var dots1 = document.getElementsByClassName("passa1");
        for (i = 0; i < slides1.length; i++) {
            slides1[i].style.display = "none";  
        }
        slideIndex1++;
        if (slideIndex1> slides1.length) {slideIndex1 = 1}    
        for (i = 0; i < dots1.length; i++) {
            dots1[i].className = dots1[i].className.replace("active", "");
        }
        slides1[slideIndex1-1].style.display = "block";  
        dots1[slideIndex1-1].className += " active";
        // Running Boy
        var x;
        var slides2 = document.getElementsByClassName("slides2");
        var dots2 = document.getElementsByClassName("passa2");
        for (x = 0; x < slides2.length; x++) {
            slides2[x].style.display = "none";  
        }
        slideIndex2++;
        if (slideIndex2> slides2.length) {slideIndex2 = 1}    
        for (x = 0; x < dots2.length; x++) {
            dots2[x].className = dots2[x].className.replace("active", "");
        }
        slides2[slideIndex2-1].style.display = "block";  
        dots2[slideIndex2-1].className += " active";
        // Chamado Online
        var x;
        var slides3 = document.getElementsByClassName("slides3");
        var dots3 = document.getElementsByClassName("passa3");
        for (x = 0; x < slides3.length; x++) {
            slides3[x].style.display = "none";  
        }
        slideIndex3++;
        if (slideIndex3> slides3.length) {slideIndex3 = 1}    
        for (x = 0; x < dots3.length; x++) {
            dots3[x].className = dots3[x].className.replace("active", "");
        }
        slides3[slideIndex3-1].style.display = "block";  
        dots3[slideIndex3-1].className += " active";
        // Outros
        var x;
        var slides4 = document.getElementsByClassName("slides4");
        var dots4 = document.getElementsByClassName("passa4");
        for (x = 0; x < slides4.length; x++) {
            slides4[x].style.display = "none";  
        }
        slideIndex4++;
        if (slideIndex4> slides4.length) {slideIndex4 = 1}    
        for (x = 0; x < dots4.length; x++) {
            dots4[x].className = dots4[x].className.replace("active", "");
        }
        slides4[slideIndex4-1].style.display = "block";  
        dots4[slideIndex4-1].className += " active";

        setTimeout(showSlides, 3000); // Tempo de passagem das imagens
    }
        
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

    // Mostra notificações na tela
    $('.popup').popover();
    window.setTimeout(function() {
        $(".popup").fadeTo(2000, 500).slideUp(500, function() {
            $(this).remove(); 
        });
    // 1000 = 1 minuto é Tempo que permanecerá na tela
    }, 3000);

    // Para mostrar os conhecimentos ao clicar o botão
    $('#aparecer_web').ready(function() {
        $('#conhecimento_web').fadeToggle('slow');
        $('#aparecer_web').click(function() {
            $('#conhecimento_web').fadeToggle('slow');
        });
    });
    $('#aparecer_desktop').ready(function() {
        $('#conhecimento_desktop').fadeToggle('slow');
        $('#aparecer_desktop').click(function() {
            $('#conhecimento_desktop').fadeToggle('slow');
        });
    });
    $('#aparecer_suporte').ready(function() {
        $('#conhecimento_suporte').fadeToggle('slow');
        $('#aparecer_suporte').click(function() {
            $('#conhecimento_suporte').fadeToggle('slow');
        });
    });

    // Zoom das imagens
    function onClick(element) {
        document.getElementById("imagem").src = element.src;
        document.getElementById("escurecer").style.display = "block";
        var captionText = document.getElementById("zoom");
        captionText.innerHTML = element.alt;
    }

    // Mostra icone de carregamento
    function valida_form () {
        if((document.getElementById("mensagem_nome").value != "") 
        || (document.getElementById("mensagem_email").value != "")
        || (document.getElementById("mensagem_mensagem").value != "")) {
            document.getElementById('carregando').innerHTML = '<i class="fa fa-spinner fa-pulse"></i>&ensp;';
        }
    }
</script>