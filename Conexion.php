<?php

$con = mysql_connect('localhost','root','');
$db = mysql_select_db('jerson',$con) or die ('No se pudo conectar a una base de datos');

//obtener los valores del formulario

$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$coment=$_POST['comentarios'];
$sexo=$_POST['mascota'];
$adp=$_POST['adp'];


//verificar que todos los datos esten completos

$req = (strlen('nombre')*strlen('telefono')*strlen('email')*strlen('comentarios')*strlen('mascota')*strlen('adopcion')) or die ("No se ha completado todos los campos de la tabla");

//llevar los datos a la tabla
mysql_query("INSERT INTO adopcion VALUES ('','$nombre','$telefono','$email','$coment','$sexo','$adp')",$con) or die ("Error de envio de datos, intentelo de nuevo mas tarde");

echo "<h3>¡Tu registro fue completado exitosamente!</h3>";


?>