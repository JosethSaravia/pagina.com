<?php
require_once('../BOL/login.php');
require_once('../DAO/Ingreso_Login.php');

$log = new Login();
$ing = new Ingreso_Login();

if (isset($_REQUEST['registrar'])) {
    $log->__SET('Usuario',       $_POST['usuario']);
    $log->__SET('Clave',     $_POST['clave']);
    $log->__SET('Nombre',     $_POST['nombre']);
    $log->__SET('Apellido',     $_POST['apellido']);
    $ing->Registrar_Login($log);

    header('Location: login.php');
} else if (isset($_REQUEST['cancelar'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>New_User</title>
    <link rel="stylesheet" href="Estilos/new_user.css">
</head>

<body>
    <form action="?action=registrar" method="post">
        <div class="container-all">
            <div class="ctn-form">
                <img src="" alt="" class="logo">
                <h1 class="title">Nuevo Usuario</h1>

                <form action="">
                    <label for="">Usuario</label>
                    <input type="text" name="usuario">

                    <label for="">Contraseña</label>
                    <input type="password" name="clave">

                    <label for="">Nombres</label>
                    <input type="text" name="nombre">

                    <label for="">Apellidos</label>
                    <input type="text" name="apellido">

                    <input type="submit" value="Registrar" name="registrar">
                    <input type="submit" value="Cancelar" name="cancelar">
                </form>
            </div>
        </div>
    </form>
</body>

</html>