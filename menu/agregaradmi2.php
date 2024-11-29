<html>
    <body>
        <?php
        include 'conexion.php';

        // Recibir datos del formulario
        $user = isset($_REQUEST['usr']) ? $_REQUEST['usr'] : '';
        $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : '';
        $tipo = "A";

        // Validar que los datos no estén vacíos
        if (empty($user) || empty($pass)) {
            die("Usuario o contraseña no proporcionados.");
        }

        // Encriptar la contraseña
        $passEncriptado = password_hash($pass, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios (user, pass, tipo) VALUES ('$user', '$passEncriptado', '$tipo')";

        if ($conexion->query($sql) === TRUE) {
            echo "Usuario registrado correctamente.<br>";
        } else {
            echo "Error al registrar usuario: " . $sql . "<br>" . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </body>
</html>
