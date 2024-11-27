<html>
<body>
    <?php
        include "conexion.php";

        // Recibir datos del formulario y el id_producto
        $id_inv = $_REQUEST['id_inv'];  // Obtener el id del producto
        $nombre= $_REQUEST['Nombre'];
        $id_alma = $_REQUEST['almacenista'];
       

        $sqlAlma= "SELECT nombre FROM almacenista WHERE id_alma= $id_alma";
        $resultadoAlma= $conexion->query($sqlAlma);
        $nombreAlma = $resultadoAlma->num_rows > 0 ? $resultadoAlma->fetch_assoc()['nombre'] : "No disponible";

        echo "almacenista: " . $nombreAlma . "<br>";
        print("Nombre es: $nombre<br>");

        // Actualizar los datos en la base de datos
        $sql = "UPDATE inventario
                SET nombre_inv = '$nombre', 
                    id_alma = '$id_alma' 
                WHERE id_inv = $id_inv";

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
