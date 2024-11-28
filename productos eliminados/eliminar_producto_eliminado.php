<html>
<body>
    <?php
        include "conexion.php";

        // Obtener el ID del producto eliminado
        $id_pro = $_GET['id_pro'];

        // Consultar los datos del producto eliminado
        $sqlSelect = "SELECT * FROM productos_eliminados WHERE id_pro = $id_pro";
        $resultado = $conexion->query($sqlSelect);

        if ($resultado->num_rows > 0) {
            // Obtener los datos del producto eliminado
            $producto = $resultado->fetch_assoc();
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $caducidad = $producto['caducidad'];
            $id_marca = $producto['id_marca'];
            $id_inv = $producto['id_inv'];
            $id_prov = $producto['id_prov'];

            // Insertar los datos en la tabla producto
            $sqlInsert = "INSERT INTO producto (id_pro, nombre, precio, caducidad, id_marca, id_inv, id_prov)
                          VALUES ('$id_pro', '$nombre', '$precio', '$caducidad', '$id_marca', '$id_inv', '$id_prov')";

            if ($conexion->query($sqlInsert) === TRUE) {
                echo "Producto restaurado correctamente en la tabla producto.<br><br>";
                
                // Eliminar el registro de la tabla productos_eliminados
                $sqlDelete = "DELETE FROM productos_eliminados WHERE id_pro = $id_pro";

                if ($conexion->query($sqlDelete) === TRUE) {
                    echo "Registro eliminado de la tabla productos_eliminados.<br>";
                } else {
                    echo "Error al eliminar el registro de la tabla productos_eliminados:<br> " . $conexion->error;
                }
            } else {
                echo "Error al restaurar el producto en la tabla producto:<br> " . $conexion->error;
            }
        } else {
            echo "Producto no encontrado en la tabla productos_eliminados.<br>";
        }

        echo "<a href='busqueda_proelimi.php?'><button>regresar</button></a> ";
        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
