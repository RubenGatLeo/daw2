<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div id=cabecera>
    <!-- Imagen o Logotipo de la pagina-->
    </div>
    <?php
        helper("form");
        //POSIBLEMENTE el usuario sea mejor meterlo en una sesion y asi no tener que reenviarlo cada vez
        //FUNCIONANDO -^ 
        echo "<h1>Usuario identificado: ".$usuario."</h1>";
        echo "</div>";
        echo "<a href='".base_url()."/inicioUsuario'>Volver</a>";
        echo "<hr>";

        //Crear una tabla con la informacion del artiuclo a modificar y los mensajes recibidos
        echo "<table style=float:left><thead><tr><th>Modificar Articulo</th></tr></thead><tr>";
        //Formulario con la informacion del articulo
        echo form_open_multipart("/modificarProducto");
        //foreach e ir creando cada fila de la tabla con cada tipo de campo de formulario 
        foreach ($info as $campo) {
            echo "<td><img width=120 height=100 src='data:image/jpeg;base64,".base64_encode($campo["imagen"])."'>";
            $datos1=array("name"=>"titulo","value"=>$campo["nombre"]);
            echo  "<br>".form_input($datos1);
            $datos2=array("name"=>"descripcion","value"=>$campo["descripcion"]);
            echo "<br>".form_textArea($datos2);
            $datos3=array("name"=>"precio","value"=>$campo["precio"]);
            echo "<br><label for=precio>Precio</label>".form_input($datos3);
            $datos4=array("name"=>"activo","value"=>$campo["activo"]);
            echo "<br><label>Activo: </label>".form_input($datos4);
        }
        echo form_hidden("articulo",$articulo);
        echo "<br>".form_submit("boton","Modificar Producto")."</td></tr>";

        echo "</table>";
        echo "<table style=float:left><thead><tr><th>Mensajes recibidos</th></tr></thead>";
        echo "</table>";
?>


</body>
</html>