
<html>
    <body>
<?php
session_start();


if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . $_SESSION['usuario']."<br>"; 
} else {
    
    header("Location: loggin.php");
    exit;
}
?>
<h2>Gestion</h2>

<form action="/almacenista/almacenista.php" method="post">
    Agregar empleado: <input type="submit" value="agregar"> <!-- check -->
</form>

<form action="/menu/buscaradmi.php" method="post"> <!-- check -->
        buscar empleado: <input type="submit" value="buscar">
        </form>

<form action="/menu/agregaradmi.php" method="post">
    Agregar administrador: <input type="submit" value="agregar">
</form>



<!-- Botón para cerrar sesión -->
<form action="/menu/cerrar_sesion.php" method="post">
    <input type="submit" value="Cerrar sesión">
</form>
</body>
</html>