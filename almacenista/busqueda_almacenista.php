<html>
<body>
    <?php
        include "conexion.php";

        $nombre = $_REQUEST['Nombre'];

        // Consultar el producto por nombre
        $sql = "SELECT *
                FROM almacenista 
                WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            
            
            while ($fila = $resultado->fetch_assoc()) {
                $id_alma = $fila['id_alma'];
                echo "<br>Nombre: " . $fila['nombre'] . "<br>";
                echo "Apellido: " . $fila['apellido'] . "<br>";
                echo "fecha de nacimiento: " . $fila['fec_nac'] . "<br>";

                // Obtener las FK
                
                $id_inv = $fila['id_inv'];
                
                // Subconsulta para obtener el nombre del inventario
                $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $id_inv";
                $resultadoInv = $conexion->query($sqlInv);
                $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

                echo "Inventario donde trabaja: " . $nombreInv . "<br>";
                

                echo "<a href='eliminar_almacenista.php?id_alma=$id_alma'><button>Eliminar</button></a> ";
                echo "<a href='modificar_almacenistaparte1.php?id_alma=$id_alma'><button>Modificar</button></a><br><br>";
            }
            
        } else {
            echo "No se encontró el producto.";
        }

        $conexion->close();
    ?>
</body>
</html>
