<?php

namespace App\Controllers;
use App\Models\Modelo;

class Home extends BaseController{
    //atributos
    private $modelo;

    //Constructor
    public function __construct(){
        $this->modelo=new Modelo();
    }
    public function index(){
        // $maleta["usuario"]=$this->modelo->nombreUsuario(session()->get("codUsu"));
        helper("funciones");
        $maleta["articulos"]= $this->modelo->articulosEnVenta();
        $maleta["categorias"]=categorias($this->modelo->dimeCategorias());
        return view('vista1',$maleta);
    }
    // Comprueba si existe el usuario y si es asi mostrara vista3 si no mostrara vista2
    public function login(){
        // if(session()->has("codUsu")){
        //     $maleta["usuario"]=$this->modelo->nombreUsuario(session()->get("codUsu"));
        //     $this->verVista3($maleta);
        //     }else{
        //         session()->remove("codUsu");
                return view("vista2");
        // }
    }
    public function iniciaSesion(){
        //Recojo los valores 
        $user=$this->request->getPost("user");
        $contra=$this->request->getPost("contrasena");
        

        //Compruebo si existe el usuario
        $respuesta=$this->modelo->existeUsuario($user,$contra);
        if($respuesta== "malo"){
            return view("vista2");
        }else{
            //Sesion con codigo de usuario FUNCIONA 
            
            $session=session();
            $session->set("codUsu",$respuesta);
            $maleta["usuario"]=$this->modelo->nombreUsuario($session->get("codUsu"));
            $this->verVista3($maleta);
        }
    }
    //Comprueba cual es el usuario que esta en sesion y le inicia sesion directamente
    public function compruebaUsu(){
        $maleta["usuario"]=$this->modelo->nombreUsuario(session()->get("codUsu"));
        $this->verVista3($maleta);
    }
    //Comprueba que el usuario no existe, lo crea y muestra la vista3
    public function nuevoUsuario(){
        //Recojo los valores 
        $nombre=$this->request->getPost("nombre");
        $user=$this->request->getPost("user");
        $contra=$this->request->getPost("contrasena");
        
        $this->modelo->nuevoUsuario($nombre,$user,$contra);
        $maleta["usuario"]=$nombre;
        $this->verVista3($maleta);
        
    }
    //Añade el articulo a la base de datos
    public function nuevoArticulo(){
        //Necesito recoger la categoria,precio,titulo,datos,archivo, y el user de sesion
        $session=session();
        $user=$session->get("codUsu");
        $categoria=$this->request->getPost("categoria");
        $precio=$this->request->getPost("precio");
        $titulo=$this->request->getPost("titulo");
        $datos=$this->request->getPost("datos");
        $file=$this->request->getFile("imagen");
        copy($file->getTempName(),"c:/tmp/imagen.jpg");
        $this->modelo->anadirArticulo($user,$categoria,$precio,$titulo,$datos);

        $maleta["usuario"]=$this->modelo->nombreUsuario($session->get("codUsu"));
        $this->verVista3($maleta);
        
        
    }
    //Funcion para mostrar la vista 3 con los datos que necesite y asi no estar repitiendo cada vez una accion te manda a esa vista
    public function verVista3($maleta){
        
        helper("funciones");
        $maleta["mensajeOferta"]=paraOfertas($this->modelo->dimeOfertasMensaje($maleta["usuario"]));
        $maleta["categorias"]=categorias($this->modelo->dimeCategorias());
        $maleta["misArticulos"]=$this->modelo->queVende(session()->get("codUsu"));
        echo view("vista3",$maleta);
    }
    //Devuelve la vista donde se modifica la informacion del producto Y se ven los mensajes recibidos del mismo
    public function infoProducto(){
        $maleta["articulo"]=$this->request->getGet("cod");
        //NECESITO FOTO NOMBRE INFO PRECIO Y ACTIVO
        $maleta["info"]=$this->modelo->datosProducto($maleta["articulo"]);
        $maleta["usuario"]=$this->modelo->nombreUsuario(session()->get("codUsu"));
        //Recupero los mensajes que haya recibido ese producto para mostrarlos 
        $maleta["mensajesRecibidos"]=$this->modelo->mensajesRecibidos($maleta["articulo"]);

        return view("vista4",$maleta);
    }
    //Funcion que recoge los datos del formulario y modifica la informacion 
    public function modificarProducto(){

        $maleta["articulo"]=$this->request->getPost("articulo");
        $titulo=$this->request->getPost("titulo");
        $descripcion=$this->request->getPost("descripcion");
        $precio=$this->request->getPost("precio");
        $activo=$this->request->getPost("activo");
        $this->modelo->modificarProducto($maleta["articulo"],$titulo,$descripcion,$precio,$activo);

        //Necesario para mostrar la vista4 
        $maleta["info"]=$this->modelo->datosProducto($maleta["articulo"]);
        $maleta["usuario"]=$this->modelo->nombreUsuario(session()->get("codUsu"));
        $maleta["mensajesRecibidos"]=$this->modelo->mensajesRecibidos($maleta["articulo"]);

        return view("vista4",$maleta);
    }
    //Funcion para cuando se envia un nuevo mensaje 
    public function nuevoMensaje(){
        $user=session()->get("codUsu");
        $articulo=$this->request->getPost("articulo");
        $mensaje=$this->request->getPost("mensaje");

        $this->modelo->enviarMensaje($user,$articulo,$mensaje);

        $maleta["usuario"]=$this->modelo->nombreUsuario($user);
        $this->verVista3($maleta);
    }
}
