<html>
<body>
    <?php
    include "conexion.php";

    echo "<a href='/administradores/menuA.php?'><button>regresar</button></a><br> ";
    
    // Consultar los usuarios
    $sql = "SELECT user FROM usuarios";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $id_inv = $fila['user'];

            echo "<br>administrador: " . $fila['user'] . "<br>";

            // Cambiar la URL del botón "Eliminar" para que redirija a /menu/eliminarUSR.php
            echo "<a href='/menu/eliminarUSR.php?Nombre=$id_inv'><button>Eliminar</button></a> ";
            echo "<a href='modificarUSR.php?user=$id_inv'><button>Modificar</button></a><br><br>";
        }
    } else {
        echo "No se encontró el usuario.";
    }

    $conexion->close();
    ?>
</body>
</html>
