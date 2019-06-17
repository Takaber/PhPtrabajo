<?php
require_once('DBAbstract.php');
class Pagos extends DBAbstract
{

	private $id_pago;
	private $nombre;
	private $otro;

	public function __construct(){

		$this->id_pago=0;
		$this->nombre='';
		$this->otro='';        
        
	}

	public function __destruct(){}

	public function get_id_pago(){

		return $this->id_pago;
	}
	public function set_id_pago($id_pago){

		$this->id_pago=$id_pago;
	}

	public function get_nombre(){

		return $this->nombre;
	}
	public function set_nombre($nom){

		$this->nombre=$nom;
	}

	public function get_otro(){
		return $this->otro;
	}
	public function set_otro($otro){
		$this->otro=$otro;
	}
    public function get_by_id_pago($id_pago='') {
		if($id_pago != ''):
			$this->query = "select num_pago,nombre,otros_detalles
		   from MODO_PAGO
			where num_pago='$id_pago';";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif;
	}
	public function insert(){
		$this->query="insert into MODO_PAGO
	   (nombre,otros_detalles)
	   values
		 ('$this->nombre','$this->otro');";
	    $this->execute_single_query();
	}
	public function get_datos_pago($_P)
	{

         $this->nombre=$_P['nombre'];
				 $this->otro=$_P['otros_detalles'];
				 /*$this->num_pago=$_p['num_pago'];*/
         $this->insert();
	}
	public function form_nuevo_pago()
    {
    $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_pago' 
    action='handler_pago.php?pag=registrar_pago'
      method='POST'>
    <fieldset>
    <legend>Registrar Modo de Pago</legend>
		<div>
		
<div>
<label for='nombre_pago'>Nombre</label>
<input type='text' class='form-control' id='nombre' name='nombre' 
   required autofocus 
     placeholder='ingrese Nombre '/> 
</div>
<div>
<label for='nombre_pago'>Otro Detalles</label>
<input type='text' class='form-control' id='otros_detalles' name='otros_detalles' 
   required autofocus 
     placeholder='ingrese Otro Detalles ' /> 
</div>
<br />

<input type='submit' class='btn btn-success' name='registrar_pago' value='Registra Pago'/>
</div>
</fieldset>
</form>
</div>

</div>
  <div class='col-xs-4 col-md-2'></div>
</div>
    	";
        echo $form;
    }


