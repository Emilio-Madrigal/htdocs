<html>
<body>
    <?php
    // Conexión a la base de datos
    include "conexion.php"; // Archivo que contiene la conexión a la base de datos

    // Recibir datos
    $id_producto = $_REQUEST['id_producto']; // ID del producto
    $cantidadCambio = $_REQUEST['cantidad_cambio']; // Cambio en la cantidad (positivo o negativo)

    // Validar los datos recibidos
    if ($id_producto <= 0 || $cantidadCambio == 0) {
        die("Error: Datos inválidos.");
    }

    try {
        // Iniciar transacción
        $conexion->begin_transaction();

        // Consultar la cantidad actual del producto
        $consultaCantidad = "SELECT cantidad FROM producto WHERE id_pro = $id_producto";
        $resultadoCantidad = $conexion->query($consultaCantidad);

        if ($resultadoCantidad->num_rows > 0) {
            $fila = $resultadoCantidad->fetch_assoc();
            $cantidadActual = intval($fila['cantidad']); // Convertir a entero

            // Calcular la nueva cantidad
            $nuevaCantidad = $cantidadActual + $cantidadCambio;

            if ($nuevaCantidad < 0) {
                echo "Error: La cantidad no puede ser menor a 0.<br>";
            } else {
                // Actualizar la cantidad en la base de datos
                $actualizarCantidad = "UPDATE producto SET cantidad = $nuevaCantidad WHERE id_pro = $id_producto";
                $conexion->query($actualizarCantidad);

                echo "Cantidad actualizada correctamente. Nueva cantidad: $nuevaCantidad.<br>";

                // Llamar al procedimiento almacenado si la nueva cantidad es menor a 10
                if ($nuevaCantidad < 10) {
                    $procedimiento = "CALL Reponer_stock($id_producto, $nuevaCantidad)";
                    $conexion->query($procedimiento);

                    echo "Se solicitó una orden de reposición.<br>";
                }
            }
        } else {
            echo "Error: No se encontró el producto con ID: $id_producto.<br>";
        }

        // Confirmar transacción
        $conexion->commit();
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        $conexion->rollback();
        echo "Error:<br>" . $e->getMessage();
    }

    echo "<a href='producto.php?'><button>regresar</button></a> ";

    // Cerrar conexión
    $conexion->close();
    ?>
</body>
</html>
