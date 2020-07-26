<?php
require_once('../DAO/Ingreso_Login.php');
require_once('../BOL/login.php');

$log = new Login();
$Login = new Ingreso_Login();
if (isset($_POST['ingresar'])) {
    $resultado = array(); //VARIABLE TIPO RESULTADO
    $log->__SET('Usuario',          $_POST['Usuario']); //ESTABLECEMOS EL VALOR DEL DNI
    $log->__SET('Clave',          $_POST['Clave']); //ESTABLECEMOS EL VALOR DEL DNI
    $resultado = $Login->Acceder($log); //CARGAMOS LOS REGISTRO EN EL ARRAY RESULTADO
    if (!empty($resultado)) //PREGUNTAMOS SI NO ESTA VACIO EL ARRAY
    {

        foreach ($resultado as $r) : //RECORREMOS EL ARRAY RESULTADO A TRAVES DE SUS CAMPOS
            $_POST['Usuario'] = $r->__GET('usuario');
            $_POST['Clave'] = $r->__GET('contrasenia');
            header('location:inicio.html');
        endforeach;
    } else if ($_POST['Usuario'] == 'admin' & $_POST['Clave'] == 'admin') {
        header('location:nuevo_usuario.php');
    } else {
        echo '<script language="javascript">alert("Usuario/Contraseña Incorrecto");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Inicio_Sesion</title>
    <link rel="stylesheet" href="Estilos/estilogin.css">
</head>

<body>
    <form action="?action=ingresar" method="post">
        <div class="container-all">

            <div class="ctn-form">
                <img src="" alt="" class="logo">
                <h1 class="title">Iniciar Sesión</h1>

                <form action="">
                    <label for="">Usuario</label>
                    <input type="text" name="Usuario">

                    <label for="">Contraseña</label>
                    <input type="password" name="Clave">

                    <input type="submit" value="Iniciar" name="ingresar">
                </form>
            </div>

            <div class="ctn-text">
                <div class="capa"></div>
                <h1 class="title-description">Web para el Control de participaciones</h1>
                <p class="text-description">Esta página diseñana por un grupo de estudiantes de la UPSJB - VIII ciclo
                    permite el registro de estudiantes y el nivel de participacion que tienen en un determinado curso.
                    Solo puede acceder un único usuario registrado.</p>
            </div>

        </div>
    </form>
</body>

</html>