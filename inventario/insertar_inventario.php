<html>
<body>
    <?php

        include "conexion.php";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        $id_alma= $_REQUEST['almacenista'];
    

        $sqlAlma= "SELECT nombre FROM almacenista WHERE id_alma= $id_alma";
        $resultadoAlma= $conexion->query($sqlAlma);
        $nombreAlma = $resultadoAlma->num_rows > 0 ? $resultadoAlma->fetch_assoc()['nombre'] : "No disponible";

        echo "almacenista: " . $nombreAlma . "<br>";
        print("Nombre es: $nombre<br>");
  

        // Insertar datos en la tabla
        $sql = "INSERT INTO inventario (nombre_inv, id_alma)
                VALUES ('$nombre', '$id_alma')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $conexion->close();
    ?>
</body>
</html>
