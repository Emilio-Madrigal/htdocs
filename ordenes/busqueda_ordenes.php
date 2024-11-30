<html>
<body>
    <h1>Ordenes</h1><br>
    <?php
          
           
        // Conexión a la base de datos
        include "conexion.php";

        // Consultar todas las órdenes
        $sql = "SELECT * FROM ordenes";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Iterar sobre cada orden
            while ($fila = $resultado->fetch_assoc()) {
                $id_nota = $fila['id_nota'];
                $fecha = $fila['fecha'];
                $id_pro = $fila['id_pro'];
                $id_prov = $fila['id_prov'];
                $fec_entr = $fila['fec_entr'];
                $id_alma = $fila['id_alma'];

                
                echo "Fecha de Orden: $fecha<br>";
                echo "Fecha de Entrega: $fec_entr<br>";

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

                // Consultar el nombre del almacenista
                $sqlAlmacenista = "SELECT nombre FROM almacenista WHERE id_alma = $id_alma";
                $resultadoAlmacenista = $conexion->query($sqlAlmacenista);
                $nombreAlmacenista = $resultadoAlmacenista->num_rows > 0 ? $resultadoAlmacenista->fetch_assoc()['nombre'] : "No disponible";

                echo "Almacenista: $nombreAlmacenista<br>";

                // Botones para acciones adicionales
                echo "<a href='eliminar_orden.php?id_nota=$id_nota'><button>Eliminar</button></a> ";
                echo "<a href='modificar_ordenparte1.php?id_nota=$id_nota'><button>Modificar</button></a><br><br>";
            }
        } else {
            echo "No se encontraron órdenes.";
        }

        echo "<a href='orden.php?'><button>agregar</button></a> ";

        // Cerrar la conexión
        $conexion->close();
    ?>
</body>
</html>
