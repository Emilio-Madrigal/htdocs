<html>
<body>
    <?php
        $servidor = "localhost";
        $usuario = "root";
        $pwd = "";
        $bd = "integrador";

        $conexion = new mysqli($servidor, $usuario, $pwd, $bd);
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        echo "Conexión exitosa<br>";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        $precio = $_REQUEST['precio'];
        $caducidad = $_REQUEST['caducidad'];
        $marca = $_REQUEST['marca'];
        $inventario = $_REQUEST['inventario'];
        $proveedor = $_REQUEST['proveedor'];

        // Mostrar los datos para verificar
        print("Nombre es: $nombre<br>");
        print("Precio es: $precio<br>");
        print("Caducidad es: $caducidad<br>");
        print("Marca es: $marca<br>");
        print("Inventario es: $inventario<br>");
        print("Proveedor es: $proveedor<br>");

        // Insertar datos en la tabla
        $sql = "INSERT INTO producto (nombre, precio, caducidad, id_marca,id_inv , id_prov)
                VALUES ('$nombre', '$precio', '$caducidad', '$inventario', '$marca', '$proveedor')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $conexion->close();
    ?>
</body>
</html>
