<html>
<body>
    <?php

        include "conexion.php";

        // Recibir datos del formulario
        $nombre = $_REQUEST['Nombre'];
        $apellido = $_REQUEST['apellido'];
        $fec_nac = $_REQUEST['fec_nac'];
        $inventario = $_REQUEST['inventario'];

        $usr = $_REQUEST['usr'];
        $password = ($_REQUEST['pass']); 
        $pass = password_hash($password, PASSWORD_DEFAULT);// Encriptar la contraseña con SHA-1
        $tipo = 'U';

        // Validar que los datos no estén vacíos
        if (empty($nombre) || empty($apellido) || empty($fec_nac) || empty($inventario) || empty($usr) || empty($pass)) {
            die("Todos los campos son obligatorios.");
        }

        // Verificar el inventario
        $sqlInv = "SELECT nombre_inv FROM inventario WHERE id_inv = $inventario";
        $resultadoInv = $conexion->query($sqlInv);
        $nombreInv = $resultadoInv->num_rows > 0 ? $resultadoInv->fetch_assoc()['nombre_inv'] : "No disponible";

        echo "Inventario: " . $nombreInv . "<br>";

        // Insertar el almacenista
        $sqlA = "INSERT INTO almacenista (nombre, apellido, fec_nac, id_inv) 
                 VALUES ('$nombre', '$apellido', '$fec_nac', '$inventario')";

            // Insertar el usuario con el mismo id_alma
            $sqlU = "INSERT INTO usuarios (user, pass, tipo, id_alma) 
                     VALUES ('$usr', '$pass', '$tipo', $nombre)";

            if ($conexion->query($sqlU) === TRUE) {
                echo "Nuevo registro creado exitosamente para almacenista y usuario.<br>";
            } else {
                echo "Error al registrar usuario: " . $conexion->error . "<br>";
            }
   
        echo "<a href='/administradores/menuA.php'><button>Regresar</button></a>";
        $conexion->close();
    ?>
</body>
</html>
