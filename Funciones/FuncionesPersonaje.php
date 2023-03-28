<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesPersonaje extends ConectorBaseDatos { 
       
    function obtenerPersonaje($nuevoValor) {

        $idUsuario = $nuevoValor->id;
        $consulta = "select * from Personajes where idUsuario = $idUsuario and estado = 'VIGENTE'";
        $respuesta = $this->consultarBaseDatos($consulta);

        if (mysqli_num_rows($respuesta) > 0) {

            foreach ($respuesta as $key => $value) {

                $idPersonaje = $value["id"];
                $nombrePersonaje = $value["nombre"];
                $puntuacionAgilidad = $value["agilidad"];
                $puntuacionDestreza = $value["destreza"];
                $puntuacionInteligencia = $value["inteligencia"];
                $puntuacionFuerza = $value["fuerza"];
                $puntuacionPercepcion = $value["percepcion"];
                $puntuacionResistencia = $value["resistencia"];
                $idArmaPrimaria = $value["idArmaPrimaria"];
                $idArmaSecundaria = $value["idArmaSecundaria"];
                $idArmadura = $value["idArmadura"];
                $retratoPersonaje = $value["retrato"];

                $jsonRespuesta[] = array(
                    "id" => $idPersonaje,
                    "nombrePersonaje" => $nombrePersonaje,
                    "puntuacionAgilidad" => $puntuacionAgilidad,
                    "puntuacionDestreza" => $puntuacionDestreza,
                    "puntuacionInteligencia" => $puntuacionInteligencia,
                    "puntuacionFuerza" => $puntuacionFuerza,
                    "puntuacionPercepcion" => $puntuacionPercepcion,
                    "puntuacionResistencia" => $puntuacionResistencia,
                    "idArmaPrimaria" => $idArmaPrimaria,
                    "idArmaSecundaria" => $idArmaSecundaria,
                    "idArmadura" => $idArmadura,
                    "retrato" => $retratoPersonaje
                );
            }

            $respuestaPersonaje = json_encode($jsonRespuesta);
            echo $respuestaPersonaje;
            
        } else {

            echo "Sin Personajes Registrados.";
        }
    }

    function registrarPersonaje($nuevoValor){
        
        $idUsuario = $nuevoValor->usuario;
        $nombrePersonaje = $nuevoValor->nombre;
        $puntuacionAgilidadPersonaje = $nuevoValor->agilidad;
        $puntuacionDestrezaPersonaje = $nuevoValor->destreza;
        $puntuacionInteligenciaPersonaje = $nuevoValor->inteligencia;
        $puntuacionFuerzaPersonaje = $nuevoValor->fuerza;
        $puntuacionPercepcionPersonaje = $nuevoValor->percepcion;
        $puntuacionResistenciaPersonaje = $nuevoValor->resistencia;
        $idArmaPrimaria = $nuevoValor->armaPrimaria;
        $idArmaSecundaria = $nuevoValor->armaSecundaria;
        $idArmadura = $nuevoValor->armadura;
        $consulta = "select max(id) as id from Personajes";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $x = $value["id"];
        };
        
        $idPersonaje = ($x + 1);

        $consulta = "insert into Personajes (id, nombre, agilidad, destreza, inteligencia, fuerza, percepcion, resistencia, estado, idUsuario, idArmaPrimaria, idArmaSecundaria, idArmadura, retrato) values ($idPersonaje, '$nombrePersonaje', $puntuacionAgilidadPersonaje, $puntuacionDestrezaPersonaje, $puntuacionInteligenciaPersonaje, $puntuacionFuerzaPersonaje, $puntuacionPercepcionPersonaje, $puntuacionResistenciaPersonaje, 'VIGENTE', $idUsuario, $idArmaPrimaria, $idArmaSecundaria, $idArmadura, 'personaje')";
        $this->consultarBaseDatos($consulta);
        echo "El personaje fue registrado de manera exitosa.";
    }
}
