<?php
require_once('DBAbstract.php');
class Empleado extends DBAbstract 
{

	private $id_empleado;
	private $ci;
	private $idEtnia;
    private $idEstCivil;
    private $idColorPelo;
    private $idNivelEscolaridad;
    private $idCargo;
    private $idContrato;
    private $idDpto;
    private $idUbicacion;
    private $idEstado;
    

	public function __construct(){ 

		$this->id_empleado=0;
		$this->ci='';
		$this->idEtnia='';        
        $this->idEstCivil='';
        $this->idColorPelo='';
        $this->idNivelEscolaridad='';
        $this->idCargo='';
        $this->idContrato='';
        $this->idDpto='';
        $this->idUbicacion='';
        $this->idEstado='';




	}

	public function __destruct(){}

	public function get_id_empleado(){

		return $this->id_empleado;
	}
	public function set_id_empleado($id_empleado){

		$this->id_empleado=$id_empleado;
	}

	public function get_ci(){

		return $this->ci;
	}
	public function set_ci($c){

		$this->ci=$c;
	}

	public function get_idEtnia(){
		return $this->idEtnia;
	}
	public function set_idEtnia($ape){
		$this->idEtnia=$idEtnia;
	}
	public function get_idEstCivil(){
		return $this->idEstCivil;
	}
	public function set_idEstCivil($idEstCivil){
		$this->idEstCivil=$idEstCivil;
    }
    
	public function get_idColorPelo(){
		return $this->idColorPelo;
	}
	public function set_idColorPelo($idColorPelo){
		$this->idColorPelo=$idColorPelo;
    }
    public function get_idNivelEscolaridad(){
		return $this->idNivelEscolaridad;
	}
	public function set_idNivelEscolaridad($idNivelEscolaridad){
        $this->idNivelEscolaridad=$idNivelEscolaridad;
    }
    
    public function get_idCargo(){
        return $this->idCargo;
    }
    public function set_idCargo($idCargo){
        $this->idCargo=$idCargo;
    }

    public function get_idContrato(){
        return $this->idContrato;
    }
    public function set_idContrato($idContrato){
        $this->idContrato=$idContrato;
    }

    public function get_idDpto(){
        return $this->idDpto;
    }
    public function set_idDpto($idDpto){
        $this->idDpto=$idDpto;
    }

      public function get_idUbicacion(){
        return $this->idUbicacion;
    }
    public function set_idUbicacion($idUbicacion){
        $this->idUbicacion=$idUbicacion;
    }

      public function get_idEstado(){
        return $this->idEstado;
    }
    public function set_idEstado($idEstado){
        $this->idEstado=$idEstado;
    }

