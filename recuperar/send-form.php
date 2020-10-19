<?php
	include_once("../server/Connect.php");
	require_once('phpmailer/PHPMailer/class.phpmailer.php');
	$conn = new Conn();

if($_POST){
	
	if(empty($_POST['email'])){
		echo '<script>
				$(document).ready(function(){
					swal("Ops...","Preencha todos os campos obrigatórios!","warning");
				});
			</script>';
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $erro[] = "E-mail invalidao";
        endif;

        $sql = "SELECT * FROM login_usuarios WHERE LOGIN_USUARIOS = :LOGIN_USUARIOS";
		$resultado = $conn->getConn()->prepare($sql);
		$resultado->bindParam(':LOGIN_USUARIOS', $email);
        $resultado->execute();
        $resultadoRs = $resultado->fetch(PDO::FETCH_ASSOC);
        $total = $resultado->rowCount();

        if ($total == 0):
            $erro[] = "O e-mail informado não existe no banco de dados.";
        endif;

        if (count($erro) == 0 && $total > 0):
            $novasenha = substr(md5(time()), 0, 6);
            $nscriptografada = md5(md5($novasenha));

			// email
			$email 		= utf8_decode($_POST['email']);
			$assunto 	= 'Contato enviado pelo Supermercado Caravelas';

			$myEmail = "lucasgabriel@supermercadocaravelas.com.br";//é necessário informar um e-mail do próprio domínio
			$headers = "From: $myEmail\r\n";
			$headers .= "Reply-To: $email\r\n";

			/*abaixo contém os dados que serão enviados para o email
			cadastrado para receber o formulário*/

			$corpo = "Formulário enviado\n";
			//$corpo .= "Nome: " . $nome . "\n";
			$corpo .= "Email: " . $email . "\n";
			$corpo .= "Sua nova senha: " . $nscriptografada . "\n";

			$email_to = $email;
			//não esqueça de substituir este email pelo seu.

			$status = mail($email_to, $assunto, $corpo, $headers);

			//enviando o email.

			if ($status) {
				$sql = "UPDATE login_usuarios SET SENHA_USUARIOS = :SENHA_USUARIOS WHERE EMAIL_USUARIOS = :EMAIL_USUARIOS";
				$resultado = $conn->getConn()->prepare($sql);
				$resultado->bindParam(':SENHA_USUARIOS', $nscriptografada);
				$resultado->bindParam(':EMAIL_USUARIOS', $email);
				$resultado->execute();

				echo "<script> alert('Formulário enviado com sucesso!'); </script>";
			
			//mensagem de form enviado com sucesso.

			} else {
			echo "<script> alert('Falha ao enviar o Formulário.'); </script>";
			
			//mensagem de erro no envio. 

			}
		endif;
	}
}


