<?php
session_start();
include_once('model/empleado.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new Empleado();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_empleado':
         echo $per->get_tabla();
	break;
	case 'registrar_empleado':
		$per->get_datos_empleado($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_empleado':
         $per->form_nuevo_empleado();
	break;
	case 'modificar_empleado':
		$per->get_datos_modificar_empleado($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_empleado':
	    $per->get_by_id_empleado($_GET['id_empleado']);
		$per->form_modificar_empleado();
	break;
	case 'eliminar_empleado':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_empleado':
		$per->get_by_id_empleado($_GET['id_empleado']);
		$per->form_eliminar_empleado();

	break;
	case 'exportar_pdf':
		$per->exportar_pdf();
	break;
	case 'exportar_excel':
		$per->exportar_excel();
	break;
	case 'exportar_word':
		$per->exportar_word();
	break;
	case 'buscar_personal':

		break;
}

//$template->foot();

}
function helper_pag_data() {
$pag_data=$_GET['pag'];
return $pag_data;
}




if(!isset($_SESSION["id_usuario"])){
	header("status:301 Moved Permanently");
    header("Location: http://localhost:8080/jett/index.html");
    exit;
}else{
handler();
}
?>