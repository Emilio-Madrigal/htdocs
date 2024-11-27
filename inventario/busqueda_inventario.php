<html>
<body>
    <?php
        include "conexion.php";

        $nombre = $_REQUEST['Nombre'];

        // Consultar el producto por nombre
        $sql = "SELECT *
                FROM inventario 
                WHERE nombre_inv = '$nombre'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            
            
            while ($fila = $resultado->fetch_assoc()) {
                $id_inv = $fila['id_inv'];
                $id_alma = $fila['id_alma'];

                $sqlAlma= "SELECT nombre FROM almacenista WHERE id_alma = $id_alma";
                $resultadoAlma= $conexion->query($sqlAlma);
                $nombreAlma = $resultadoAlma->num_rows > 0 ? $resultadoAlma->fetch_assoc()['nombre'] : "No disponible";

                echo "<br>Nombre: " . $fila['nombre_inv'] . "<br>";
                echo "almacenista: " . $nombreAlma . "<br>";
                
      

                echo "<a href='eliminar_inventario.php?id_inv=$id_inv'><button>Eliminar</button></a> ";
                echo "<a href='modificar_invparte1.php?id_inv=$id_inv'><button>Modificar</button></a><br><br>";
            }
            
        } else {
            echo "No se encontró el producto.";
        }

        $conexion->close();
    ?>
</body>
</html>
