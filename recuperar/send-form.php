<?php
	require_once('phpmailer/PHPMailer/class.phpmailer.php');

	if($_POST){
		if(empty($_POST['email'])){
			echo '<script>
					$(document).ready(function(){
						swal("Ops...","Preencha todos os campos obrigatórios!","warning");
					});
				</script>';
		}else{
			$email 		= utf8_decode($_POST['email']);
			$novasenha = substr(md5(time()), 0, 8);
			$assunto 	= 'Recuperar senha';

			$myEmail = "lucasgabriel@supermercadocaravelas.com.br";
			$headers = "From: $myEmail\r\n";
			$headers .= "Reply-To: $email\r\n";

			$corpo = "Formulário enviado\n";
			$corpo .= "Email: " . $email . "\n";
			$corpo .= "Sua nova senha : " . $novasenha . "\n";

			$email_to = $email;
			$status = mail($email_to, $assunto, $corpo, $headers);

			if ($status) {
				echo "<script> alert('Formulário enviado com sucesso!'); </script>";
			} else {
				echo "<script> alert('Falha ao enviar o Formulário.'); </script>";
			}
		}
	}


