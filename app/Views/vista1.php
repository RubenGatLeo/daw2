<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tercera mano</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        *{
            box-sizing:border-box;
        }
        .productos{
            display:flex;
            width:30%;
            float:left;
            border:1px solid black;
            margin-left:5%;
            margin-top:1%;
            padding:10px;
            border-radius:5px;

        }
    </style>
</head>
<body>
    <div id=cabecera>
        <!-- Imagen o Logotipo de la pagina-->
        <h1>Articulos en venta</h1>
    </div>
    <?php
    //Enlace a la zona de usuarios
    //Colocarlo a la derecha dar opcion de cerrar sesion 
    // if($usuario!=""){
    //     echo "<h5>Usuario: ".$usuario."</h5>";
    // }else{
    //     echo "<h5>Usuario anónimo </h5>";

    // } 
    echo "<a href=".base_url()."/login>Entrar en la zona de socios</a>";
    //Falta opcion de elegir la categoria con un dropdown
    helper("form");
    echo form_open("/filtrarCategoria");
    echo form_dropdown("categorias",$categorias);
    echo form_close();
    echo "<hr>";
    //Tabla con los articulos  contiene la referencia, el articulo, la descripcion el precio y la imagen 
    foreach ($articulos as $indice) {
    echo "<div class=productos>";
          // Ir mostrando cada dato
        echo "<a href=''><img width=100% height=100 src='data:image/jpeg;base64,".base64_encode($indice["imagen"])."'></a>";
        echo "<table><thead><th>".$indice["nombre"]." ".$indice["precio"]."€</th></thead>";
        echo "<tr><td>".$indice["descripcion"]."</td></tr></table>";
        echo "</div>";
     }
    
    // echo "<table border=1 width=100%><tr><td>REF</td><td>Articulo</td><td>Precio</td><td>Descripcion</td><td>Imagen</td></tr>";
    // foreach ($articulos as $indice) {
    //    echo "<tr>";
    //      // Ir mostrando cada dato
    //    echo "<td>#".$indice["codigo_articulo"]."</td>";
    //    echo "<td>".$indice["nombre"]."</td>";
    //    echo "<td>".$indice["precio"]."€</td>";
    //    echo "<td>".$indice["descripcion"]."</td>";
    //    echo "<td><img width=120 height=100 src='data:image/jpeg;base64,".base64_encode($indice["imagen"])."'></td>";
    //    echo "</tr>";
    // }
    // echo "</table>";
    
    ?>
</body>
</html>