<?php
    include_once("../server/Connect.php");
    require_once('phpmailer/PHPMailer/class.phpmailer.php');
    $conn = new Conn();
	$email = utf8_decode($_POST['email']);

	if(!empty($email)){

		$sql = "SELECT EMAIL_CLIENTES FROM clientes WHERE EMAIL_CLIENTES = :EMAIL_CLIENTES";
		$resultado = $conn->getConn()->prepare($sql);
		$resultado->bindParam(':EMAIL_CLIENTES', $email);
		$resultado->execute();
		$resultadoRs = $resultado->fetch(PDO::FETCH_ASSOC);
		$total = $resultado->rowCount();
		
		if ($total == 0){
			echo  "O e-mail informado não existe no banco de dados.";
		} else {
			$novasenha = substr(md5(time()), 0, 8);
			$nscriptografada = md5(md5($novasenha));
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
				$id = 1;
				$sql = "UPDATE login_usuarios SET SENHA_USUARIOS = :SENHA_USUARIOS WHERE  ID_USUARIOS = :ID_USUARIOS";
                $resultado = $conn->getConn()->prepare($sql);
                $resultado->bindParam(':SENHA_USUARIOS', $nscriptografada);
                $resultado->bindParam(':ID_USUARIOS', $id);
                $resultado->execute();

                if ($resultado):
                    echo "Senha alterada com sucesso";
				endif;
				
				echo "<script> alert('Formulário enviado com sucesso!'); </script>";
			} else {
				echo "<script> alert('Falha ao enviar o Formulário.'); </script>";
			}
		}
	} else {
		echo "preencher campo email";
	}



