    <?php
        //POSIBLEMENTE el usuario sea mejor meterlo en una sesion y asi no tener que reenviarlo cada vez
        //FUNCIONANDO -^ 
         echo "<h3 class=user >Usuario identificado: ".$usuario."</h3>";
        //  echo "<a href=".base_url().">Ver Productos</a>";

        echo "<br><a href=".base_url()."/cerrarSesion class=login>Cerrar Sesion</a>";
        echo "<hr>";

        echo "<table><thead><tr><th>Mis articulos</th><th>Nuevo articulo</th><th>Estoy interesado</th></tr></thead>";
        echo "</tr><td>";
        foreach ($misArticulos as $registro) {
            //Voy a NECESITAR el codigo del articulo y QUE ME MANDE a modificar articulo
            echo "<li><a href='".base_url()."/infoProducto?cod=".$registro["codigo_articulo"]."'>".$registro["nombre"].".Precio:".$registro["precio"]."€.Ofertado el ".$registro["ofertado"]."</a></li>";
        }


        echo "</td><td>";
        helper("form");
        echo form_open_multipart("/nuevoArticulo");
        //NECESITO un array con las categorias para generar un dropdown en el formulario 
        echo form_dropdown("categoria",$categorias)."<br>";

        $datos1=array("name"=>"precio","placeholder"=>"Precio","required"=>"required");
        echo form_input($datos1);
        $datos2=array("name"=>"titulo","placeholder"=>"titulo","required"=>"required");
        echo  "<br>".form_input($datos2);
        $datos3=array("name"=>"datos","placeholder"=>"Datos de la oferta","required"=>"required");
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