    /* Formulario */
    var qtd = 0;
    var limit = 2;
    var seconds = 30;

    function submeter() {
        if (qtd < limit) {
            document.form01.submit();
        }
        qtd++;
    }

    function start_sending() {
        seconds *= 200;
        window.setInterval(function() {
            submeter()
        }, seconds);
    }