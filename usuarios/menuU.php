
<html>
    <body>
<?php
session_start();


if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . $_SESSION['usuario']; 
} else {
    
    header("Location: loggin.php");
    exit;
}
?>

<h2>Gestio</h2>
<form action="/producto/producto.php" method="post">
    gestion de productos:<input type="submit" value="administrar">
    <br>
</form>
<form action="/marca/marca.php" method="post">
    gestion de marcas:<input type="submit" value="administrar">
    <br>
</form>
<form action="/proveedor/proveedor.php" method="post">
    gestion de proveedores:<input type="submit" value="administrar">
    <br>
</form>
<form action="/inventario/inventario.php" method="post">
    gestion de inventario:<input type="submit" value="administrar">
    <br>
</form>
<form action="/ordenes/busqueda_ordenes.php" method="post">
    gestion de ordenes:<input type="submit" value="administrar">
    <br>
</form>
<form action="/productos eliminados/busqueda_proelimi.php" method="post">
    papelera de reciclaje:<input type="submit" value="administrar">
    <br>
</form>

<form action="/menu/cerrar_sesion.php" method="post">
<br>
    <input type="submit" value="Cerrar sesión">
<br>
</form>
</body>
</html>