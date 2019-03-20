
/* ---------------------------------------------------------
 * WhatsApp Master Template v0.0.8
 * Copyright 2018, Felipe Sales (https://felipesales.com.br)
 * E-mail: felipesales007@hotmail.com
 * Atualizado em 31/10/2018
 * Licença livre
/* --------------------------------------------------------- */

/* -----------------------------------------------
 * Javascript para todo o WhatsApp Master Template
/* ----------------------------------------------- */


/* ----------------
 * lista de contato
/* ---------------- */

for (var contato = 1; contato <= 23; contato++) {
    var contatos = `
        <div id="fe-contato-clicado">
            <div class="fe-lista-contato-item">
                <img class="fe-margin-16 fe-circulo-contato fe-center-y" src="assets/image/perfil/perfil-` + contato + `.png">
                <div class="fe-lista-contato-nome">Contato</div>
                <div class="fe-lista-contato-hora fe-right">09:46</div>
                <div class="fe-lista-contato-resumo">Oi Tudo bem?</div>
            </div>
        </div>
    `
    document.getElementById('fe-contatos-repeticao').innerHTML += contatos;
}


/* --------------------
 * Buscador de contatos
/* -------------------- */

// quando clicado
$(".fe-input-buscar").focusin(function() {
    $(".fe-buscador").css("background-color", "#ffffff");
    $(".fe-buscador i").css("display", "inline").fadeOut(0);
    document.getElementById("fe-buscador").style.boxShadow = "0px 0.1px 7px -0.9px rgba(191,191,191,1)";
});
// quando desclicado
$(".fe-input-buscar").focusout(function() {
    $(".fe-buscador").css("background-color", "#fbfbfb");
    $(".fe-buscador i").css("display", "visible").fadeIn(0);
    document.getElementById("fe-buscador").style.boxShadow = "none";
});


/* ---------------------------------
 * lista de contato em nova conversa
/* --------------------------------- */

for (var ncontato = 1; ncontato <= 23; ncontato++) {
    var ncontatos = `
        <div id="fe-contato-clicado">
            <div class="fe-lista-contato-item">
                <img class="fe-margin-16 fe-circulo-contato fe-center-y" src="assets/image/perfil/perfil-` + ncontato + `.png">
                <div class="fe-lista-contato-nome">Contato</div>
                <div class="fe-lista-contato-hora fe-right">09:46</div>
                <div class="fe-lista-contato-resumo">Oi Tudo bem?</div>
            </div>
        </div>
    `
    document.getElementById('fe-nova-conversa-repeticao').innerHTML += ncontatos;
}


/* -------------------------------------
 * Buscador de contatos em nova conversa
/* ------------------------------------- */

// quando clicado
$(".fe-input-buscar").focusin(function() {
    $(".fe-buscador").css("background-color", "#ffffff");
    $(".fe-buscador i").css("display", "inline").fadeOut(0);
    document.getElementById("fe-nova-conversa-buscador").style.boxShadow = "0px 0.1px 7px -0.9px rgba(191,191,191,1)";
});
// quando desclicado
$(".fe-input-buscar").focusout(function() {
    $(".fe-buscador").css("background-color", "#fbfbfb");
    $(".fe-buscador i").css("display", "visible").fadeIn(0);
    document.getElementById("fe-nova-conversa-buscador").style.boxShadow = "none";
});


/* --------------------------
 * Nova conversa abrir/fechar
/* -------------------------- */

document.getElementById('fe-nova-conversa-abrir').addEventListener("click",function() {
    var menu = document.getElementById('fe-nova-conversa');
    menu.style.left = "0px";
});
document.getElementById('fe-nova-conversa-fechar').addEventListener("click",function() {
    var menu = document.getElementById('fe-nova-conversa');
    menu.style.left = "-100%";
});