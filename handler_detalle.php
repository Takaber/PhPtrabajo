<?php
session_start();
include_once('model/Detalle.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$det=new detalle();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_detalle':
         echo $det->get_tabla();
	break;
	case 'registrar_detalle':
		$det->get_datos_detalle($_POST);
		echo $det->get_tabla();
	break;
	case 'form_nuevo_detalle':
         $det->form_nuevo_detalle();
	break;
	case 'modificar_detalle':
		$det->get_datos_modificar_detalle($_POST);
		echo $det->get_tabla();
	break;
	case 'form_modificar_detalle':
	    $det->get_by_num_detalle($_GET['num_detalle']);
		$det->form_modificar_detalle();
	break;
	case 'eliminar_detalle':
		$det->get_datos_eliminar_p($_POST);
		echo $det->get_tabla();

	break;
	case 'form_eliminar_detalle':
		$det->get_by_num_detalle($_GET['num_detalle']);
		$det->form_eliminar_detalle();

	break;
	case 'exportar_pdf':
		$det->exportar_pdf();
	break;
	case 'exportar_excel':
		$det->exportar_excel();
	break;
	case 'exportar_word':
		$det->exportar_word();
	break;
	case 'buscar_detalle':

		break;
}

//$template->foot();

}
function helper_pag_data() {
$pag_data=$_GET['pag'];
return $pag_data;
}

handler();

?>