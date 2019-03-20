<script>
    // Para passagem dos slides automaticamente
    var slideIndex1 = 0;
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

        setTimeout(showSlides, 4000); // Tempo de passagem das imagens
    }
</script>