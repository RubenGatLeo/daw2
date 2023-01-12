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
                <h1>Identificarse</h1>
                </div>
            <?php
            
            echo "<a href=".base_url().">SALIR</a>";
            echo "<hr>";
            //Esta libreria se encarga de crear formularios
             helper("form");
             echo "<h2>Si ya tienes una cuenta inicia sesion</h2>";
             echo form_open("/inicioUsuario");
             $datos1=array("name"=>"user","placeholder"=>"Introduce tu Usuario");
             echo form_input($datos1);
             $datos2=array("name"=>"contrasena","placeholder"=>"Pon tu contraseña por favor");
             echo form_password($datos2);
             echo form_submit("boton","Inicia sesion");

             echo form_close();
             
             echo "<h2>Si es la primera vez que accedes aqui, create una cuenta rellenando el siguiente formulario</h2>";

             echo form_open("/creaUsuario");
             $datos3=array("name"=>"nombre","placeholder"=>"Introduce Nombre y Apellidos");
             echo form_input($datos3);
             echo form_input($datos1);
             echo form_password($datos2);
             echo form_submit("boton","Registrarse");

             echo form_close();
            ?>
   </body>
</html>