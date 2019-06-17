<?php
session_start();
include_once('model/pago.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per=new Pagos();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_pago':
         echo $per->get_tabla();
	break;
	case 'registrar_pago':
		$per->get_datos_pago($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_pago':
         $per->form_nuevo_pago();
	break;
	case 'modificar_pago':
		$per->get_datos_modificar_pago($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_pago':
	    $per->get_by_id_pago($_GET['id_pago']);
		$per->form_modificar_pago();
	break;
	case 'eliminar_pago':
		$per->get_datos_eliminar_r($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_pago':
		$per->get_by_id_pago($_GET['id_pago']);
		$per->form_eliminar_pago();

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
		
handler();

?>