<?php
	session_start();
	include_once("../../server/conexao.php");

	$usuario = $_POST['LOGIN_USUARIOS'];
	$senha = $_POST['SENHA_USUARIOS'];
		
	if((!empty($usuario)) AND (!empty($senha))):
		$result_usuario = "SELECT * FROM login_usuarios WHERE LOGIN_USUARIOS='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);

		if($resultado_usuario):
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['SENHA_USUARIOS'])):
				$_SESSION['ID_USUARIOS'] = $row_usuario['ID_USUARIOS'];
				$_SESSION['LOGIN_USUARIOS'] = $row_usuario['LOGIN_USUARIOS'];
				$_SESSION['TIPO_USUARIOS'] = $row_usuario['TIPO_USUARIOS'];

				if ($_SESSION['TIPO_USUARIOS'] == 1):
					$data = array("return" => 1);
				elseif ($_SESSION['TIPO_USUARIOS'] == 2):
					$data = array("return" => 2);
				endif;

			else:
				$data = array("return" => "Usuario e/ou senha não validado");
			endif;
		endif;

	else:
		$data = array("return" => "Usuario e/ou senha não validado");
	endif;

	echo json_encode($data);
?>
