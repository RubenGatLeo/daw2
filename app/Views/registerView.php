<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> Login</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url();?>/css/estilos.css'>
        <script src='main.js'></script>
        </head>
        <body>
            <div id=cabecera>
                <!-- Imagen o Logotipo de la pagina-->
                <h1>Identificarse</h1>
            <div class="overlay">
                <!-- LOGN IN FORM by Omar Dsoky -->
                <?php
                    helper("form");
                    $datos=["id"=>"login"];
                    echo form_open("/creaUsuario",$datos);?>
                    <!--   con = Container  for items in the form-->
                    <div class="con">
                    <!--     Start  header Content  -->
                    <header class="head-form">
                        <h2>Registrate</h2>
                        <!--     A welcome message or an explanation of the login form -->
                        <p>Registrate si eres un nuevo usuario</p>
                    </header>
                    <!--     End  header Content  -->
                    <br>
                    <div class="field-set">
                        <!--   user name Input-->
                        <?php
                            $datos1=array("name"=>"nombre","placeholder"=>"Introduce tu nombre y apellidos","class"=>"form-input","id"=>"txt-input","required"=>"required");
                            echo form_input($datos1)."<br><br><br>";
                            $datos1=array("name"=>"user","placeholder"=>"Introduce tu Usuario","class"=>"form-input","id"=>"txt-input","required"=>"required");
                            echo form_input($datos1)."<br><br><br>";
                        ?>
                        <br>
                        <?php

                          $datos1=array("name"=>"contrasena","placeholder"=>"Introduce tu contraseña","class"=>"form-input","id"=>"pwd","required"=>"required");
                          echo form_password($datos1)."<br><br><br>";
                        ?>
                        <br>
                        <!--        buttons -->
                        <!--      button LogIn -->
                        <button name="boton" value="inicio" class="log-in" type="submit"> Registrarse </button>
                    </div>
                    <!--   other buttons -->
                    <div class="other">
                       
                            <!--      End Other the Division -->
                        </button>
                    </div>
                    <!-- End Form -->
                    <?php
                        echo form_close();
                    ?>
                    <!--   End Conrainer  -->
                    </div>

                 
            </div>


   </body>
</html>