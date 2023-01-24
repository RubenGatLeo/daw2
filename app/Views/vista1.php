<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tercera mano</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url();?>/css/estilos.css'>
    <script src='<?php echo base_url();?>/js/main.js'></script>
</head>
<body>
    <div id=cabecera>
        <!-- Imagen o Logotipo de la pagina-->
        <h1>Articulos en venta</h1>
    </div>
    <?php
        //Enlace a la zona de usuarios
        //Colocarlo a la derecha dar opcion de cerrar sesion 
        echo "<a class=user>Usuario: ".$usuario."</a>";
        echo "<a href=".base_url()."/login class=login>Entrar en la zona de socios</a>";
        //Falta opcion de elegir la categoria con un dropdown
        helper("form");
        echo form_open("/filtrarCategoria");
        $datos1=array("name"=>"categorias","onchange"=>"this.form.submit()");
        echo form_dropdown($datos1,$categorias);
        echo form_close();
        
        echo "<hr>";
        //Tabla con los articulos  contiene la referencia, el articulo, la descripcion el precio y la imagen 
        echo "<div class=general>";
        foreach ($articulos as $indice) {
        echo "<div class=productos>";
            // Ir mostrando cada dato
            echo "<a href=''><img height=100 src='data:image/jpeg;base64,".base64_encode($indice["imagen"])."'></a>";
            echo "<table><thead><th>".$indice["nombre"]." ".$indice["precio"]."€</th></thead>";
            echo "<tr><td>".$indice["descripcion"]."</td></tr></table>";
            echo "</div>";
        }
        echo "</div>";    
    ?>
</body>
</html>