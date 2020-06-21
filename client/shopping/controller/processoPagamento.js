function validate_form() {
    var valid_card = 0;
    var valid = false;
    var CODIGO_CARTAO = $('#CODIGO_CARTAO').val();
    var CARTAO_VALIDADE_MES = $('#CARTAO_VALIDADE_MES').val();
    var CARATO_VALIDADE_ANO = $('#CARATO_VALIDADE_ANO').val();
    var NUMERO_CARTAO = $('#NUMERO_CARTAO').val();
    var NOME_CARTAO = $('#NOME_CARTAO').val();
    var EMAIL_CLIENTE = $('#EMAIL_CLIENTE').val();
    var NOME_CARTAO = $('#NOME_CARTAO').val();
    var name_expression = /^[a-z ,.'-]+$/i;
    var email_expression = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
    var month_expression = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var year_expression = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var cvv_expression = /^[0-9]{3,3}$/;

    $('#NUMERO_CARTAO').validateCreditCard(function(result) {
        if (result.valid) {
            $('#NUMERO_CARTAO').removeClass('require');
            $('#error_NUMERO_CARTAO').text('');
            valid_card = 1;
        } else {
            $('#NUMERO_CARTAO').addClass('require');
            $('#error_NUMERO_CARTAO').text('Invalid Card Number');
            valid_card = 0;
        }
    });

    if (valid_card == 1) {
        if (!month_expression.test(CARTAO_VALIDADE_MES)) {
            $('#CARTAO_VALIDADE_MES').addClass('require');
            $('#error_CARTAO_VALIDADE_MES').text('Invalid Data');
            valid = false;
        } else {
            $('#CARTAO_VALIDADE_MES').removeClass('require');
            $('#error_CARTAO_VALIDADE_MES').text('');
            valid = true;
        }

        if (!year_expression.test(CARATO_VALIDADE_ANO)) {
            $('#CARATO_VALIDADE_ANO').addClass('require');
            $('#error_CARATO_VALIDADE_ANO').error('Invalid Data');
            valid = false;
        } else {
            $('#CARATO_VALIDADE_ANO').removeClass('require');
            $('#error_CARATO_VALIDADE_ANO').error('');
            valid = true;
        }

        if (!cvv_expression.test(CODIGO_CARTAO)) {
            $('#CODIGO_CARTAO').addClass('require');
            $('#error_CODIGO_CARTAO').text('Invalid Data');
            valid = false;
        } else {
            $('#CODIGO_CARTAO').removeClass('require');
            $('#error_CODIGO_CARTAO').text('');
            valid = true;
        }
        if (!name_expression.test(NOME_CARTAO)) {
            $('#NOME_CARTAO').addClass('require');
            $('#error_NOME_CARTAO').text('Invalid Name');
            valid = false;
        } else {
            $('#NOME_CARTAO').removeClass('require');
            $('#error_NOME_CARTAO').text('');
            valid = true;
        }

        /*
        if (!email_expression.test(EMAIL_CLIENTE)) {
            $('#EMAIL_CLIENTE').addClass('require');
            $('#error_EMAIL_CLIENTE').text('Invalid Email Address');
            valid = false;
        } else {
            $('#EMAIL_CLIENTE').removeClass('require');
            $('#error_EMAIL_CLIENTE').text('');
            valid = true;
        }*/
        }
    }
    return valid;
}

Stripe.setPublishableKey('pk_test_oUv42o98WkQMB9EFQovuHXDX00wJ8Pmz9w');

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#button_action').attr('disabled', false);
        $('#message').html(response.error.message).show();
    } else {
        var token = response['id'];
        $('#order_process_form').append("<input type='hidden' name='token' value='" + token + "' />");

        $('#order_process_form').submit();
    }
}

function stripePay(event) {
    event.preventDefault();

    if (validate_form() == true) {
        $('#button_action').attr('disabled', 'disabled');
        $('#button_action').val('Processo de pagamento....');
        Stripe.createToken({
            number: $('#NUMERO_CARTAO').val(),
            cvc: $('#CODIGO_CARTAO').val(),
            exp_month: $('#CARTAO_VALIDADE_MES').val(),
            exp_year: $('#CARTAO_VALIDADE_ANO').val()
        }, stripeResponseHandler);
        return false;
    }
}


function only_number(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode != 32 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}