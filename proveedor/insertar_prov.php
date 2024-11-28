<html>
<body>
    <?php

        include "conexion.php";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        $contacto = $_REQUEST['num'];
        $empresa = $_REQUEST['empresa'];


        // Mostrar los datos recibidos para verificar
        echo "Nombre del proveedor: $nombre<br>";
        echo "el numero de contacto es: $contacto<br>";
        echo "el nombre de la empresa es: $empresa<br>";

        // Insertar datos en la tabla
        $sql = "INSERT INTO proveedor (nombre, num_contacto, Nombre_Emp)
                VALUES ('$nombre', '$contacto', '$empresa')";

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
