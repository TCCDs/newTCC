$(function() {

    $('.ok').click(function(e) {
        e.preventDefault()

        var dados = $('#formF').serialize()
        var url = "recuperar/send-form.php"

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            async: true,
            data: dados,
            success: function(data) {
                $('.mostrar').html(data);
                $('.loading').hide();
                $('.formF')[0].reset();
            }
        });
    });
    // $('.formF').submit(function(e) {
    //     e.preventDefault()
    //     $('.loading').html("<img src='recuperar/loading.gif' width='45'>");
    //     $.ajax({
    //         url: 'recuperar/send-form.php',
    //         type: 'POST',
    //         data: $('.formF').serialize(),
    //         success: function(data) {
    //             $('.mostrar').html(data);
    //             $('.loading').hide();
    //             $('.formF')[0].reset();
    //         }
    //     });
    //     return false;
    // });
});