(function() {
    var fakeMsg, fakeNum, isTyping, messages, uctTimer;

    messages = $(".messages-content");

    fakeNum = 0;

    isTyping = true;

    uctTimer = null;

    // tempo de mensagem sendo digitada
    window.userTypingClear = function() {
        return uctTimer = setTimeout(function() {
            $(".message.personal.typing").remove();
            return isTyping = true;
        }, 2000);
    };

    // informa a hora de envio da mensagem
    window.setDate = function() {
        var d, timestamp;
        timestamp = $("<span>").addClass("timestamp");
        d = new Date();
        timestamp.text(d.getHours() + ":" + (d.getMinutes() < 10 ? '0' : '') + d.getMinutes());
        return timestamp.appendTo($('.message:last'));
    };


    // rola o scroll para baixo automaticamente
    window.updateScrollbar = function() {
        return messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
            scrollInertia: 10,
            timeout: 0
        });
    };

    // mensagens de teste
    fakeMsg = ["Cadê você olhe o horário", "Nice to meet you", "How are you doing?", "Pretty good", "How\'s life been treating you?", "It could be worse, thanks", "I\'ve gotta go now", "It was a pleasure chat with you", "Bye :)"];

    // mensagens fakes
    window.setFakeMessage = function() {
        $(".fe-contato-status-ativo").addClass("fe-hide");
        $(".fe-contato-status-digitando").removeClass("fe-hide");
        updateScrollbar();
        return setTimeout(function() {
            var msg;
            $(".fe-contato-status-ativo").removeClass("fe-hide");
            $(".fe-contato-status-digitando").addClass("fe-hide");
            msg = $("<div>").addClass("message client");
            msg.text(fakeMsg[fakeNum]);
            msg.appendTo($('.mCSB_container'));
            setDate();
            updateScrollbar();
            return fakeNum++;
        }, 1000 + (Math.random() * 10) * 100);
    };

    // envia a mensagem
    window.insertMessage = function() {
        var msg, msgText;
        msgText = $(".fe-textarea-chat-texto").val();
        if ($.trim(msgText) === "") {
            return false;
        }
        msg = $("<div>").addClass("message user");
        msg.text(msgText);
        msg.addClass("personal").appendTo($('.mCSB_container'));
        setDate();
        updateScrollbar();
        $(".fe-textarea-chat-texto").val(null);
        $(".message.personal.typing").remove();
        isTyping = true;
        updateScrollbar();
        clearTimeout(uctTimer);
        if ($.trim(fakeMsg[fakeNum]) === "") {
            return false;
        }
        return setTimeout(function() {
            return setFakeMessage();
        }, 500 + (Math.random() * 10) * 100);
    };

    // enter envia a mensagem
    $(window).on('keydown', function(e) {
        if (e.which === 13) {
            insertMessage();
            return false;
        }
    });

    // envia a mensagem e faz o scroll rolar para baixo
    $(window).load(function() {
        messages.mCustomScrollbar();
    });

    // enviar mensagem desce o scroll
    if ($(".fe-textarea-chat-texto") !== "" && isTyping === true && e.which !== 13) {
        updateScrollbar();
    }
}).call(this);