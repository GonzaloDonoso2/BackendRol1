<?php

include "Funciones//FuncionesPersonaje.php";

class ControladorPersonaje extends FuncionesPersonaje {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "GET") {
            
            if ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerPersonaje($nuevoValor);
            }
            
        } else if ($metodo === "POST") {  
            
            if ($nuevoParametro === "personaje") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->registrarPersonaje($nuevoValor);
            }            
        }
    }
}
