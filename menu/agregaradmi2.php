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

        // Encriptar la contraseña con password_hash()
        $passEncriptado = password_hash($pass, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios (user, pass, tipo) VALUES ('$user', '$passEncriptado', '$tipo')";

        if ($conexion->query($sql) === TRUE) {
            echo "Administrador registrado correctamente.<br>";
        } else {
            echo "Error al registrar usuario: " . $conexion->error."<br>";
        }

        echo "<a href='/administradores/menuA.php?'><button>regresar</button></a> ";
        $conexion->close();
        ?>
    </body>
</html>
