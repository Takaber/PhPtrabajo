<?php

require_once('usuarios.php');
$login=$_POST['txt_nombre'];

$pass=$_POST['txt_password'];


$user = new usuarios();
$res=$user->get_validar_usuario($login,$pass);

if($res==true)
{
		$user->get_by_name_pass($login,$pass);
		session_start();

		$_SESSION["id_usuario"]=$user->get_id_usuario();
		$_SESSION["nombre"]=$user->get_nombre();


        header("status:301 Moved Permanently");
        header("location:../handler_cliente.php?pag=listar_cliente");
        exit;
}
else
{
    header("status:301 Moved Permanently");
    header("Location: http://localhost:8080/jett/index.html");
    exit;
}
 
?>