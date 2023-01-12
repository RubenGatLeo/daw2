<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tu informacion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div id=cabecera>
    <!-- Imagen o Logotipo de la pagina-->

    <?php
        //POSIBLEMENTE el usuario sea mejor meterlo en una sesion y asi no tener que reenviarlo cada vez
        //FUNCIONANDO -^ 
        echo "<h1>Usuario identificado: ".$usuario."</h1>";
        echo "</div>";
        echo "<a href=".base_url().">SALIR</a>";
        echo "<hr>";

        echo "<table><tr><th>Mis articulos</th><th>Nuevo articulo</th><th>Estoy interesado</th></tr>";
        echo "</tr><td>";
        // FALTA un Bucle para ver los articulos que tenga el usuario que vendra de una variable desde home UTILIZAR LA SESION
        foreach ($misArticulos as $registro) {
            //Voy a NECESITAR el codigo del articulo y QUE ME MANDE a modificar articulo
            echo "<li><a href='".base_url()."/infoProducto?cod=".$registro["codigo_articulo"]."'>".$registro["nombre"].".Precio:".$registro["precio"]."€.Ofertado el ".$registro["ofertado"]."</a></li>";
         }


        echo "</td><td>";
        helper("form");
        echo form_open_multipart("/nuevoArticulo");
        //NECESITO un array con las categorias para generar un dropdown en el formulario 
        echo form_dropdown("categoria",$categorias)."<br>";


        $datos1=array("name"=>"precio","placeholder"=>"Precio");
        echo form_input($datos1);
        $datos2=array("name"=>"titulo","placeholder"=>"titulo");
        echo  "<br>".form_input($datos2);
        $datos3=array("name"=>"datos","placeholder"=>"Datos de la oferta");
        echo "<br>".form_textArea($datos3);
        //NECESITO un form_upload para cargar las imagenes
        echo "<br>".form_upload("imagen");

        echo "<br>".form_submit("boton","Poner en venta un nuevo producto");
        echo form_close();
        echo "</td><td>";
        echo form_open("/nuevoMensaje");
        //dropdown para elegir una oferta para mandarle un mensaje
        echo form_dropdown("articulo",$mensajeOferta);
        $datos3=array("name"=>"mensaje","placeholder"=>"Escribe tu mensaje para contactar");
        echo "<br>".form_textArea($datos3);
        echo "<br>".form_submit("boton","Enviar mensaje");
        echo form_close()." </td></tr></table>";
    ?>
</body>
</html>