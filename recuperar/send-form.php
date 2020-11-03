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
			$password_hash = password_hash($novasenha, PASSWORD_DEFAULT);
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
				$sql = "UPDATE login_usuarios SET SENHA_USUARIOS = :SENHA_USUARIOS WHERE  LOGIN_USUARIOS = :LOGIN_USUARIOS";
                $resultado = $conn->getConn()->prepare($sql);
                $resultado->bindParam(':SENHA_USUARIOS', $password_hash);
                $resultado->bindParam(':LOGIN_USUARIOS', $email);
                $resultado->execute();

                if ($resultado):
                    echo "<script>  Swal.fire({
						icon: 'success',
						title: 'Supermercado Caravelas!',
						text: 'Senha alterada com sucesso',
						type: 'success',
						confirmButtonText: 'Feito...!'
					}); </script>";
				endif;
				
				echo "<script>  Swal.fire({
					icon: 'success',
					title: 'Supermercado Caravelas!',
					text: 'Formulário enviado com sucesso',
					type: 'success',
					confirmButtonText: 'Feito...!'
				}); </script>";
			} else {
				echo "<script>  Swal.fire({
					icon: 'error',
					title: 'Supermercado Caravelas!',
					text: dados.return,
					type: 'error',
					confirmButtonText: 'Tente novamente...!'
				}) </script>";
			}
		}
	} else {
		echo "<script>  Swal.fire({
			icon: 'error',
			title: 'Supermercado Caravelas!',
			text: 'Preencha o campo',
			type: 'error',
			confirmButtonText: 'Tente novamente...!'
		}) </script>";
	}



