<html>
<body>
    <?php
        include "conexion.php";

        $nombre = $_REQUEST['Nombre'];

        // Consultar el producto por nombre
        $sql = "SELECT *
                FROM proveedor
                WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            
            
            while ($fila = $resultado->fetch_assoc()) {
                $id_prov = $fila['id_prov'];
                echo "<br>Nombre: " . $fila['nombre'] . "<br>";
                echo "numero de contacto: " . $fila['num_contacto'] . "<br>";
                echo "nombre de la empresa: " . $fila['Nombre_Emp'] . "<br>";

                echo "<a href='eliminar_prov.php?id_prov=$id_prov'><button>Eliminar</button></a> ";
                echo "<a href='modificar_provparte1.php?id_prov=$id_prov'><button>Modificar</button></a><br><br>";
            }
            
        } else {
            echo "No se encontró el producto.";
        }

        $conexion->close();
    ?>
</body>
</html>
