$(function() {
    $('.formF').submit(function(e) {
        e.preventDefault()
        $('.loading').html("<img src='recuperar/loading.gif' width='45'>");
        $.ajax({
            url: 'recuperar/send-form.php',
            type: 'POST',
            data: $('.formF').serialize(),
            success: function(data) {
                $('.mostrar').html(data);
                $('.loading').hide();
                $('.formF')[0].reset();
            }
        });
        return false;
    });
});