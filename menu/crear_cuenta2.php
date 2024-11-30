<html>
    <body>
        <?php
        include 'conexion.php';

    
        $user = isset($_REQUEST['usr']) ? $_REQUEST['usr'] : '';
        $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : '';
        $tipo = "U";

       
        if (empty($user) || empty($pass)) {
            die("Usuario o contraseña no proporcionados.");
        }

        $passEncriptado = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (user, pass, tipo) VALUES ('$user', '$passEncriptado', '$tipo')";

        if ($conexion->query($sql) === TRUE) {
            echo "Usuario registrado correctamente.<br>";
        } else {
            echo "Error al registrar usuario: " . $conexion->error."<br>";
        }

        echo "<a href='loggin.php?'><button>regresar</button></a> ";
        $conexion->close();
        ?>
    </body>
</html>
