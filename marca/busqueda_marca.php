<html>
<body>
    <?php
        include "conexion.php";

        $nombre = $_REQUEST['Nombre'];

        // Consultar el producto por nombre
        $sql = "SELECT *
                FROM marca
                WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            
            
            while ($fila = $resultado->fetch_assoc()) {
                $id_marca = $fila['id_marca'];
                echo "<br>Nombre: " . $fila['nombre'] . "<br>";
               

                echo "<a href='eliminar_marca.php?id_marca=$id_marca'><button>Eliminar</button></a> ";
                echo "<a href='modificar_marcaparte1.php?id_marca=$id_marca'><button>Modificar</button></a><br><br>";
            }
            
        } else {
            echo "No se encontró el producto.";
        }

        $conexion->close();
    ?>
</body>
</html>
