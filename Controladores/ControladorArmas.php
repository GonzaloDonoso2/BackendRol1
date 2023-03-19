<?php

include "Funciones//FuncionesArmas.php";

class ControladorArmas extends FuncionesArmas {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "GET") {
            
            if ($nuevoParametro === "obtenerArmas") {
                
                $this->obtenerArmas();   
                
            } else if ($nuevoParametro === "arma") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerArma($nuevoValor);
            }                        
        }
    }
}
