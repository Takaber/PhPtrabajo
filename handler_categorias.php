<?php
session_start();
include_once('model/categorias.php');    
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$cat=new categorias();
$template=new Template();//activacion de los diseños de bostrap//
$template->head();
switch ($pag) {
	case 'listar_categoria':
         echo $cat->get_tabla();
	break;
	case 'registrar_categoria':
		$cat->get_datos_categoria($_POST);
		echo $cat->get_tabla();
	break;
	case 'form_nuevo_categoria':
         $cat->form_nuevo_categoria();
	break;
	case 'modificar_categoria':
		$cat->get_datos_modificar_categoria($_POST);
		echo $cat->get_tabla();
	break;
	case 'form_modificar_categoria':
	    $cat->get_by_id_categoria($_GET['id_categoria']);
		$cat->form_modificar_categoria();
	break;
	case 'eliminar_categoria':
		$cat->get_datos_eliminar_c($_POST);
		echo $cat->get_tabla();


	break;
	case 'form_eliminar_categoria':
		$cat->get_by_id_categoria($_GET['id_categoria']);
		$cat->form_eliminar_categoria();

	break;
	case 'exportar_pdf':
		$cat->exportar_pdf();
	break;
	case 'exportar_excel':
		$cat->exportar_excel();
	break;
	case 'exportar_word':
		$cat->exportar_word();
	break;
	case 'buscar_categoria':

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