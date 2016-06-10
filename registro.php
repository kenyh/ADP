<?php
$con = mysql_connect('localhost','root','');
$db = mysql_select_db('jerson',$con) or die ('No se pudo conectar a una base de datos');

$nickname=$_POST['nickname'];
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$correo=$_POST['correo'];

if (empty($nickname)&&empty($usuario)&&empty($password)&&empty($correo)) {
	echo "<p>Faltan campos por completar, porfavor completelos y den click en el boton registrar</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
}
elseif(empty($usuario)){
	echo "<p>Haz olvidado llenar tu campo de usuario</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
}
elseif (empty($nickname)) {
	echo "<p>Haz olvidado llenar tu campo de nickname</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
	# code...
}
elseif (empty($password)) {
	echo "<p>Haz olvidado llenar tu campo de password</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
	# code...
}
elseif (empty($correo)) {
	echo "<p>Haz olvidado llenar tu campo de correo</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
	# code...
}

else{
	
	echo "<a href='index.html'>Click aqui para volver a la pagina de inicio</a>";
}

//condiciones de registro usuario

$comprobar_us=mysql_query("SELECT * FROM login WHERE usuario='".$nickname."'  ");
$contar_us=mysql_num_rows($comprobar_us);
$comprobar_em=mysql_query("SELECT * FROM login WHERE email='".$correo."' ");
$contar_em=mysql_num_rows($comprobar_em);

if ($contar_us>=1) {
	echo "<p>El usuario ".$nickname." ya se encuentra registardo, intenta con otro nombre de usuario</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
}
elseif ($contar_em>=1) {
	echo "<p>El usuario ".$correo." ya se encuentra registardo, intenta con otra direccion electronica</p>";
	echo "<a href='registro.html'>Click aqui para regresar al registro</a>";
}
else{
	echo "<h1>¡TU REGISTRO HA SIDO EXITOSO!</h1>";
	mysql_query("INSERT INTO login VALUES ('','$nickname','$usuario','$password','$correo')");
}
?>