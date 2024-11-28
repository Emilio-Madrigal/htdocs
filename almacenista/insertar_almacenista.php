<html>
<body>
    <?php

        include "conexion.php";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        $apellido = $_REQUEST['apellido'];
        $fec_nac = $_REQUEST['fec_nac'];
        $inventario = $_REQUEST['inventario'];
        

        // Mostrar los datos para verificar
        print("Nombre es: $nombre<br>");
        print("apellido es: $apellido<br>");
        print("fecha de nacimiento es: $fec_nac<br>");
        
        $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $inventario ";
        $resultadoInv = $conexion->query($sqlInv);
        $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

        echo "Inventario: " . $nombreInv . "<br>";
       
        // Insertar datos en la tabla
        $sql = "INSERT INTO almacenista (nombre, apellido, fec_nac,id_inv )
                VALUES ('$nombre', '$apellido', '$fec_nac', '$inventario')<br>";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error."<br>";
        }

        echo "<a href='almacenista.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
