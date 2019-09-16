<?php
$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "mercado";
$con = @mysqli_connect($host, $user, $pass,$base);
$queHago = "traerTodos_usuarios";
switch($queHago)
{
    case "traerTodos_usuarios":
        $sql = "SELECT `id`, `nombre`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE 1";
        $rs = $con->query($sql);
        $table = "<table>\n<tr>\n<td>ID</td>\n<td>Nombre</td>\n<td>Apellido</td>\n<td>Perfil</td>\n<td>Estado</td>\n</tr>";
        while ($row = $rs->fetch_object())
        { //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $table .= "<tr>\n<td>" . $row->id . "</td>\n<td>" . $row->nombre . "</td>\n<td>" . $row->apellido . "</td>\n<td>" . $row->perfil . "</td>\n<td>" . $row->estado . "</td>\n</tr>";
        }
        $table .= "</table>";
        echo $table;
        break;

    case "traerPorId_usuarios":
        $sql = "SELECT `id`, `nombre`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `id`=" . $id;
        $rs = $con->query($sql);
        while ($row = $rs->fetch_object())
        { //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }  
        var_dump($user_arr);
        break;

    case "traerPorEstado_usuarios":
        $sql = "SELECT `id`, `nombre`, `apellido`, `clave`, `perfil`, `estado` FROM `usuarios` WHERE `estado`=1";
        $rs = $con->query($sql);
        while ($row = $rs->fetch_object())
        { //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }  
        var_dump($user_arr);
        break;

    case "agregar_usuarios":
        $sql = "INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('Juan','Perez','321',3,1)";
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;

    case "modificar_usuarios":
        $sql = "UPDATE `usuarios` SET `nombre`='Gonzalo_m',`apellido`='Requeni_m',`clave`='asd1234',`perfil`=2,`estado`=0 WHERE `id` = " . $id;
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;

    case "borrar_usuarios":
        $sql = "DELETE FROM `usuarios` WHERE `id`=" . $id;
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;

    case "traerTodos_productos":
        $sql = "SELECT `id`, `codigo_barra`, `nombre`, `path_foto` FROM `productos` WHERE 1";
        $rs = $con->query($sql);
        while ($row = $rs->fetch_object())
        { //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }  
        var_dump($user_arr);
        break;

    case "traerPorId_productos":
        $sql = "SELECT `id`, `codigo_barra`, `nombre`, `path_foto` FROM `productos` WHERE `id`=" . $id;
        $rs = $con->query($sql);
        while ($row = $rs->fetch_object())
        { //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }  
        var_dump($user_arr);
        break;

    case "agregar_productos":
        $sql = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES ('54321','Pepsi',null)";
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;

    case "modificar_productos":
        $sql = "UPDATE `productos` SET `codigo_barra`='12345',`nombre`='Coca-Cola',`path_foto`='foto.jpg' WHERE `id`=" . $id;
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;

    case "borrar_productos":
        $sql = "DELETE FROM `productos` WHERE `id`=" . $id;
        $rs = $con->query($sql);
        echo mysqli_affected_rows($con);
        break;
}

mysqli_close($con);