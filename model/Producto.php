<?php
require_once('DBAbstract.php');
class PRODUCTO extends DBAbstract
{
	private $id_producto;
	private $nombre_p;
	private $precio;
	private $stock;
	
	public function __construct(){
		$this->id_producto=0;
		$this->nombre_p='';
		$this->precio=0;
		$this->stock=0;
	}
	public function __destruct(){}

	public function get_id_producto(){

		return $this->id_producto;
	}
	public function set_id_producto($id_producto){

		$this->id_producto=$id_producto;
	}

	public function get_nombre_p(){

		return $this->nombre_p;
	}
	public function set_nombre_p($nom){

		$this->nombre_p=$nom;
	}

	public function get_precio(){

		return $this->precio;
	}
	public function set_precio($pre){

		$this->precio=$pre;
	}

	public function get_stock(){
		return $this->stock;
	}
	public function set_stock($stock){
		$this->stock=$stock;
	}
	public function get_id_categoria(){

		return $this->id_categoria;
	}
	public function set_id_categoria($id_categoria){

		$this->id_categoria=$id_categoria;
	}
   public function get_by_id_producto($id_producto='') {
		if($id_producto != ''):
			$this->query = "select id_producto,nombre_p,precio,stock,id_categoria
		   from PRODUCTO
			where id_producto='$id_producto';";
			$this->get_results_from_query();
		endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif;
	}
	public function insert(){
		$this->query="insert into PRODUCTO
	   (id_producto,nombre_p, precio,stock,id_categoria)
	   values
	   ('$this->id_producto','$this->nombre_p','$this->precio'
	    ,'$this->stock','$this->id_categoria');";
	    $this->execute_single_query();
	}
	public function get_datos_producto($_P)
	{
         $this->id_producto=$_P['id_producto'];
         $this->nombre_p=$_P['nombre_p'];
         $this->precio=$_P['precio']; 
         $this->stock=$_P['stock'];
         $this->id_categoria=$_P['id_categoria'];
         $this->insert();
	}
	public function form_nuevo_producto()
    {
		/*ESRIVE PARA COMBO*/	
		$sql ='SELECT id_categoria,nombre_c
							FROM CATEGORIA;';
							$combo =$this->get_combo_box_all($sql,"nombre_c","id_categoria","id_categoria");


    $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_producto' 
    action='handler_producto.php?pag=registrar_producto'
      method='POST'>
		<fieldset>
		
    <legend>Registrar PRODUCTO</legend>
    <div>
<label for='nombres'>Id Producto</label>
<input type='text' class='form-control' id='id_producto' name='id_producto' 
   required autofocus 
     placeholder='ingrese ID PRODUCTO '/> 
</div>
<div>
<label for='nombres'>Nombre producto</label>
<input type='text' class='form-control' id='nombre_p' name='nombre_p' 
   required autofocus 
     placeholder='ingrese Nombre Producto'/> 
</div>

<div>
<label for='nombres'>precio</label>
<input type='text' class='form-control' id='precio' name='precio' 
   required autofocus 
     placeholder='ingrese precio' /> 
</div>
<div>
<label for='nombres'>stock</label>
<input type='text' class='form-control' id='stock' name='stock' 
   required autofocus 
     placeholder='ingrese stock' /> 
</div>
<div>
<label for='nombres'>categoria</label>
		 $combo;
</div>
<div>
<br />

<input type='submit' class='btn btn-success' name='registrar_producto' value='Registrar Producto' />
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

        $this->query="update producto set
           
			nombre_p='$this->nombre_p',
			precio='$this->precio',
            stock='$this->stock',
            id_categoria='$this->id_categoria'
            where id_producto='$this->id_producto';
		";
		//echo $this->query;
		$this->execute_single_query();
	}
	public function get_datos_modificar_producto($_P)
	{
         $this->id_producto=$_P['id_producto'];
         $this->nombre_p=$_P['nombre_p'];
         $this->precio=$_P['precio'];
         $this->stock=$_P['stock'];
         $this->id_categoria=$_P['id_categoria'];    
         $this->update();
	}
	public function form_modificar_producto()
    {
			$sql ='SELECT id_categoria,nombre_c
							FROM CATEGORIA;';
							$combo =$this->get_combo_box_all($sql,"nombre_c","id_categoria","id_categoria");
     $form="
  <div class='row'>
  <div class='col-xs-4 col-md-2'>.</div>
  <div class='col-xs-10 col-md-8'>

<div class='form-group'>
<form name='modificar_producto' 
    action='handler_producto.php?pag=modificar_producto'
      method='POST'>
<fieldset>
<legend>Modificar Producto</legend>
<div>
<label for='nombres'>Id Producto</label>
<input type='text' class='form-control' value='$this->id_producto' id='id_producto' name='id_producto' 
   required autofocus 
     placeholder='ingrese ID Producto ' /> 
</div>
<div>
<label for='nombres'>Nombre Prod</label>
<input type='text' class='form-control' value='$this->nombre_p' id='nombre_p' name='nombre_p' 
   required autofocus 
     placeholder='ingrese nombres de producto' /> 
</div>
<div>
<label for='nombres'>precio</label>
<input type='text' class='form-control' value='$this->precio' id='precio' name='precio' required autofocus 
     placeholder='ingrese precio' /> 
</div>
<div>stock
<label for='nombres'>stock</label>
<input type='text' class='form-control' value='$this->stock' id='stock' name='stock'  required autofocus 
     placeholder='ingrese stock /> 
</div>
<div>
<label for='nombres'>ID categoria</label>
$combo;
</div>
<div>
<br />
<input type='submit' class='btn btn-success' name='modificar_producto' value='Modificar Producto' />
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
    	$this->id_producto=$_P['id_producto'];
    	$this->delete();
    }
public function form_eliminar_producto(){
$form="
<div>
<form name='eliminar_producto' 
    action='handler_producto.php?pag=eliminar_producto'
      method='POST'>
<fieldset>
<legend>Eliminar Producto</legend>
<div>
<label for='nombres'>Nombre Producto</label>
<input type='text' id='nombre_p' name='nombre_p' 
   required autofocus value='$this->nombre_p'
     placeholder='ingrese nombres del producto'
     disabled /> 
</div>
<div>
<input type='hidden' name='id_producto' id='id_producto' value='$this->id_producto' />
<input type='submit' name='eliminar_producto' value='Eliminar producto' />
</div>
</fieldset>
</form>
</div>
    	";
        echo $form;
    }

public function delete(){
    $this->query="delete from PRODUCTO 
    where id_producto='$this->id_producto';
";
$this->execute_single_query();
	} 









public function get_valores(){
		$sql="SELECT u.id_producto
				   , u.nombre_p
				   , u.precio
				   , u.stock
                   , u.id_categoria
				  
			  FROM PRODUCTO u,categoria r
			  WHERE u.id_categoria=r.id_categoria
			   ORDER BY nombre_p;";
     return $this->get_results_from_query2($sql);		   
}


