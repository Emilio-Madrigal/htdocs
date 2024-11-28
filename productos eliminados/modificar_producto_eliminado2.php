<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario
        $id_pro = $_REQUEST['id_pro']; // ID del producto eliminado
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $caducidad = $_REQUEST['caducidad'];
        $id_marca = $_REQUEST['id_marca'];
        $id_inv = $_REQUEST['id_inv'];
        $id_prov = $_REQUEST['id_prov'];

        // Subconsulta para obtener el nombre de la marca
        $sqlMarca = "SELECT nombre FROM marca WHERE id_marca = $id_marca";
        $resultadoMarca = $conexion->query($sqlMarca);
        $nombreMarca = $resultadoMarca->num_rows > 0 ? $resultadoMarca->fetch_assoc()['nombre'] : "No disponible";

        // Subconsulta para obtener el nombre del inventario
        $sqlInventario = "SELECT nombre_inv FROM inventario WHERE id_inv = $id_inv";
        $resultadoInventario = $conexion->query($sqlInventario);
        $nombreInventario = $resultadoInventario->num_rows > 0 ? $resultadoInventario->fetch_assoc()['nombre_inv'] : "No disponible";

        // Subconsulta para obtener el nombre del proveedor
        $sqlProveedor = "SELECT nombre FROM proveedor WHERE id_prov = $id_prov";
        $resultadoProveedor = $conexion->query($sqlProveedor);
        $nombreProveedor = $resultadoProveedor->num_rows > 0 ? $resultadoProveedor->fetch_assoc()['nombre'] : "No disponible";

        // Mostrar los datos recibidos para verificar
        echo "ID Producto: $id_pro<br>";
        echo "Nombre: $nombre<br>";
        echo "Precio: $precio<br>";
        echo "Caducidad: $caducidad<br>";
        echo "Marca: $nombreMarca <br>";
        echo "Inventario: $nombreInventario <br>";
        echo "Proveedor: $nombreProveedor <br>";

        // Actualizar los datos en la base de datos
        $sql = "UPDATE productos_eliminados 
                SET nombre = '$nombre', 
                    precio = $precio, 
                    caducidad = '$caducidad', 
                    id_marca = $id_marca, 
                    id_inv = $id_inv, 
                    id_prov = $id_prov 
                WHERE id_pro = $id_pro";

        if ($conexion->query($sql) === TRUE) {
            echo "Producto eliminado actualizado exitosamente.<br>";
        } else {
            echo "Error al actualizar: " . $conexion->error;
        }

        
        echo "<a href='busqueda_proelimi.php?'><button>regresar</button></a> ";
        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
