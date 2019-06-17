<?php
class Template
{
    public function __construct(){}

  public function __destruct(){}
    public function head()
    {
$cad="<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible'
     content='IE=edge'>
    <meta name='viewport' content='width=device-width
          , initial-scale=1'>

    <title>'Capacitacion</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!--[if lt IE 9]>
    <script src=
    'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src=
    'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
  <link href='css/tableexport.css' rel='stylesheet' type='text/css'>
  </head>
  <body>

<nav class='navbar navbar-default'>
 <div class='container-fluid'>
      <div class='navbar-header'>
      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='#'>Tienda</a>
    </div>

 


     <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>
        <li class='active'>
        <a href='handler_categorias.php?pag=listar_categoria'>
        Categoria
        <span class='sr-only'>(current)</span></a></li>
        <span class='sr-only'>(current)</span></a></li>
        <li><a href='handler_detalle.php?pag=listar_detalle'>Detalles</a></li>
        <span class='sr-only'>(current)</span></a></li>
        <li><a href='handler_producto.php?pag=listar_producto'>PRODUCTO</a></li>

        <li class='active'>
        <a href='handler_empleado.php?pag=listar_empleado'>
        EMPLEADO 
        <span class='sr-only'>(current)</span></a></li>
    
        <li><a href='handler_factura.php?pag=listar_factura'>Factura</a></li>
        <span class='sr-only'>(current)</span></a></li>
        

        
        <li><a href='handler_pago.php?pag=listar_pago'>PAGO</a></li>
        <li><a href='logout.php'>SALIR</a></li>

      </ul>
      

      <form class='navbar-form navbar-left' 
      method='POST'
      action='handler_roles.php?pag=buscar_roles'
      role='search'>
        <div class='form-group'>
          <input type='text' name='op' id='op' class='form-control' placeholder='Buscar'>
        </div>
        <button type='submit' class='btn btn-default'>Buscar</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

";
echo $cad;
    }
    public function foot()
    {
$cad="
 <script src='js/jquery.min.js'></script>
  </body>
</html>
";

echo $cad;
    }
}
?>