    public function get_by_id_empleado($id_empleado='') {
		if($id_empleado != ''):
			$this->query = "select id_empleado,ci,idEtnia,idEstCivil,idColorPelo,idNivelEscolaridad,idCargo,idContrato,idDpto,idUbicacion,idEstado
		   from EMPLEADO
			where id_empleado ='$id_empleado';";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif;
	}
	public function insert(){
		$this->query="insert into EMPLEADO
	   (ci, idEtnia, idEstCivil,idColorPelo,idNivelEscolaridad,idCargo,idContrato,idDpto,idUbicacion,id_empleado,idEstado)
	   values
	   ('$this->ci','$this->idEtnia'
	    ,'$this->idEstCivil','$this->idColorPelo','$this->idNivelEscolaridad','$this->idCargo','$this->idContrato','$this->idDpto','$this->idUbicacion','$this->idEstado','$this->id_empleado');";
	    $this->execute_single_query();
	}
	public function get_datos_empleado($_P)
	{
					
         $this->ci=$_P['ci'];
         $this->idEtnia=$_P['idEtnia'];
        $this->idEstCivil=$_P['idEstCivil'];
        $this->idColorPelo=$_P['idColorPelo'];
        $this->idNivelEscolaridad=$_P['idNivelEscolaridad'];
        $this->idCargo=$_P['idCargo'];
        $this->idContrato=$_P['idContrato'];
        $this->idDpto=$_P['idDpto'];
        $this->idUbicacion=$_P['idUbicacion'];
        $this->idEstado=$_P['idEstado'];
         $this->insert();
	}
	public function form_nuevo_empleado()
    {
    $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_empleado' 
    action='handler_empleado.php?pag=registrar_empleado'
      method='POST'>
    <fieldset>
    <legend>REGISTRAR EMPLEADO</legend>
		<div>
		
<div>
<label for='ci_empleado'>ci Empleado</label>
<input type='text' class='form-control' id='ci' name='ci' 
   required autofocus 
     placeholder='ingrese ci Empleado'/> 
</div>
<div>
<label for='ci_empleado'>idEtnia</label>
<input type='text' class='form-control' id='idEtnia' name='idEtnia' 
   required autofocus 
     placeholder='ingrese idEtnia ' /> 
</div>
<div>
<label for='ci_empleado'>Ingrese Estado Civil</label>
<input type='text' class='form-control' id='idEstCivil' name='idEstCivil' 
   required autofocus 
     placeholder='ingrese idEstCivil' /> 
</div>
<div>
<div>
<label for='ci_empleado'>Ingrese Color de Pelo</label>
<input type='text' class='form-control' id='idColorPelo' name='idColorPelo' 
   required autofocus 
     placeholder='ingrese color de pelo' /> 
</div>
<div>
<label for='ci_empleado'>Ingrese Nivel de Escolaridad</label>
<input type='text' class='form-control' id='idNivelEscolaridad' name='idNivelEscolaridad' 
   required autofocus 
     placeholder='ingrese idNivelEscolaridad' /> 
</div>
<div>
<label for='ci_empleado'>ingrese Cargo</label>
<input type='text' class='form-control' id='idCargo' name='idCargo' 
   required autofocus 
     placeholder='ingrese idCargo' /> 
</div>

<div>
<label for='ci_empleado'>ingrese Contrato</label>
<input type='text' class='form-control' id='idContrato' name='idContrato' 
   required autofocus 
     placeholder='ingrese idContrato' /> 
</div>
<div>

<div>
<label for='ci_empleado'>ingrese Departamento</label>
<input type='text' class='form-control' id='idDpto' name='idDpto' 
   required autofocus 
     placeholder='ingrese idDpto' /> 
</div>
<div>

<div>
<label for='ci_empleado'>ingrese Ubicacion</label>
<input type='text' class='form-control' id='idUbicacion' name='idUbicacion' 
   required autofocus 
     placeholder='ingrese idUbicacion' /> 
</div>
<div>

<div>
<label for='ci_empleado'>ingrese Estado</label>
<input type='text' class='form-control' id='idEstado' name='idEstado' 
   required autofocus 
     placeholder='ingrese idEstado' /> 
</div>
<div>

<br />

<input type='submit' class='btn btn-success' name='registrar_empleado' value='registrar empleado'/>
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

		$this->query="update Empleado set
			ci='$this->ci',
			idEtnia='$this->idEtnia',
      idEstCivil='$this->idEstCivil',
			idColorPelo='$this->idColorPelo',
			idNivelEscolaridad='$this->idNivelEscolaridad',
			idCargo='$this->idCargo'
			idContrato='$this->idContrato'
			idDpto='$this->idDpto'
			idUbicacion='$this->idUbicacion'
			idEstado='$this->idEstado'
			where id_empleado='$this->id_empleado';
		";
		//echo $this->query;
		$this->execute_single_query();
	}
	public function get_datos_modificar_empleado($_P)
	{
				$this->id_empleado=$_P['id_empleado'];
         $this->ci=$_P['ci'];
         $this->idEtnia=$_P['idEtnia'];
         $this->idEstCivil=$_P['idEstCivil']; 
				 $this->idColorPelo=$_P['idColorPelo'];
				 $this->idNivelEscolaridad=$_P['idNivelEscolaridad']; 
				 $this->idCargo=$_P['idCargo'];  
				 $this->idContrato=$_P['idContrato']; 
				 $this->idDpto=$_P['idDpto'];  
				  $this->idUbicacion=$_P['idUbicacion']; 
				  $this->idEstado=$_P['idEstado']; 
				    
         $this->update();
	}
	public function form_modificar_empleado()
    {
     $form="
  <div class='row'>
  <div class='col-xs-4 col-md-2'>.</div>
  <div class='col-xs-10 col-md-8'>

<div class='form-group'>
<form name='registrar_empleado' 
    action='handler_empleado.php?pag=modificar_empleado'
      method='POST'>
<fieldset>
<legend>Modificar Empleado</legend>

<div>
<label for='empleado'>Id sonal</label>
<input type='text' class='form-control' value='$this->id_empleado' id='id_empleado' name='id_empleado' 
   required autofocus 
     placeholder='ingrese ID Empleado' /> 
</div>


<div>
<label for='ci_empleado'>Ci Empleado</label>
<input type='text' class='form-control' value='$this->ci' id='ci' name='ci' 
   required autofocus 
     placeholder='ingrese ci Empleado ' /> 
</div>

<div>
<label for='ci_empleado'>IdEtnia</label>
<input type='text' class='form-control' value='$this->idEtnia' id='idEtnia' name='idEtnia' required autofocus 
     placeholder='ingrese IdEtnia' /> 
</div>
<div>
<label for='ci_empleado'>idEstCivil</label>
<input type='text' class='form-control' value='$this->idEstCivil' id='idEstCivil' name='idEstCivil'  required autofocus 
     placeholder='ingrese idEstCivil' /> 
</div>
<div>
<label for='ci_empleado'>Fecha Nacimiento</label>
<input type='text' class='form-control' value='$this->idColorPelo' id='idColorPelo' name='idColorPelo'  required autofocus 
     placeholder='ingrese FECHA NACIMIENTO' /> 
</div>
<div>
<label for='ci_empleado'>idNivelEscolaridad</label>
<input type='text' class='form-control' value='$this->idNivelEscolaridad' id='idNivelEscolaridad' name='idNivelEscolaridad'  required autofocus 
     placeholder='ingrese  idNivelEscolaridad' /> 
</div>
<div>
<label for='ci_empleado'>Cargo</label>
<input type='text' class='form-control' value='$this->idCargo' id='idCargo' name='idCargo'  required autofocus 
     placeholder='ingrese idCargo' /> 
</div>

<div>
<label for='ci_empleado'>Contrato</label>
<input type='text' class='form-control' value='$this->idContrato' id='idContrato' name='idContrato'  required autofocus 
     placeholder='ingrese idContrato' /> 
</div>

<div>
<label for='ci_empleado'>Departamento</label>
<input type='text' class='form-control' value='$this->idDpto' id='idDpto' name='idDpto'  required autofocus 
     placeholder='ingrese idDpto' /> 
</div>

<div>
<label for='ci_empleado'>Ubicacion</label>
<input type='text' class='form-control' value='$this->idUbicacion' id='idUbicacion' name='idUbicacion'  required autofocus 
     placeholder='ingrese idUbicacion' /> 
</div>

<div>
<label for='ci_empleado'>Estado</label>
<input type='text' class='form-control' value='$this->idEstado' id='idEstado' name='idEstado'  required autofocus 
     placeholder='ingrese idEstado' /> 
</div>


<div>
<br />
<input type='submit' class='btn btn-success' name='modificar_empleado' value='Modificar Empleado' />
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
 public function get_datos_eliminar_r($_P)
    {
    	$this->id_empleado=$_P['id_empleado'];
    	$this->delete();
    }
public function form_eliminar_empleado(){
$form="
<div>
<form name='eliminar_empleado' 
    action='handler_empleado.php?pag=eliminar_empleado'
      method='POST'>
<fieldset>
<legend>Eliminar Empleado</legend>
<div>
<label for='ci_empleado'>Ci Empleado</label>
<input type='text' id='ci' name='ci' 
   required autofocus value='$this->ci'
     placeholder='ingrese ci Empleado '
     disabled /> 
</div>
<div>
<input type='hidden' name='id_empleado' id='id_empleado' value='$this->id_empleado' />
<input type='submit' name='Eliminar_empleado' value='Eliminar Empleado' />
</div>
</fieldset>
</form>
</div>
    	";
        echo $form;
    }

public function delete(){
		$this->query="delete from Empleado
		where id_empleado='$this->id_empleado';";
		$this->execute_single_query();
	} 


public function get_valores(){
		$sql="SELECT u.id_empleado
				   , u.ci
				   , u.idEtnia
				   , u.idEstCivil
                   , u.idColorPelo
				   , u.idNivelEscolaridad
                   , u.idCargo
                   , u.idContrato
                   , u.idDpto
                   , u.idUbicacion
                   , u.idEstado
				  
			  /*FROM empleado u,roles r
			  WHERE u.id_rol=r.id_rol*/
			   ORDER BY ci;";
     return $this->get_results_from_query2($sql);		   
}


	public function get_tabla(){
		$sql="SELECT u.id_empleado
				   , u.ci
				   , u.idEtnia
				   , u.idEstCivil
                   , u.idColorPelo
				   , u.idNivelEscolaridad
                   , u.idCargo
                   , u.idContrato
                   , u.idDpto
                   , u.idUbicacion
                   , u.idEstado
			  FROM empleado u
		   ORDER BY id_empleado ASC;";
$cab="
<h1>Administrador de Empleado</h1>
<a href='handler_empleado.php?pag=form_nuevo_empleado'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
 aria-hidden='true'></span> Nuevo Empleado</a>
<table class='table'>
	   <tr><th>ID_Empleado</th>
	   <th>Ci</th>
	   <th>IdEtnia</th>
       <th>idEstCivil</th>
			 <th>fecha Nacimiento</th>
			 <th>NivelEscolaridad</th>
			 <th>Cargo</th>
			 <th>Contrato</th>
			 <th>Departamento</th>
			 <th>Ubicacion</th>
			 <th>Estado</th>
	   <th></th>
	   <th></th></tr>
";
	$cuerpo="";
	
	$result=$this->get_results_from_query2($sql);
	while ($filas = $result->fetch_assoc()){
		$id_empleado=$filas['id_empleado'];
		$ci=$filas['ci'];
		$idEtnia=$filas['idEtnia'];
    $idEstCivil=$filas['idEstCivil'];
		$idColorPelo=$filas['idColorPelo'];	
    $idNivelEscolaridad=$filas['idNivelEscolaridad'];
    $idCargo=$filas['idCargo'];
     $idContrato=$filas['idContrato'];
     $idDpto=$filas['idDpto'];
      $idUbicacion=$filas['idUbicacion'];
      $idEstado=$filas['idEstado'];

	$cuerpo=$cuerpo."<tr>
<td>$id_empleado</td>
<td>$ci</td>
<td>$idEtnia</td>
<td>$idEstCivil</td>
<td>$idColorPelo</td>
<td>$idNivelEscolaridad</td>
<td>$idCargo</td>
<td>$idContrato</td>
<td>$idDpto</td>
<td>$idUbicacion</td>
<td>$idEstado</td>
<td><a class='btn btn-warning'
href='handler_empleado.php?pag=form_modificar_empleado&id_empleado=$id_empleado'>
<span class='glyphicon glyphicon-pencil'
 aria-hidden='true'></span> 
MODIFICAR</a></td>
<td><a class='btn btn-danger'
href='handler_empleado.php?pag=form_eliminar_empleado&id_empleado=$id_empleado'>
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
				   , u.ci_capacitacion
				   , u.Especialidad
				   , u.Tiempo
				   , r.rol
			  FROM Capacitaciones u,roles r
			  WHERE u.id_rol=r.id_rol
			   ORDER BY nombre_capacitacion;";

header("Content-type: application/vnd.pdf");
header("Content-Disposition: attachment; filename=Reporte_sonal_Capacitaciones.pdf");

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
		$dompdf->stream("Reporte_sonal_Capacitaciones.pdf");
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
header("Content-Disposition: attachment; filename=Reporte_sonal_Capacitaciones.xls");

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
header("Content-Disposition: attachment; filename=Reporte_sonal_Capacitaciones.doc");

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