	public function update(){

		$this->query="update MODO_PAGO set
			nombre='$this->nombre',
			otros_detalles='$this->otro'
      where num_pago='$this->num_pago';
		";
		//echo $this->query;
		$this->execute_single_query();
	}
	public function get_datos_modificar_pago($_P)
	{			$this->num_pago=$_P['num_pago'];	
         $this->nombre=$_P['nombre'];
         $this->otro=$_P['otros_detalles'];
         $this->update();
	}
	public function form_modificar_pago()
    {
     $form="
  <div class='row'>
  <div class='col-xs-4 col-md-2'>.</div>
  <div class='col-xs-10 col-md-8'>

<div class='form-group'>
<form name='registrar_pago' 
    action='handler_pago.php?pag=modificar_pago'
      method='POST'>
		<fieldset>
		<legend>Modificar Pago</legend>

		<div>

		<label for='nombre_pago'>Ingrese I.D PAGO</label>
		<input type='text' class='form-control' value='$this->num_pago' id='num_pago' name='num_pago' 
			required autofocus 
				placeholder='ingrese I.D PAGO ' /> 
</div>
		
<div>

		<label for='nombre_pago'>Ingrese Nombre</label>
		<input type='text' class='form-control' value='$this->nombre' id='nombre' name='nombre' 
			required autofocus 
				placeholder='ingrese Nombre ' /> 
</div>

<div>
		<label for='nombre_pago'_pago'>Otros Detalles</label>
		<input type='text' class='form-control' value='$this->otros_detalles' id='otros_detalles' name='otros_detalles' required autofocus 
	 	placeholder='ingrese Otros Detalles' />	 
</div>

<div>
	<br/>
		<input type='submit' class='btn btn-success' name='modificar_pago' value='Modificar Pago' />
</div>

</fieldset>
</form>
</div>


  <div class='col-xs-4 col-md-2'></div>
</div>
    	";
        echo $form;
    }
 public function get_datos_eliminar_r($_P)
    {
    	$this->num_pago=$_P['id_pago'];
    	$this->delete();
    }
public function form_eliminar_pago(){
$form="
<div>
<form name='eliminar_pago' 
    action='handler_pago.php?pag=eliminar_pago'
      method='POST'>
<fieldset>
<legend>Eliminar Pago</legend>
<div>
<label for='nombre_pago'_pago''>Nombre Pago</label>
<input type='text' id='nombre' name='nombre' 
   required autofocus value='$this->nombre'
     placeholder='ingrese Nombre'
     disabled /> 
</div>
<div>
<input type='hidden' name='id_pago' id='id_pago' value='$this->num_pago' />
<input type='submit' name='Eliminar_pago' value='Eliminar Pago' />
</div>
</fieldset>
</form>
</div>
    	";
        echo $form;
    }

public function delete(){
		$this->query="delete from MODO_PAGO
		 where num_pago='$this->num_pago';";
		$this->execute_single_query();
	} 


public function get_valores(){
		$sql="SELECT u.num_pago
				   , u.nombre
				   , u.otros_detalles
			   ORDER BY nombre;";
     return $this->get_results_from_query2($sql);		   
}
public function get_tabla(){
		$sql="SELECT u.num_pago
				   , u.nombre
				   , u.otros_detalles
           
			  FROM MODO_PAGO u
		   ORDER BY num_pago ASC;";
$cab="
<h1>Administrador de MODO DE PAGO</h1>
<a href='handler_pago.php?pag=form_nuevo_pago'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
 aria-hidden='true'></span>Nuevo Pago</a>
<table class='table'>
	   <tr><th>Nº pago</th>
	   <th>Nombre</th>
	   <th>otro detalles</th>
       
	   <th></th>
	   <th></th></tr>
";
	$cuerpo="";
	
    $result=$this->get_results_from_query2($sql);
	  while($filas = $result->fetch_assoc()){
		$id_pago=$filas['num_pago'];
		$nombre=$filas['nombre'];
		$otro=$filas['otros_detalles'];
	$cuerpo=$cuerpo."<tr>

<td>$id_pago</td>
<td>$nombre</td>
<td>$otro</td>
<td><a class='btn btn-warning'
href='handler_pago.php?pag=form_modificar_pago&id_pago=$id_pago'>
<span class='glyphicon glyphicon-pencil'
 aria-hidden='true'></span> 
MODIFICAR</a></td>
<td><a class='btn btn-danger'
href='handler_pago.php?pag=form_eliminar_pago&id_pago=$id_pago'>
<span class='glyphicon glyphicon-trash'
 aria-hidden='true'></span> 
ELIMINAR</a></td>
					</tr>";
		}

		$pie="</table>";

		echo $cab.$cuerpo.$pie;
	}
	/*
public function exportar_pdf(){

		$sql="SELECT u.ci
				   , u.nombre_capacitacion
				   , u.Especialidad
				   , u.Tiempo
				   , r.rol
			  FROM Capacitaciones u,roles r
			  WHERE u.id_rol=r.id_rol
			   ORDER BY nombre_capacitacion;";

header("Content-type: application/vnd.pdf");
header("Content-Disposition: attachment; filename=Reporte_Personal_Capacitaciones.pdf");

		$cab="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Reporte de Capacitaciones</title>
</head>
<body>
		<table class='table'>
			   <tr><th>ID</th>
			   <th>NOMBRE</th>
			   <th>LOGIN</th>
			   <th>PASSWORD</th>
			   <th>ROL</th></tr>
		";

		$cuerpo="";
		$result=$this->get_results_from_query2($sql);
		while ($filas = $result->fetch_assoc()){

			$id=$filas['ci'];
			$nombre_capacitacion=$filas['nombre_capacitacion'];
			$especialidad=$filas['Especialidad'];
			$tiempo=$filas['Tiempo'];
			$id_rol=$filas['rol'];
		$cuerpo=$cuerpo."<tr>
							<td>$id</td>
							<td>$nombre_capacitacion</td>
							<td>$especialidad</td>
							<td>$tiempo</td>
							<td>$id_rol</td>
							</tr>";
		}

		$pie="</table>
</body>
</html>
		";
        $codigoHTML=$cab.$cuerpo.$pie;
		$codigoHTML=utf8_encode($codigoHTML);
		$dompdf=new DOMPDF();
		$dompdf->load_html($codigoHTML);
		ini_set("memory_limit","128M");
		$dompdf->render();
		$dompdf->stream("Reporte_Personal_Capacitaciones.pdf");
	}
public function exportar_excel(){

		$sql="SELECT u.ci
				   , u.nombre_capacitacion
				   , u.Especialidad
				   , u.Tiempo
				   , r.rol
			  FROM Capacitaciones u,roles r
			  WHERE u.id_rol=r.id_rol
			   ORDER BY nombre_capacitacion;";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Personal_Capacitaciones.xls");

		$cab="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Reporte de Capacitaciones</title>
</head>
<body>
		<table class='table'>
			   <tr><th>ID</th>
			   <th>NOMBRE</th>
			   <th>LOGIN</th>
			   <th>PASSWORD</th>
			   <th>ROL</th></tr>
		";

		$cuerpo="";
		$result=$this->get_results_from_query2($sql);
		while ($filas = $result->fetch_assoc()){

			$id=$filas['ci'];
			$nombre_capacitacion=$filas['nombre_capacitacion'];
			$especialidad=$filas['Especialidad'];
			$tiempo=$filas['Tiempo'];
			$id_rol=$filas['rol'];
		$cuerpo=$cuerpo."<tr>
							<td>$id</td>
							<td>$nombre_capacitacion</td>
							<td>$especialidad</td>
							<td>$tiempo</td>
							<td>$id_rol</td>
							</tr>";
		}

		$pie="</table>
</body>
</html>
		";
        echo $cab.$cuerpo.$pie;

	}
public function exportar_word(){

		$sql="SELECT u.ci
				   , u.nombre_capacitacion
				   , u.Especialidad
				   , u.Tiempo
				   , r.rol
			  FROM Capacitaciones u,roles r
			  WHERE u.id_rol=r.id_rol
			   ORDER BY nombre_capacitacion;";

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_Capacitaciones.doc");

		$cab="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Reporte de Capacitaciones</title>
</head>
<body>
		<table class='table'>
			   <tr><th>ID</th>
			   <th>NOMBRE</th>
			   <th>LOGIN</th>
			   <th>PASSWORD</th>
			   <th>ROL</th></tr>
		";

		$cuerpo="";
		$result=$this->get_results_from_query2($sql);
		while ($filas = $result->fetch_assoc()){

			$id=$filas['ci'];
			$nombre_capacitacion=$filas['nombre_capacitacion'];
			$especialidad=$filas['Especialidad'];
			$tiempo=$filas['Tiempo'];
			$id_rol=$filas['rol'];
		$cuerpo=$cuerpo."<tr>
							<td>$id</td>
							<td>$nombre_capacitacion</td>
							<td>$especialidad</td>
							<td>$tiempo</td>
							<td>$id_rol</td>
							</tr>";
		}

		$pie="</table>
</body>
</html>
		";
        echo $cab.$cuerpo.$pie;

	}*/

}

?>