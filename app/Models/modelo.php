<?php
namespace App\Models;
use CodeIgniter\Model;

//Este es el modelo que se comunica con la base de datos
class Modelo extends Model{
    //Comprueba si existe un usuario si existe devuelve su codigo y si no existe devuelve malo
    function existeUsuario($user,$contra){
        $orden="SELECT cod_usuario from usuarios where usuario='".$user."' and contrasena='".$contra."';";
        $resultado = $this->db->query($orden);
        if($fila=$resultado->getRow()){
            //Existe ese usuario
            return $fila->cod_usuario;
        }else{
            //NO existe
            return "malo";
        }
    }
    //Decuelve el nombre del usuario
    function nombreUsuario($cod){
        $orden="SELECT nombre from usuarios where cod_usuario='".$cod."';";
        $resultado = $this->db->query($orden);
        if($fila=$resultado->getRow()){
            //Existe ese usuario
            return $fila->nombre;
        }

    }
    //crea un nuevo usuario en la base de datos
    function nuevoUsuario($nombre,$user,$contra){
        //Deberia comprobar si el usuario existe;IMPORTANTE 
        $orden="INSERT into usuarios(nombre,usuario,contrasena) values('".$nombre."','".$user."','".$contra."')";
        $this->db->query($orden);
        //Una vez creado devuelvo el codigo que se le ha asignado para poder guardarlo en una sesion 
        $orden="SELECT cod_usuario from usuarios where usuario='".$user."' and contrasena='".$contra."';";
        $resultado = $this->db->query($orden);
        if($fila=$resultado->getRow()){
            session()->set("codUsu",$fila->cod_usuario);
        }
    }
    //Funcion que devuelve el codigo, titulo y precio de los articulos que se usarapara elegir una oferta y mandarle un mensaje
    function dimeOfertasMensaje($us){
        //Recibo el usuario y compruebo para que muestre los articulos que no sean tuyos ademas de los que esten en activo
        $orden="SELECT codigo_articulo,a.nombre,precio FROM articulos a 
                join usuarios u on a.cod_usuario=u.cod_usuario
                where activo=1 and u.cod_usuario!='".$us."' ";
        $resultado=$this->db->query($orden);
        return $resultado->getResultArray();
    }
    //Funcion que devuelva los datos de todos los productos
    function articulosEnVenta(){
        $orden="SELECT * from articulos where activo=1";
        $resultado=$this->db->query($orden);
        return $resultado->getResultArray();
    }
    //Funcion que devuelve un array con las categorias y sus codigos
    function dimeCategorias(){
        $orden="SELECT * from categorias";
        $resultado=$this->db->query($orden);
        return $resultado->getResultArray();
    }
    //Funcion para insertar un articulo nuevo a la venta
    function  anadirArticulo($user,$categoria,$precio,$titulo,$datos){
        //Primero guardo la imagen y despues añado todo a la base de datos
        $orden="INSERT INTO articulos(cod_usuario,nombre,precio,descripcion,imagen,categoria,activo) 
                values (".$user.",'".$titulo."',".$precio.",'".$datos."', LOAD_FILE('c:/tmp/imagen.jpg'),'".$categoria."',1);";
        $this->db->query($orden);
    }

    //Funcion que modifica la informacion de un producto
    function modificarProducto($cod,$nombre,$descripcion,$precio,$activo){
        $orden="UPDATE articulos SET nombre='".$nombre."', precio=".$precio.", descripcion='".$descripcion."', activo=".$activo." where codigo_articulo=".$cod.";";
        $this->db->query($orden);
    }
    //Funcion pque devuelve informacion (Nombre,precio y cuando se oferto)sobre los articulos en venta de un usuario
    function queVende($codUs){
        $orden="SELECT  codigo_articulo,nombre,precio,ofertado from articulos where cod_usuario=".$codUs.";";
        $resultado=$this->db->query($orden);
        return $resultado->getResultArray();
    }
    //Funcion que devuelve la imagen, nombre,datos,precio y estado de un articulo en concreto
    function datosProducto($cod){
        $orden="SELECT nombre,precio,descripcion,imagen,activo from articulos where codigo_articulo=".$cod.";";
        $resultado=$this->db->query($orden);
        return $resultado->getResultArray();
    }
        
}

?>