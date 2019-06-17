<?php

require_once('DBAbstract.php');
class categorias extends DBAbstract{

    private $id_categoria;
    private $nombre_c;
    private $descripcion;
    
    public function __construct(){

        $this->id_categoria=0;
        $this->nombre_c='';
        $this->descripcion='';
    }
    public  function __destruct(){}

    public function get_id_categoria(){

        return $this->id_categoria;
    }
    public function set_id_categoria($categoria){
         $this ->id_categoria=$categoria;
    }

    public function get_nombre_c(){
        return $this ->nombre_c;
    }
    public function set_nombre_c($nom){

        $this->$nombre_c=$nom;
    }
    public function get_descripcion(){
        return $this ->descripcion;
    }
    public function set_descripcion($des){

        $this->$descripcion=$des;
    }

    public function get_by_id_categoria($id_categoria=''){

        if($id_categoria!= ''):
            $this->query="select id_categoria,nombre_c,descripcion 
            from categoria
            where id_categoria='$id_categoria';";
            $this ->get_results_from_query();
        endif;
        if(count($this->rows) == 1):
            foreach($this ->rows[0] as $propiedad=>$valor):
                $this ->$propiedad =$valor;
            endforeach;
        endif;

    }
    
    public function insert(){
        $this->query="insert into categoria
       (nombre_c,descripcion,id_categoria)
       values
       ('$this->nombre_c','$this->descripcion','$this->id_categoria');";
        $this->execute_single_query();
    }
    
