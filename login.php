<?php
	require_once("sesion.class.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["contrasenia"];
		
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("usuario",$usuario);
			
			header("location: principal.php");
		}
		else 
		{
			echo "Verifica tu nombre de usuario y contrase�a";
		}
	}
	
	function validarUsuario($usuario, $password)
	{
		$conexion = new mysqli("localhost","usuario","password","base");
		$consulta = "select contrasenia from usuario where nick = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["contrasenia"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}

?>
<html>
<head>
<title></title>
</head>

<body>
<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div>
   <div> <label>Usuario: </label> <input type="text" name = "usuario"/></div>
    <div><label>Contraseña: </label> <input type="password" name = "contrasenia" /></div>
    <div><input type="submit" name ="iniciar" value="Iniciar Sesion"/></div>
  </div>
</form>
</body>
</html>