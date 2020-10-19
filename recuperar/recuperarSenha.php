<?php
    include_once("../server/Connect.php");
    require_once('phpmailer/PHPMailer/class.phpmailer.php');
    $conn = new Conn();

    if(isset($_POST['ok'])):
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $erro[] = "E-mail invalidao";
        endif;

        $sql = "SELECT EMAIL_CLIENTES FROM clientes WHERE EMAIL_CLIENTES = :EMAIL_CLIENTES";
		$resultado = $conn->getConn()->prepare($sql);
		$resultado->bindParam(':EMAIL_CLIENTES', $email);
        $resultado->execute();
        $resultadoRs = $resultado->fetch(PDO::FETCH_ASSOC);
        $total = $resultado->rowCount();

        echo $resultadoRs['EMAIL_CLIENTES'];
        echo '<br>';
        echo $total;

        if ($total == 0):
            $erro[] = "O e-mail informado não existe no banco de dados.";
        else:
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
        endif;
    endif;
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
            if (count($erro) > 0):
                foreach($erro as $msg):
                    echo "<p> $msg </p>";
                endforeach;
            endif;
        ?>
        <form action="" method="post">
            <input type="text" name="email" id="email" placeholder="Seu e-mail" value="<?php echo $_POST['email']; ?>">
            <input type="submit" value="ok" name="ok">
        </form> 
    </body>
</html>
