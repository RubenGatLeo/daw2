    <?php
        helper("form");
        echo "<h3 class=user >Usuario identificado: ".$usuario."</h3>";
        echo "<br><a href='".base_url()."/inicioUsuario' class=login >Volver</a>";
        echo "<hr>";

        //Crear una tabla con la informacion del artiuclo a modificar y los mensajes recibidos
        echo "<table><thead><tr><th>Modificar Articulo</th></tr><tr>";
        //Formulario con la informacion del articulo
        echo form_open_multipart("/modificarProducto");
        //foreach e ir creando cada fila de la tabla con cada tipo de campo de formulario 
        foreach ($info as $campo) {
            echo "<td><img width=150 height=120 src='data:image/jpeg;base64,".base64_encode($campo["imagen"])."'></thead><tr><td>";
            $datos1=array("name"=>"titulo","value"=>$campo["nombre"]);
            echo  "<br><label for=titulo>Nombre: </label>".form_input($datos1);
            $datos2=array("name"=>"descripcion","value"=>$campo["descripcion"],"rows"=>8,"cols"=>20);
            echo "<br><label for=descripcion>Descripcion: </label>".form_textArea($datos2);
            $datos3=array("name"=>"precio","value"=>$campo["precio"]);
            echo "<br><label for=precio>Precio: </label>".form_input($datos3);
            $datos4=array("name"=>"activo","value"=>$campo["activo"]);
            echo "<br><label>Activo: </label>".form_input($datos4);
        }
        echo form_hidden("articulo",$articulo);
        echo "<br>".form_submit("boton","Modificar Producto")."</td></tr>";
        echo form_close();

        echo "</table>";
        echo "<table  ><thead><tr><th>Mensajes recibidos</th></tr></thead><tbody>";
        //Aqui iran saliendo todos los mensajes que haya recibido un producto
        foreach ($mensajesRecibidos as $campo) {
            echo "<tr><td><strong>Usuario</strong>: ".$campo["usuario"]." <br><strong>Fecha</strong>:".$campo["fecha"]."<br>";
            echo "<strong>Mensaje</strong>: ".$campo["mensaje"]."</td</tr>";
        }
        echo "</tbody></table>";
?>


</body>
</html>