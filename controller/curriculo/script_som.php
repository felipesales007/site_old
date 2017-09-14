<script>
    // Som ao passar o mouse no cachorro
    var audio = null;
    var classes = ['late'];
    for(var i = 0; i < classes.length; i++) {
        var elements = document.getElementsByClassName(classes[i]);
        for(var j = 0; j < elements.length; j++) {
            elements[j].onmouseover = function(event) {
                event.preventDefault();
                audio = document.createElement('audio');
                audio.src = 'recursos/som/auau.mp3';
                audio.autoplay = true;
                document.body.appendChild(audio);
            }
        }
    }

    // Som ao clicar no cachorro
    var audio = null;
    var classes = ['late'];
    for(var i = 0; i < classes.length; i++) {
        var elements = document.getElementsByClassName(classes[i]);
        for(var j = 0; j < elements.length; j++) {
            elements[j].onclick = function(event) {
                event.preventDefault();
                audio = document.createElement('audio');
                audio.src = 'recursos/som/auau.mp3';
                audio.autoplay = true;
                document.body.appendChild(audio);
            }
        }
    }

    // Som ao clicar para o topo
    var audio = null;
    var classes = ['up'];
    for(var i = 0; i < classes.length; i++) {
        var elements = document.getElementsByClassName(classes[i]);
        for(var j = 0; j < elements.length; j++) {
            elements[j].onclick = function(event) {
                event.preventDefault();
                audio = document.createElement('audio');
                audio.volume = 0.1;
                audio.src = 'recursos/som/up.mp3';
                audio.autoplay = true;
                document.body.appendChild(audio);
            }
        }
    }
</script>