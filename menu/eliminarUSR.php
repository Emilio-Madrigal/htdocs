<html>
    <body>
        <?php
include 'conexion.php';
$nombre = $_REQUEST['Nombre'];

$sql = "DELETE FROM usuarios WHERE user = '$nombre'";
        
if ($conexion->query($sql) === TRUE ) {   
    header("Location: buscaradmi.php");
} else {
    echo "Error: " . $conexion->error."<br>";
    
}
$conexion->close();
        ?>
    </body>
</html>