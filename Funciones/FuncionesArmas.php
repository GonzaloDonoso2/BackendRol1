<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesArmas extends ConectorBaseDatos {
    
    function obtenerArmas() {
        
        $consulta = "select id, nombre from Armas";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $idArma = $value["id"];
            $nombreArma = $value["nombre"];

            $jsonRespuesta[] = array(
                "id" => $idArma,
                "nombre" => $nombreArma
            );
        }

        $respuestaArmas = json_encode($jsonRespuesta);
        echo $respuestaArmas;
    }    
    
    function obtenerArma($nuevoValor) {
        
        $idArma = $nuevoValor->id;        
        $consulta = "select nombre, alcance, dano, tipoDano, tipo, fuerzaNecesaria, resistencia from Armas where id = $idArma";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {
            
            $nombreArma = $value["nombre"];
            $alcanceArma = $value["alcance"];
            $danoArma = $value["dano"];
            $tipoDanoArma = $value["tipoDano"];
            $tipoArma = $value["tipo"];
            $fuerzaNecesaria = $value["fuerzaNecesaria"];
            $resistenciaArma = $value["resistencia"];

            $jsonRespuesta[] = array(
                "id" => $idArma,
                "nombre" => $nombreArma,
                "alcance" => $alcanceArma,
                "dano" => $danoArma,
                "tipoDano" => $tipoDanoArma,
                "tipo" => $tipoArma,
                "fuerzaNecesaria" => $fuerzaNecesaria,
                "resistencia" => $resistenciaArma
            );
        }

        $respuestaArmas = json_encode($jsonRespuesta);
        echo $respuestaArmas;
    }    
}
