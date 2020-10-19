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
		$telefone 	= utf8_decode($_POST['telefone']);
		$mensagem 	= utf8_decode($_POST['mensagem']);
		$assunto 	= 'Contato enviado pelo site';
		
		
		require_once('phpmailer/PHPMailer/class.phpmailer.php');
		require_once('phpmailer/PHPMailer/class.smtp');

		$Email = new PHPMailer();
		$Email->SetLanguage("br");
		$Email->IsSMTP(); // Habilita o SMTP 
		$Email->SMTPAuth = true; //Ativa e-mail autenticado
		$Email->Host = 'smtp.umbler.com'; //Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
		$Email->Port = '587'; // Porta de envio
		$Email->SMTPSecure = 'tls';
		$Email->Username = 'lucasgabriel@supermercadocaravelas.com.br'; //e-mail que será autenticado
		$Email->Password = '#1449#LG#ubuntu2020'; // senha do email
		// ativa o envio de e-mails em HTML, se false, desativa.
		$Email->IsHTML(true); 
		// email do remetente da mensagem
		$Email->CharSet = 'iso-8859-1';
		$Email->From = $email;
		//$Email->SMTPDebug = 2; //mostra erros mais detalhados caso houver
		// nome do remetente do email
		$Email->FromName = ($nome);
		// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
		$Email->AddReplyTo($email, $nome);
		$Email->AddAddress($email); //  para quem será enviada a mensagem
		//$Email->AddCC('email@hotmail.com', 'Nome da pessoa'); // Copia
		//$Email->AddBCC('email@hotmail.com.br', 'Nome da pessoa'); // Cópia Oculta
		// informando no email, o assunto da mensagem
		$Email->Subject = utf8_decode($assunto);
		// Define o texto da mensagem (aceita HTML)
		$Email->Body .= "<br />
						 <strong>Nome:</strong> $nome<br />									
						 <strong>E-mail:</strong> $email<br />
						 <strong>Telefone:</strong> $telefone<br />
						 <strong>Mensagem:</strong> $mensagem									
						 ";	
		// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
		if(!$Email->Send()){				
			 echo'
			<script>
				$(document).ready(function(){
					swal("Ops '.utf8_encode($nome).'...","Houve um erro ao enviar a mensagem, tente novamente!", "error");
				});
			</script>';

		}else{
			 echo'
		<script>
			$(document).ready(function(){
				swal("Sucesso '.utf8_encode($nome).'...", "Sua mensagem foi enviada. \n Obrigado pelo contato!", "success")
			});
		</script>';

		}		
	}
}


