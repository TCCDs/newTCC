<?php
    include_once("../server/Connect.php");
    require_once('phpmailer/PHPMailer/class.phpmailer.php');
    $conn = new Conn();

    if(isset($_POST['ok'])):
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $erro[] = "E-mail invalidao";
        endif;

        $sql = "SELECT LOGIN_USUARIOS FROM login_usuarios WHERE LOGIN_USUARIOS = :LOGIN_USUARIOS";
		$resultado = $conn->getConn()->prepare($sql);
		$resultado->bindParam(':LOGIN_USUARIOS', $email);
        $resultado->execute();
        $resultadoRs = $resultado->fetch(PDO::FETCH_ASSOC);
        $total = $resultado->fetchColumn();

        print_r($resultadoRs);
        print_r($total);
        exit;

        if ($total == 0):
            $erro[] = "O e-mail informado não existe no banco de dados.";
        endif;

        if (count($erro) == 0 && $total > 0):
            $novasenha = substr(md5(time()), 0, 6);
            $nscriptografada = md5(md5($novasenha));

            /* enviar email  */
            $myEmail = "lucasgabriel@supermercadocaravelas.com.br";//é necessário informar um e-mail do próprio domínio
            $headers = "From: $myEmail\r\n";
            $headers .= "Reply-To: $email\r\n";

            /*abaixo contém os dados que serão enviados para o email
            cadastrado para receber o formulário*/

            $corpo = "Formulário enviado\n";
            //$corpo .= "Nome: " . $nome . "\n";
            $corpo .= "Email: " . $email . "\n";
            $corpo .= "Comentários: " . $nscriptografada . "\n";

            $email_to = $email;
            //não esqueça de substituir este email pelo seu.

            //$status = mail($email_to, $assunto, $corpo, $headers);

            if (mail($email_to, $assunto, $corpo, $headers)):
                $sql = "UPDATE login_usuarios SET SENHA_USUARIOS = :SENHA_USUARIOS WHERE EMAIL_USUARIOS = :EMAIL_USUARIOS";
                $resultado = $conn->getConn()->prepare($sql);
                $resultado->bindParam(':SENHA_USUARIOS', $nscriptografada);
                $resultado->bindParam(':EMAIL_USUARIOS', $email);
                $resultado->execute();

                if ($resultado):
                    $erro[] = "Senha alterada com sucesso";
                endif;
            endif;
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
