<?php
include "conexion.php";

if (isset($_GET['user'])) {
    $user = $_GET['user'];

    $sql = "SELECT * FROM usuarios WHERE user = '$user'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $currentPass = $fila['pass'];   
        $currentTipo = $fila['tipo'];  
        $currentIdAlma = $fila['id_alma'];  
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = $_POST['user'];
    $newPass = $_POST['pass']; 
    $newTipo = $_POST['tipo']; 
    $newIdAlma = $_POST['almacenista']; 

   
    $sqlCheck = "SELECT * FROM usuarios WHERE user = '$newUser' AND user != '$user'";  
    $resultCheck = $conexion->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
        echo "<script>alert('El nombre de usuario ya está en uso. Por favor elija otro.'); window.location.href = 'modificarUSR.php?user=$user';</script>";
        exit;
    }

    
    if (!empty($newPass)) {
        $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
    } else {
        
        $newPassHash = $currentPass;
    }
    $sqlUpdate = "UPDATE usuarios SET pass = '$newPassHash', tipo = '$newTipo', id_alma = '$newIdAlma',user='$newUser' WHERE user = '$user'";

    if ($conexion->query($sqlUpdate) === TRUE) {
        echo "Usuario actualizado exitosamente.";
        header("Location: buscaradmi.php");
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}

$conexion->close();
?>

<html>
    <body>
        <h1>Modificar usuario</h1>
        <meta charset="utf-8"/>
        
        <!-- Formulario para modificar los datos del usuario -->
        <form action="" method="post">
            <input type="hidden" name="user" value="<?php echo $user; ?>">

            <!-- Nombre de usuario: se deja vacío para no cambiar si no se quiere -->
            <label for="user">Nombre de usuario:</label>
            <input type="text" name="user" value="<?php echo $user; ?>" placeholder="Deja vacío para no cambiar"><br>

            <!-- Contraseña: se deja vacío para no cambiar si no se quiere -->
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" value="" placeholder="Deja vacío para no cambiar"><br>

            <label for="tipo">Tipo:</label>
            <select name="tipo" required>
                <option value="U" <?php echo (isset($currentTipo) && $currentTipo == 'U') ? 'selected' : ''; ?>>Usuario</option>
                <option value="A" <?php echo (isset($currentTipo) && $currentTipo == 'A') ? 'selected' : ''; ?>>Administrador</option>
            </select><br>

            <!-- Select dinámico de almacenista (sin cambios según tu petición) -->
            almacenista:
            <select name="almacenista">
                <option value="0">Seleccione:</option>
                    <?php
                     // Consultar almacenistas
                     $mysqli = new mysqli('localhost', 'root', '', 'integrador') or die("Fallo en la Conexion");
                     $query = $mysqli->query("SELECT nombre FROM almacenista");
                     while ($valores = mysqli_fetch_array($query)) {
                         // Mostrar cada almacenista
                         $selected = ($valores['id_alma'] == $currentIdAlma) ? 'selected' : ''; // Marcar el actual almacenista
                         echo '<option value="'.$valores['nombre'].'" '.$selected.'>'.$valores['nombre'].'</option>';
                     }
                    ?>
            </select><br>

            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
