$('input[name="FlgPontua"]').change(function() {
    if ($('input[name="FlgPontua"]:checked').val() === "Sim") {
        $('.camposExtras').show();
    } else {
        $('.camposExtras').hide();
    }
});