    public function get_datos_categoria($_P)
    {
         $this->nombre_c=$_P['nombre_c'];
         $this->id_categoria=$_P['id_categoria'];
         $this->descripcion=$_P['descripcion'];
         $this->insert();
    }
    public function form_nuevo_categoria()
    {
    $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_categorias' 
    action='handler_categorias.php?pag=registrar_categoria'
      method='POST'>
    <fieldset>
    <legend>Registrar categoria</legend>
    <div>
<label for='nombre_c'>CATEGORIA</label>
<input type='text' class='form-control' id='id_categoria' name='id_categoria' 
   required autofocus 
     placeholder='ingrese CATEGORIA '/> 
</div>
<div>
<label for='nombre_c'>Nombre de categoria</label>
<input type='text' class='form-control' id='nombre_c' name='nombre_c' 
   required autofocus 
     placeholder='Ingrese Nombre de categoria'/> 
</div>
<div>
<label for='descripcion'>Descripcion</label>
<input type='text' class='form-control' id='descripcion' name='descripcion' 
   required autofocus 
     placeholder='Describa'/> 
</div>
<div>
<br/>

<input type='submit' class='btn btn-success' name='registrar_categoria' value='Registrar categoria' />
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

        $this->query="update categoria set
            
            nombre_c='$this->nombre_c',
            descripcion='$this->descripcion'
            where id_categoria='$this->id_categoria';
        ";
        //echo $this->query;
        $this->execute_single_query();
    }
    public function get_datos_modificar_categoria($_P)
    {
         $this->id_categoria=$_P['id_categoria'];
         $this->nombre_c=$_P['nombre_c']; 
         $this->descripcion=$_P['descripcion'];      
         $this->update();
    }  
    public function form_modificar_categoria()
    {
     $form="
  <div class='row'>
  <div class='col-xs-4 col-md-2'>.</div>
  <div class='col-xs-10 col-md-8'>

<div class='form-group'>
<form name='modificar_categoria' 
    action='handler_categorias.php?pag=modificar_categoria'
      method='POST'>
<fieldset>
<legend>Modificar CATEGORIA</legend>
<div>
<label for='id_categoria'>CATEGORIA</label>
<input type='text' class='form-control' value='$this->id_categoria' id='id_categoria' name='id_categoria' 
   required autofocus 
     placeholder='ingrese CATEGORIA' /> 
</div>
<div>
<label for='nombre_c'>Nombre CATEGORIA</label>
<input type='text' class='form-control' value='$this->nombre_c' id='nombre_c' name='nombre_c' 
   required autofocus 
     placeholder='ingrese nombre de Categoria ' /> 
</div>
<div>
<label for='descripcion'>Descripcion</label>
<input type='text' class='form-control' value='$this->descripcion' id='descripcion' name='descripcion' 
   required autofocus 
     placeholder='ingrese descripcion' /> 
</div>
<div>
<br />
<input type='submit' class='btn btn-success' name='modificar_categoria' value='Modificar categoria' />
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
    public function get_datos_eliminar_c($_P)
    {
        $this->id_categoria=$_P['id_categoria'];
        $this->delete();
    }
public function form_eliminar_categoria(){
$form="
<div>
<form name='eliminar_categoria' 
    action='handler_categorias.php?pag=eliminar_categoria'
      method='POST'>
<fieldset>
<legend>Eliminar categoria</legend>
<div>
<label for='nombre_c'>Nombre CATEGORIA</label>
<input type='text' id='nombre_c' name='nombre_c' 
   required autofocus value='$this->nombre_c'
     placeholder='ingrese nombres de la categoria'
     disabled /> 
</div>
<div>
<input type='hidden' name='id_categoria' id='id_categoria' value='$this->id_categoria' />
<input type='submit' name='Eliminar_categoria' value='Eliminar CATEGORIA' />
</div>
</fieldset>
</form>
</div>
        ";
        echo $form;
    }
    public function delete(){
        $this->query="delete from categoria 
                      where id_categoria='$this->id_categoria';
                ";
        $this->execute_single_query();
    }
    
    public function get_valores(){
        $sql="SELECT u.id_categoria
                   , u.nombre_c
                   , u.descripcion
                  
              FROM categoria u,categorias r
              WHERE u.id_categoria=r.id_categoria
               ORDER BY nombre_c;";
     return $this->get_results_from_query2($sql);          
}

public function get_tabla(){
    $sql="SELECT u.id_categoria
               , u.nombre_c
           , u.descripcion
          FROM CATEGORIA u
       ORDER BY nombre_c;";
$cab="
<h1 >Administrador de CATEGORIAS</h1>
<a href='handler_categorias.php?pag=form_nuevo_categoria'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
aria-hidden='true'></span> Nuevo CATEGORIA</a>
<table class='table'>
   <th>id_categoria</th>
   <th>nombre categoria</th>
   <th>descripcion</th>
   <th></th></tr>
";
$cuerpo="";

$result=$this->get_results_from_query2($sql);
while ($filas = $result->fetch_assoc()){
    $id_categoria=$filas['id_categoria'];
    $nombre_c=$filas['nombre_c'];
    $descripcion=$filas['descripcion'];
$cuerpo=$cuerpo."<tr>
<td>$id_categoria</td>
<td>$nombre_c</td>
<td>$descripcion</td>
<td><a class='btn btn-warning'
href='handler_categorias.php?pag=form_modificar_categoria&id_categoria=$id_categoria'>
<span class='glyphicon glyphicon-pencil'
aria-hidden='true'></span> 
MODIFICAR</a></td>
<td><a class='btn btn-danger'
href='handler_categorias.php?pag=form_eliminar_categoria&id_categoria=$id_categoria'>
<span class='glyphicon glyphicon-trash'
aria-hidden='true'></span> 
ELIMINAR</a></td>
                </tr>";
    }

    $pie="</table>
    <!-- Llamar a los complementos javascript-->
    <script src='js/jquery-1.12.4.min.js'></script>
    <script src='js/FileSaver.min.js'></script>
    <script src='js/Blob.min.js'></script>
    <script src='js/xls.core.min.js'></script>
    <script src='js/tableexport.js'></script>
    <script>
    $('table').tableExport({
        formats: ['xlsx','txt', 'csv'], //Tipo de archivos a exportar ('xlsx','txt', 'csv', 'xls')
        position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
        bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
        fileName: 'ListadoPaises',    //Nombre del archivo 
    });
    </script>
    
    
    
    
    ";

    echo $cab.$cuerpo.$pie;
}
}


?>