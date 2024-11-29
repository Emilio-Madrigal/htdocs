<html>
    <body>
        <?php
        include 'conexion.php';

        // Recibir datos del formulario
        $user = isset($_REQUEST['usr']) ? $_REQUEST['usr'] : '';
        $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : '';

        // Validar que los datos no estén vacíos
        if (empty($user) || empty($pass)) {
            die("Usuario o contraseña no proporcionados.");
        }

        // Encriptar la contraseña con SHA-1
        $passEncriptado = password_hash($pass, PASSWORD_DEFAULT);

        // Consulta SQL
        $sql = "SELECT tipo FROM usuarios WHERE user = '$user' AND pass = '$passEncriptado'";
        $resultado = $conexion->query($sql);

        // Validar si hubo un error en la consulta
        if (!$resultado) {
            die("Error en la consulta: " . $conexion->error);
        }

        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $tipo = $fila['tipo'];

            if ($tipo === 'A') {
                echo "Bienvenido, $user (Tipo A).";
            } elseif ($tipo === 'U') {
                echo "Bienvenido, $user (Tipo U).";
            } else {
                echo "Tipo de usuario desconocido.";
            }
        } else {
            echo "Usuario o contraseña incorrectos.";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </body>
</html>
