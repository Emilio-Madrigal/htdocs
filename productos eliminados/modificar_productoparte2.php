<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_producto = $_REQUEST['id_producto'];  // Obtener el id del producto
        $nombre = $_REQUEST['Nombre'];
        $precio = $_REQUEST['precio'];
        $caducidad = $_REQUEST['caducidad'];
        $marca = $_REQUEST['marca'];
        $inventario = $_REQUEST['inventario'];
        $proveedor = $_REQUEST['proveedor'];

        // Subconsulta para obtener el nombre de la marca
        $sqlMarca = "SELECT nombre FROM marca WHERE id_marca = $marca";
        $resultadoMarca = $conexion->query($sqlMarca);
        $nombreMarca = $resultadoMarca->num_rows > 0 ? $resultadoMarca->fetch_assoc()['nombre'] : "No disponible";

        // Subconsulta para obtener el nombre del inventario
        $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $inventario";
        $resultadoInv = $conexion->query($sqlInv);
        $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

        // Subconsulta para obtener el nombre del proveedor
        $sqlProv = "SELECT nombre FROM proveedor WHERE id_prov = $proveedor";
        $resultadoProv = $conexion->query($sqlProv);
        $nombreProv = $resultadoProv->num_rows > 0 ? $resultadoProv->fetch_assoc()['nombre'] : "No disponible";

        // Mostrar los datos recibidos para verificar
        echo "ID Producto: $id_producto<br>";
        echo "Nombre: $nombre<br>";
        echo "Precio: $precio<br>";
        echo "Caducidad: $caducidad<br>";
        echo "Marca: $nombreMarca (ID: $marca)<br>";
        echo "Inventario: $nombreInv (ID: $inventario)<br>";
        echo "Proveedor: $nombreProv (ID: $proveedor)<br>";

        // Actualizar los datos en la base de datos
        $sql = "UPDATE producto 
                SET nombre = '$nombre', 
                    precio = '$precio', 
                    caducidad = '$caducidad', 
                    id_marca = '$marca', 
                    id_inv = '$inventario', 
                    id_prov = '$proveedor' 
                WHERE id_pro = $id_producto";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
        } else {
            echo "Error: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
