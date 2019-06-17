<?php
require_once('DBAbstract.php');
class DETALLE extends DBAbstract
{
	private $num_detalle;
	private $id_producto;
	private $cantidad;
	private $precio;
	
	public function __construct(){
		$this->num_detalle=0;
		$this->id_producto=0;
		$this->cantidad=0;
		$this->precio=0;
	}
	public function __destruct(){}

	public function get_num_detalle(){

		return $this->num_detalle;
	}
	public function set_num_detalle($num_detalle){

		$this->num_detalle=$num_detalle;
	}

	public function get_id_producto(){

		return $this->id_producto;
	}
	public function set_id_producto($id_producto){

		$this->id_producto=$id_producto;
	}

    public function get_cantidad(){
		return $this->cantidad;
	}
	public function set_cantidad($cantidad){
		$this->cantidad=$cantidad;
	}

	public function get_precio(){

		return $this->precio;
	}
	public function set_precio($pre){

		$this->precio=$pre;
	}

	
   public function get_by_num_detalle($num_detalle='') {
		if($num_detalle != ''):
			$this->query = "select num_detalle,id_producto,cantidad,precio
		   from DETALLE
			where num_detalle='$num_detalle';";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif;
	}
	public function insert(){
		$this->query="insert into DETALLE
	   (num_detalle, id_producto, cantidad, precio)
	   values
	   ('$this->num_detalle','$this->id_producto','$this->cantidad'
	    ,'$this->precio');";
	    $this->execute_single_query();
	}
	public function get_datos_detalle($_P)
	{
		 $this->num_detalle=$_P['num_detalle'];
         $this->id_producto=$_P['id_producto'];
         $this->cantidad=$_P['cantidad']; 
         $this->precio=$_P['precio'];
         $this->insert();
	}
	public function form_nuevo_detalle()
    {
		/*ESRIVE PARA COMBO*/	
		$sql ='SELECT id_producto,nombre_p
							FROM PRODUCTO;';
							$combo =$this->get_combo_box_all($sql,"nombre_p","id_producto","id_producto");


    $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_detalle' 
    action='handler_detalle.php?pag=registrar_detalle'
      method='POST'>
		<fieldset>
		
    <legend>Registrar DETALLE</legend>
    <div>
<label for='nombres'>num_detalle</label>
<input type='text' class='form-control' id='num_detalle' name='num_detalle' 
   required autofocus 
     placeholder='ingrese num_detalle '/> 
</div>

<div>
<label for='nombres'>cantidad</label>
<input type='text' class='form-control' id='cantidad' name='cantidad' 
   required autofocus 
     placeholder='ingrese cantidad' /> 
</div>

<div>
<label for='nombres'>precio</label>
<input type='text' class='form-control' id='precio' name='precio' 
   required autofocus 
     placeholder='ingrese precio' /> 
</div>

<div>
<label for='nombres'>producto</label>
		 $combo;
</div>
<div>
<br />

<input type='submit' class='btn btn-success' name='registrar_detalle' value='Registrar detalle' />
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

        $this->query="update detalle set
           
			cantidad='$this->cantidad',
            precio='$this->precio',
            id_producto='$this->id_producto'
            where num_detalle='$this->num_detalle';
		";
		//echo $this->query;
		$this->execute_single_query();
	}
	public function get_datos_modificar_detalle($_P)
	{
         $this->num_detalle=$_P['num_detalle'];
         $this->cantidad=$_P['cantidad'];
         $this->precio=$_P['precio'];
         $this->id_producto=$_P['id_producto'];    
         $this->update();
	}
	public function form_modificar_detalle()
    {
			$sql ='SELECT id_producto,nombre_p
							FROM PRODUCTO;';
							$combo =$this->get_combo_box_all($sql,"nombre_p","id_producto","id_producto");
     $form="
  <div class='row'>
  <div class='col-xs-4 col-md-2'>.</div>
  <div class='col-xs-10 col-md-8'>

<div class='form-group'>
<form name='modificar_detalle' 
    action='handler_detalle.php?pag=modificar_detalle'
      method='POST'>
<fieldset>
<legend>Modificar detalle</legend>
<div>
<label for='nombres'>num detalle</label>
<input type='text' class='form-control' value='$this->num_detalle' id='num_detalle' name='num_detalle' 
   required autofocus 
     placeholder='ingrese num_detalle ' /> 
</div>

<div>
<label for='nombres'>cantidad</label>
<input type='text' class='form-control' value='$this->cantidad' id='cantidad' name='cantidad' required autofocus 
     placeholder='ingrese cantidad' /> 
</div>
<div>precio
<label for='nombres'>precio</label>
<input type='text' class='form-control' value='$this->precio' id='precio' name='precio'  required autofocus 
     placeholder='ingrese precio /> 
</div>
<div>
<label for='nombres'>id producto</label>
$combo;
</div>
<div>
<br />
<input type='submit' class='btn btn-success' name='modificar_detalle' value='Modificar detalle' />
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
 public function get_datos_eliminar_p($_P)
    {
    	$this->num_detalle=$_P['num_detalle'];
    	$this->delete();
    }
public function form_eliminar_detalle(){
$form="
<div>
<form name='eliminar_detalle' 
    action='handler_detalle.php?pag=eliminar_detalle'
      method='POST'>
<fieldset>
<legend>Eliminar detalle</legend>
<div>
<label for='nombres'>cantidad detalle</label>
<input type='text' id='cantidad' name='cantidad' 
   required autofocus value='$this->cantidad'
     placeholder='ingrese cantidad'
     disabled /> 
</div>
<div>
<input type='hidden' name='num_detalle' id='num_detalle' value='$this->num_detalle' />
<input type='submit' name='eliminar_detalle' value='Eliminar detalle' />
</div>
</fieldset>
</form>
</div>
    	";
        echo $form;
    }

public function delete(){
    $this->query="delete from DETALLE 
    where num_detalle='$this->num_detalle';
";
$this->execute_single_query();
	} 









public function get_valores(){
		$sql="SELECT u.num_detalle
				   , u.id_producto
				   , u.cantidad
				   , u.precio
				  
			  FROM DETALLE u,Producto r
			  WHERE u.id_producto=r.id_producto
			   ORDER BY cantidad;";
     return $this->get_results_from_query2($sql);		   
}


	public function get_tabla(){
		$sql="SELECT u.num_detalle
                    , u.id_producto
                    , u.cantidad
                    , u.precio
			  FROM DETALLE u
		   ORDER BY cantidad;";
$cab="
<h1>Administrador de detalle</h1>
<a href='handler_detalle.php?pag=form_nuevo_detalle'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
 aria-hidden='true'></span> Nuevo detalle</a>
 <br/>
<table class='table'>
	   <tr><th>num_detalle</th>
	   <th>id_producto</th>
       <th>cantidad</th>
       <th>precio</th>
	   <th></th>
	   <th></th></tr>
";
	$cuerpo="";
	
	$result=$this->get_results_from_query2($sql);
	while ($filas = $result->fetch_assoc()){
		$num_detalle=$filas['num_detalle'];
        $cantidad=$filas['cantidad'];
        $precio=$filas['precio'];
        $id_producto=$filas['id_producto'];
    $cuerpo=$cuerpo."<tr>
  
<td>$num_detalle</td>
<td>$id_producto</td>
<td>$cantidad</td>
<td>$precio</td>
<td><a class='btn btn-warning'
href='handler_detalle.php?pag=form_modificar_detalle&num_detalle=$num_detalle'>
<span class='glyphicon glyphicon-pencil'
 aria-hidden='true'></span> 
MODIFICAR</a></td>
<td><a class='btn btn-danger'
href='handler_detalle.php?pag=form_eliminar_detalle&num_detalle=$num_detalle'>
<span class='glyphicon glyphicon-trash'
 aria-hidden='true'></span> 
ELIMINAR</a></td>
					</tr>";
		}

		$pie="</table>";

		echo $cab.$cuerpo.$pie;
	}
}

?>