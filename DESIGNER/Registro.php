<?php
require_once ('../DAO/Registrar_Persona.php');
require_once ('../DAO/Mostrar_Participantes.php');
require_once ('../BOL/Personas.php');

$per = new Personas();
$model = new Registrar_Persona();
$lis = new Mostrar_Participantes();

if(isset($_REQUEST['registrar']))
{
    $per->__SET('nombre',       $_POST['nombre']);
    $per->__SET('apellido',     $_POST['apellido']);
    $model->registrar($per);
	
}else if (isset($_REQUEST['cancelar'])) {
  header('');
}

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--  Datatables  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
        <!--  extension responsive  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
        <!--  extension fontawesome  -->
        <script src="https://kit.fontawesome.com/c2f37bb404.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Estilos/registro.css">
        <link rel="stylesheet" href="Estilos/adaptable-contenido.css">
        <link rel="stylesheet" href="Estilos/flex_registro.css">
        <title>Registro</title>
    </head>
    <body>
        <header>
            <!--Encabezado-->
            <div class="container-cover">
                <div class="capa"></div>
            </div>
            <!--Encabezado-Title-->
            <div class="header-content">
                <div class="encabezadoss">
                    <h2>Registro</h2>
                    <input type="submit" value="1°"> 
                    <input type="submit" value="----------------"> <br>
                    <input type="submit" value="A">
                </div>
                <div class="menu" id="show-menu">
                    <nav>
                        <ul>
                            <li><a href="Inicio.html"><i class="fas fa-undo-alt"></i>Volver</a></li>
                            <li><a href="#"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a></li>
                        </ul>
                    </nav>
                </div>   
            </div>
            <div id="icon-menu">
                <i class="fas fa-bars"></i>
            </div>
        </header>
        <!--Tabla-->
        <div class="container-all"  id="move-content">
            <!--Empieza Formulario para agregar personas-->
            <div class="container-form">
                <div class="ctn-form">
                    <img src="" alt="" class="logo">
                    <h1 class="title">Nuevo Estudiante</h1>
                    <!--Empieza Formulario-->
                    <form action="?action=registrar" method="post">
                        <label for="">Nombres</label>
                        <input type="text" name="nombre">           
                        <label for="">Apellidos</label>
                        <input type="text" name="apellido">
                        <input type="submit" value="Agregar" name="registrar">
                    </form>
                    <!--Termina Formulario-->
                </div>
            </div>
            <!--Termina Formulario para agregar personas-->
            <div class="container-table">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            $resultado = $lis->Mostrar();
                            if(!empty($resultado)) //PREGUNTAMOS SI NO ESTA VACIO EL ARRAY
                            {
                        ?>
                        <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!--  <th>Codigo</th>-->
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>G. Academico</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>                        
                                <?php
                                    foreach( $resultado as $r): //RECORREMOS EL ARRAY RESULTADO A TRAVES DE SUS CAMPOS
                                ?>
                                <tr>
                                    <td><?php echo $r->__GET('nombre'); ?></td>
                                    <td><?php echo $r->__GET('apellido'); ?></td>
                                    <td><?php echo $r->__GET('Grado_Academico'); ?></td>
                                    <th>
                                        
                                        <a href="#"><i class="fas fa-user-edit icon"></i></a>
                                        <a href="#"><i class="fas fa-user-times icon"></i></a>
                                    </th>
                                </tr>
                                    <?php endforeach;
                                }
                                else
                                {
                                    echo 'Aún no hay Participantes en la Lista';
                                }
                                ?>                          
                            </tbody>                                          
                        </table>                 
                    </div>
                </div> 
            </div>  
        </div>
        

        <!-- Opcional JavaScript -->
        <!-- jQuery primero, luego Popper.js, luego Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>    
        <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 
        <script src="js/adaptable.js"></script>
        <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        } );  
        </script>
    </body>
</html>