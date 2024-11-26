<html>
<body>
    <?php
        include "conexion.php";

        $nombre = $_REQUEST['Nombre'];

        // Consultar el producto por nombre
        $sql = "SELECT nombre, precio, caducidad, id_marca, id_inv, id_prov 
                FROM producto 
                WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            echo "Producto encontrado:<br>";
            
            while ($fila = $resultado->fetch_assoc()) {
                echo "Nombre: " . $fila['nombre'] . "<br>";
                echo "Precio: $" . $fila['precio'] . "<br>";
                echo "Caducidad: " . $fila['caducidad'] . "<br>";

                // Obtener las FK
                $id_marca = $fila['id_marca'];
                $id_inv = $fila['id_inv'];
                $id_prov = $fila['id_prov'];

                // Subconsulta para obtener el nombre de la marca
                $sqlMarca = "SELECT nombre FROM marca WHERE id_marca = $id_marca";
                $resultadoMarca = $conexion->query($sqlMarca);
                $nombreMarca = $resultadoMarca->num_rows > 0 ? $resultadoMarca->fetch_assoc()['nombre'] : "No disponible";

                // Subconsulta para obtener el nombre del inventario
                $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $id_inv";
                $resultadoInv = $conexion->query($sqlInv);
                $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

                // Subconsulta para obtener el nombre del proveedor
                $sqlProv = "SELECT nombre FROM proveedor WHERE id_prov = $id_prov";
                $resultadoProv = $conexion->query($sqlProv);
                $nombreProv = $resultadoProv->num_rows > 0 ? $resultadoProv->fetch_assoc()['nombre'] : "No disponible";

                // Imprimir resultados
                echo "Marca: " . $nombreMarca . "<br>";
                echo "Inventario: " . $nombreInv . "<br>";
                echo "Proveedor: " . $nombreProv . "<br><br>";
            }
        } else {
            echo "No se encontró el producto.";
        }

        $conexion->close();
    ?>
</body>
</html>