	public function get_tabla(){
		$sql="SELECT u.id_producto
                   , u.nombre_p
      , u.precio
      , u.stock
      , c.nombre_c AS id_categoria
 FROM PRODUCTO u
INNER JOIN categoria c
ON (u.id_categoria=c.id_categoria)
 ORDER BY nombre_p;";
$cab="
<h1>Administrador de Producto</h1>
<a href='handler_producto.php?pag=form_nuevo_producto'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
 aria-hidden='true'></span> Nuevo producto</a>
 <br/>
<table class='table'>
	   <tr><th>ID Personal</th>
	   <th>Nombre</th>
	   <th>precio</th>
       <th>stock</th>
       <th>CATEGORIA</th>
	   <th></th>
	   <th></th></tr>
";
	$cuerpo="";
	
	$result=$this->get_results_from_query2($sql);
	while ($filas = $result->fetch_assoc()){
		$id_producto=$filas['id_producto'];
		$nombre_p=$filas['nombre_p'];
		$precio=$filas['precio'];
        $stock=$filas['stock'];
        $id_categoria=$filas['id_categoria'];
    $cuerpo=$cuerpo."<tr>
  
<td>$id_producto</td>
<td>$nombre_p</td>
<td>$precio</td>
<td>$stock</td>
<td>$id_categoria</td>
<td><a class='btn btn-warning'
href='handler_producto.php?pag=form_modificar_producto&id_producto=$id_producto'>
<span class='glyphicon glyphicon-pencil'
 aria-hidden='true'></span> 
MODIFICAR</a></td>
<td><a class='btn btn-danger'
href='handler_producto.php?pag=form_eliminar_producto&id_producto=$id_producto'>
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