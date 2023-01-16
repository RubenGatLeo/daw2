<?php
function paraOfertas($m){
    $s["0"]="Seleccione la oferta que le interese";
    foreach ($m as $registro) {
        $s[$registro["codigo_articulo"]]=$registro["nombre"]." de ".$registro["precio"]."€";
    }
    return $s;
}
function categorias($m){
    $s["0"]="Todas las categorias";
    foreach ($m as $registro) {
        $s[$registro["cod_categoria"]]=$registro["categoria"];
    }
    return $s;
}
?>