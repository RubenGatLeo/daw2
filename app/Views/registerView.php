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
                        <h2>Log in</h2>
                        <!--     A welcome message or an explanation of the login form -->
                        <p>Inicia sesion usando tu usuario y contraseña</p>
                    </header>
                    <!--     End  header Content  -->
                    <br>
                    <div class="field-set">

                        <!--   user name -->
                        <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                        </span>
                        <!--   user name Input-->
                        <!-- <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required> -->
                        <?php
                            $datos1=array("name"=>"nombre","placeholder"=>"Introduce tu nombre y apellidos","class"=>"form-input","id"=>"txt-input");
                            echo form_input($datos1)."<br><br><br>";
                            $datos1=array("name"=>"user","placeholder"=>"Introduce tu Usuario","class"=>"form-input","id"=>"txt-input");
                            echo form_input($datos1)."<br><br><br>";
                        ?>
                        <br>

                        <!--   Password -->

                        <span class="input-item">
                        <i class="fa fa-key"></i>
                        </span>
                        <!--   Password Input-->
                        <!-- <input class="form-input" type="password" placeholder="Password" id="pwd" name="password" required> -->
                        
                        <?php

                          $datos1=array("name"=>"contrasena","placeholder"=>"Introduce tu contraseña","class"=>"form-input","id"=>"pwd");
                          echo form_password($datos1)."<br><br><br>";
                        ?>

                        <!--      Show/hide password  -->
                        <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                        </span>

                        <br>
                        <!--        buttons -->
                        <!--      button LogIn -->
                        <button name="boton" value="inicio" class="log-in" type="submit"> Inicia Sesion </button>
                    </div>

                    <!--   other buttons -->
                    <div class="other">
                        <!--      Forgot Password button-->
                        <button class="btn submits frgt-pass">Forgot Password</button>
                       
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