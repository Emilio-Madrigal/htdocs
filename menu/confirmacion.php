<?php
session_start();
include 'conexion.php';

// Obtener el usuario y la contraseña desde el formulario
$user = isset($_POST['usr']) ? $_POST['usr'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

if (empty($user) || empty($pass)) {
    echo "<script>alert('no enviaste nada'); window.location.href = 'loggin.php';</script>";
}

// Consultar si el usuario existe en la base de datos
$sql = "SELECT pass, tipo FROM usuarios WHERE user = '$user'";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $passHash = $fila['pass'];  // Contraseña encriptada almacenada
    $tipo = $fila['tipo'];

    // Verificar si la contraseña ingresada es correcta
    if (password_verify($pass, $passHash)) {
        // Guardar información en la sesión
        $_SESSION['usuario'] = $user;
        $_SESSION['tipo'] = $tipo;

        // Redirigir según el tipo de usuario
        if ($tipo === 'A') {
            header("Location: /administradores/menuA.php");
        } elseif ($tipo === 'U') {
            header("Location: /usuarios/menuU.php");
        } else {
            echo "Tipo de usuario desconocido.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
        // Redirigir a la página de login con un mensaje de error
        echo "<script>alert('Usuario o contraseña incorrectos.'); window.location.href = 'loggin.php';</script>";
    }
} else {
    // Si el usuario no existe en la base de datos, redirigir a la página de login
    echo "<script>alert('Usuario no encontrado.'); window.location.href = 'loggin.php';</script>";
}

// Cerrar la conexión
$conexion->close();
?>
