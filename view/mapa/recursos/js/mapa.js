// localização padrão no google mapa
var mapa;
var posicaoInicial = new google.maps.LatLng(-12.237052, -38.601861);
var zoom = 13;

function start() {
    var configuracao = {
        center: posicaoInicial,
        zoom: zoom
    };

    // imagem do marcador do mapa
    var image = 'recursos/img/marcador.png';

    // google mapa
    mapa = new google.maps.Map(document.getElementById("mapa"), configuracao);

    for (i = 0; i < localizacaoLista.length; i++) {
        marcador = new google.maps.Marker({
            position: new google.maps.LatLng(localizacaoLista[i][0], localizacaoLista[i][1]),
            map: mapa,
            icon: image
        });
    }

    var logoDiv = document.createElement('div');
    var logoControle = new LogoControl(logoDiv, mapa);
    logoDiv.index = 1;
    mapa.controls[google.maps.ControlPosition.TOP_CENTER].push(logoDiv);
}

// logo do mapa
function LogoControl(logo, mapa) {
    logo.style.padding = '25px';
    var div = document.createElement('div');
    div.style.backgroundImage = 'url(recursos/img/logo.png)';
    div.style.width = '256px';
    div.style.height = '65px';
    div.style.cursor = 'pointer';
    div.title = 'Faça sua denúncia';
    logo.appendChild(div);
}

// mostra mapa com as configurações acima
google.maps.event.addDomListener(window, 'load', start);

// gera números randomicos paras as coordenadas
function numeroRandom() {
    localizacaoRondom.push(
        '[' + (Math.floor(Math.random() * 1) - 12) + '.' + (Math.floor(Math.random() * 541813) + 1991111),
        (Math.floor(Math.random() * 1) - 38) + '.' + (Math.floor(Math.random() * 111111) + 552759) + '],'
    );
    document.getElementById("ponto").innerHTML = localizacaoRondom;
}