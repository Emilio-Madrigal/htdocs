<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario
        $fecha = $_REQUEST['fecha'];
        $id_pro = $_REQUEST['id_pro'];
        $id_prov = $_REQUEST['id_prov'];
        $fec_entr = $_REQUEST['fec_entr'];
        $id_alma = $_REQUEST['id_alma'];

        echo "Fecha: $fecha<br>";
 // Consultar el nombre del producto
 $sqlProducto = "SELECT nombre FROM producto WHERE id_pro = $id_pro";
 $resultadoProducto = $conexion->query($sqlProducto);
 $nombreProducto = $resultadoProducto->num_rows > 0 ? $resultadoProducto->fetch_assoc()['nombre'] : "No disponible";

 echo "Producto: $nombreProducto<br>";

 // Consultar el nombre del proveedor
 $sqlProveedor = "SELECT nombre FROM proveedor WHERE id_prov = $id_prov";
 $resultadoProveedor = $conexion->query($sqlProveedor);
 $nombreProveedor = $resultadoProveedor->num_rows > 0 ? $resultadoProveedor->fetch_assoc()['nombre'] : "No disponible";

 echo "Proveedor: $nombreProveedor<br>";
 echo "Fecha de Entrega: $fec_entr<br>";

 // Consultar el nombre del almacenista
 $sqlAlmacenista = "SELECT nombre FROM almacenista WHERE id_alma = $id_alma";
 $resultadoAlmacenista = $conexion->query($sqlAlmacenista);
 $nombreAlmacenista = $resultadoAlmacenista->num_rows > 0 ? $resultadoAlmacenista->fetch_assoc()['nombre'] : "No disponible";

 echo "Almacenista: $nombreAlmacenista<br>";
        
        // Mostrar los datos recibidos para verificar
    


        // Insertar datos en la tabla `ordenes`
        $sql = "INSERT INTO ordenes (fecha, id_pro, id_prov, fec_entr, id_alma)
                VALUES ('$fecha', '$id_pro', '$id_prov', '$fec_entr', '$id_alma')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nueva orden registrada exitosamente.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        echo "<a href='busqueda_ordenes.php?'><button>regresar</button></a> ";

        $conexion->close();
    ?>
</body>
</html>
