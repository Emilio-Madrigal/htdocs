<html>
<body>
    <h1>Papelera de reciclaje</h1>
    <?php
        // Conexión a la base de datos
        include "conexion.php";
        
        echo "<a href='/usuarios/menuU.php?'><button>regresar</button></a> ";
        

        // Consultar todos los productos eliminados
        $sql = "SELECT * FROM productos_eliminados";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Iterar sobre cada producto eliminado
            while ($fila = $resultado->fetch_assoc()) {
                $id_pro = $fila['id_pro'];
                $nombre = $fila['nombre'];
                $precio = $fila['precio'] ?? "No disponible";
                $caducidad = $fila['caducidad'] ?? "No disponible";
                $fecha_eliminacion = $fila['fecha_eliminacion'];

                $id_marca = $fila['id_marca'];
                $id_inv = $fila['id_inv'];
                $id_prov = $fila['id_prov'];

                // Subconsulta para obtener el nombre de la marca
                $sqlMarca = "SELECT nombre FROM marca WHERE id_marca = $id_marca";
                $resultadoMarca = $conexion->query($sqlMarca);
                $nombreMarca = ($resultadoMarca && $resultadoMarca->num_rows > 0)
                    ? $resultadoMarca->fetch_assoc()['nombre']
                    : "No disponible";

                // Subconsulta para obtener el nombre del inventario
                $sqlInventario = "SELECT nombre_inv FROM inventario WHERE id_inv = $id_inv";
                $resultadoInventario = $conexion->query($sqlInventario);
                $nombreInventario = ($resultadoInventario && $resultadoInventario->num_rows > 0)
                    ? $resultadoInventario->fetch_assoc()['nombre_inv']
                    : "No disponible";

                // Subconsulta para obtener el nombre del proveedor
                $sqlProveedor = "SELECT nombre FROM proveedor WHERE id_prov = $id_prov";
                $resultadoProveedor = $conexion->query($sqlProveedor);
                $nombreProveedor = ($resultadoProveedor && $resultadoProveedor->num_rows > 0)
                    ? $resultadoProveedor->fetch_assoc()['nombre']
                    : "No disponible";

                // Mostrar información del producto
                echo "<br>Producto ID: $id_pro<br>";
                echo "Nombre: $nombre<br>";
                echo "Precio: $" . $precio . "<br>";
                echo "Caducidad: " . $caducidad . "<br>";
                echo "Fecha de Eliminación: " . $fecha_eliminacion . "<br>";
                echo "Marca: " . $nombreMarca . "<br>";
                echo "Inventario: " . $nombreInventario . "<br>";
                echo "Proveedor: " . $nombreProveedor . "<br>";

                // Botones de acción
                echo "<a href='eliminar_producto_eliminado.php?id_pro=$id_pro'><button>restaurar</button></a> ";
                echo "<a href='modificar_producto_eliminado1.php?id_pro=$id_pro'><button>Modificar</button></a><br><br>";
            }
        } else {
            echo "No se encontraron productos eliminados.";
        }

        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
