<?php
        //Enlace a la zona de usuarios
        echo "<a class=user>Usuario: ".$usuario."</a>";
        echo "<a href=".base_url()."/login class=login>Entrar en la zona de socios</a>";
        //Falta opcion de elegir la categoria con un dropdown
        helper("form");
        echo form_open("/filtrarCategoria");
        $datos1=array("name"=>"categorias","onchange"=>"this.form.submit()");
        echo form_dropdown($datos1,$categorias);
        echo form_close();
        //Tabla con los articulos  contiene la referencia, el articulo, la descripcion el precio y la imagen 
        echo "<div class=general>";
        foreach ($articulos as $indice) {
        echo "<div class=productos>";
            // Ir mostrando cada dato
            echo "<a><img height=100 src='data:image/jpeg;base64,".base64_encode($indice["imagen"])."'></a>";
            echo "<table><thead><th>".$indice["nombre"]." ".$indice["precio"]."€</th></thead>";
            echo "<tr><td>".$indice["descripcion"]."</td></tr></table>";
            echo "</div>";
        }
        echo "</div>";
        echo "<div class=pagina>";   
        for ($i=0; $i < $paginas; $i++){ 
            if($paginaSeleccionada==$i){
                echo "<a href=".base_url()."/pagina?numPag=".$i." id=paginaActual>Página ".($i+1)."</a>";
            }else{
                echo "<a href=".base_url()."/pagina?numPag=".$i.">Página ".($i+1)."</a>";
            }
        } 
        echo "</div>";
    ?>
</body>
</html>