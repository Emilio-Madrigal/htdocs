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

        
        $nombre = $conexion->real_escape_string($_REQUEST['Nombre']);

        
        $sql = "SELECT nombre, precio, caducidad, id_marca, id_inv, id_prov 
                FROM producto 
                WHERE nombre = '$nombre'";

        $resultado = $conexion->query($sql);

        $sqlmarca = "SELECT nombre 
                FROM marca 
                WHERE id_marca = '$id_marca'";
        $marca = $conexion->query($sql);

        $sqlInv = "SELECT nombre_inv 
        FROM inventario 
        WHERE id_inv = '$id_inv'";
        $inventario = $conexion->query($sql);

        $sqlProv== "SELECT nombre 
        FROM proveedor
        WHERE id_prov = '$id_prov'";
        $proveedor = $conexion->query($sql);

       
        if ($resultado->num_rows > 0) {
            echo "Producto encontrado:<br>";
            while ($fila = $resultado->fetch_assoc()) {
                echo "Nombre: " . $fila['nombre'] . "<br>";
                echo "Precio: " . $fila['precio'] . "<br>";
                echo "Caducidad: " . $fila['caducidad'] . "<br>";
            }
                echo "ID Marca: " . $marca . "<br>";
                echo "ID Inventario: " . $inventario . "<br>";
                echo "ID Proveedor: " . $proveedor . "<br><br>";
        } else {
            echo "No se encontró el producto.";
        }

        
        $conexion->close();
    ?>
</body>
</html>
