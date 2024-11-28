<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario
        $id_nota = $_REQUEST['id_nota']; // ID de la orden
        $fecha = $_REQUEST['fecha'];
        $id_pro = $_REQUEST['id_pro'];
        $id_prov = $_REQUEST['id_prov'];
        $fec_entr = $_REQUEST['fec_entr'];
        $id_alma = $_REQUEST['id_alma'];

        // Subconsulta para obtener el nombre del producto
        $sqlProducto = "SELECT nombre FROM producto WHERE id_pro = $id_pro";
        $resultadoProducto = $conexion->query($sqlProducto);
        $nombreProducto = $resultadoProducto->num_rows > 0 ? $resultadoProducto->fetch_assoc()['nombre'] : "No disponible";

        // Subconsulta para obtener el nombre del proveedor
        $sqlProveedor = "SELECT nombre FROM proveedor WHERE id_prov = $id_prov";
        $resultadoProveedor = $conexion->query($sqlProveedor);
        $nombreProveedor = $resultadoProveedor->num_rows > 0 ? $resultadoProveedor->fetch_assoc()['nombre'] : "No disponible";

        // Subconsulta para obtener el nombre del almacenista
        $sqlAlmacenista = "SELECT nombre FROM almacenista WHERE id_alma = $id_alma";
        $resultadoAlmacenista = $conexion->query($sqlAlmacenista);
        $nombreAlmacenista = $resultadoAlmacenista->num_rows > 0 ? $resultadoAlmacenista->fetch_assoc()['nombre'] : "No disponible";

        // Mostrar los datos recibidos para verificar
        echo "ID Nota: $id_nota<br>";
        echo "Fecha: $fecha<br>";
        echo "Producto: $nombreProducto <br>";
        echo "Proveedor: $nombreProveedor<br>";
        echo "Fecha de Entrega: $fec_entr<br>";
        echo "Almacenista: $nombreAlmacenista<br>";

        // Actualizar los datos en la base de datos
        $sql = "UPDATE ordenes 
                SET fecha = '$fecha', 
                    id_pro = $id_pro, 
                    id_prov = $id_prov, 
                    fec_entr = '$fec_entr', 
                    id_alma = $id_alma 
                WHERE id_nota = $id_nota";

        if ($conexion->query($sql) === TRUE) {
            echo "Orden actualizada exitosamente.<br>";
        } else {
            echo "Error al actualizar: <br>" . $conexion->error;
        }

        echo "<a href='busqueda_ordenes.php?'><button>regresar</button></a> ";

        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
