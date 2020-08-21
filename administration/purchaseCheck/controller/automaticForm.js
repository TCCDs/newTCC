    /* Formulario */
    /*var qtd = 0;
    var limit = 2;
    var seconds = 20;

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
    }*/


    // document.form01.submit();

    (function() {
        var $qrcode = document.getElementById('testeQRcode')

        function handleSubmit() {
            if ($qrcode.value) {
                //this.form.submit();
                document.form01.submit();
            } else {
                alert("Realizar a leitura do QR CODE");
            }
        }

        $qrcode.addEventListener('blur', handleSubmit);
    })();

    /*document.getElementById('testeQRcode').addEventListener('change', function() {
        this.form.submit();
    });*/