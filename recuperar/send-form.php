<?php
if($_POST){
	
	if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['mensagem'])){
		echo '<script>
			$(document).ready(function(){
				swal("Ops...","Preencha todos os campos obrigatórios!","warning");
			});
			</script>';
	}else{
		$nome 		= utf8_decode($_POST['nome']);
		$email 		= utf8_decode($_POST['email']);
		$mensagem 	= utf8_decode($_POST['mensagem']);
		$assunto 	= 'Contato enviado pelo site';
		
		require_once('phpmailer/PHPMailer/class.phpmailer.php');

		$myEmail = "lucasgabriel@supermercadocaravelas.com.br";//é necessário informar um e-mail do próprio domínio
		$headers = "From: $myEmail\r\n";
		$headers .= "Reply-To: $email\r\n";

		/*abaixo contém os dados que serão enviados para o email
		cadastrado para receber o formulário*/

		$corpo = "Formulário enviado\n";
		$corpo .= "Nome: " . $nome . "\n";
		$corpo .= "Email: " . $email . "\n";
		$corpo .= "Comentários: " . $mensagem . "\n";

		$email_to = $email;
		//não esqueça de substituir este email pelo seu.

		$status = mail($email_to, $assunto, $corpo, $headers);
		//enviando o email.

		if ($status) {
		echo "<script> alert('Formulário enviado com sucesso!'); </script>";
		
		//mensagem de form enviado com sucesso.

		} else {
		echo "<script> alert('Falha ao enviar o Formulário.'); </script>";
		
		//mensagem de erro no envio. 

		}
	}
}


