<html>
<body>
    <?php

        include "conexion.php";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        

        // Mostrar los datos para verificar
        print("Nombre es: $nombre<br>");
        

        // Insertar datos en la tabla
        $sql = "INSERT INTO marca (nombre)
                VALUES ('$nombre')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error."<br>";
        }

        echo "<a href='proveedor.php?'><button>regresar</button></a> ";
        $conexion->close();
    ?>
</body>
</html>
