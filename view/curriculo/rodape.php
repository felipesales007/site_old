<?php include("../../controller/curriculo/script.php"); ?>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s" data-toggle="tooltip" data-placement="bottom" title="Enviar um e-mail">
                    <a id="nao_link" data-toggle="modal" data-target="#contato">
                        Contato
                    </a>
                </li>
                <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s" data-toggle="tooltip" data-placement="bottom" title="Download em PDF">
                    <a id="nao_link" href="recursos/arquivo/Curriculo_Felipe.pdf" target="_blank">
                        Currículo
                    </a>
                </li>
            </ul>
             <ul>
                <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.1s" data-toggle="tooltip" data-placement="bottom" title="Informações">
                    <a id="nao_link" href="resumo.php">
                        Resumo
                    </a>
                </li>
            </ul>
        </nav>
        <div class="pull-right wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
            <button id="subir" class="btn btn-primary btn-just-icon up">Topo <i class="material-icons">navigation</i></button>
        </div>
        
        <center class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
            <img id="dog" class="late" src="recursos/img/dog.png" data-toggle="tooltip" data-placement="top" title="AU AU!!!">
            <div id="googleMap"></div>
            <!-- <script type="text/javascript" src="recursos/js/googlemaps.js"></script> -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhGm54wZN66gyk9MdQF1xLs6RY-WGumRU&callback=myMap"></script>
        </center>
        <br>
        <center class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".0s">
            <div id="rodape_nome">&copy; 2017, Desenvolvido por Felipe Sales</div>
            <p>Ser desenvolvedor é uma viagem onde a próxima parada é a solução de um problema.</p>
        </center>
    </div>
</footer>

<?php include("../../controller/curriculo/script_som.php"); ?>