
<html>
    <body>
        
        <h1>Provedores</h1>
        <meta charset="utf-8"/>
        <form action="insertar_prov.php" method="post">
            Nombre: <input type="text" name="Nombre"><br>
            numero de contacto: <input type="text" name="num"><br>
            nombre de la empresa: <input type="text" name="empresa"><br>
            
            <input type="submit" value="agregar">

        </form>

        <form action="busqueda_proveedor.php" method="post">
        Nombre: <input type="text" name="Nombre"><br>
        <input type="submit" value="buscar">
        </form>

        <?php
        echo "<a href='/usuarios/menuU.php?'><button>regresar</button></a> ";
        ?>

    </body>
</html>
