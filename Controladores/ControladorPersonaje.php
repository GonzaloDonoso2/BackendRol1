<?php

include "Funciones//FuncionesPersonaje.php";

class ControladorPersonaje extends FuncionesPersonaje {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "DELETE") {
            
            /*No es correcto borrar 
            registros de una base de
            datos en un ambiente 
            productivo.*/
            
        } elseif ($metodo === "GET") {
            
            if ($nuevoParametro === "obtenerPersonajes1") {
                
                $this->obtenerPersonajes1();
            
            } elseif ($nuevoParametro === "obtenerPersonajes2") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerPersonajes2($nuevoValor);
                
            } elseif ($nuevoParametro === "obtenerPersonajes3") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerPersonajes3($nuevoValor);  
                
            } elseif ($nuevoParametro === "obtenerSolicitudes") {
                
                $this->obtenerSolicitudesPersonajes();  
                
            } elseif ($nuevoParametro === "obtenerSolicitud") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerSolicitudPersonaje($nuevoValor);
            } 
            
        } elseif ($metodo === "POST") {  
            
            if ($nuevoParametro === "personaje") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->registrarPersonaje($nuevoValor);
            }
            
        } elseif ($metodo === "PUT") {
            
            if ($nuevoParametro === "cambioPersonajes") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->cambiarPersonaje($nuevoValor);
                
            } elseif ($nuevoParametro === "aceptarSolicitud") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->aceptarSolicitudesPersonajes($nuevoValor);       
            } 
        }
    }
}
