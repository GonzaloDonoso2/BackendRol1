<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesPersonaje extends ConectorBaseDatos { 
       
    function obtenerPersonajes() {
        
        $consultaExterior = "select * from Personajes";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);

        foreach ($respuestaExterior as $key => $valueExterior) {

            $idPersonaje = $valueExterior["id"];
            $alcance = $valueExterior["alcance"];
            $armadura = $valueExterior["armadura"];
            $ataque = $valueExterior["ataque"];
            $dano = $valueExterior["dano"];
            $defensa = $valueExterior["defensa"];
            $iniciativa = $valueExterior["iniciativa"];
            $movimiento = $valueExterior["movimiento"];
            $nombre = $valueExterior["nombre"];
            $salud = $valueExterior["salud"];
            $idCategoria = $valueExterior["idCategoria"];
            $consultaInterior = "select nombre from Categorias where id = $idCategoria";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

            foreach ($respuestaInterior as $key => $valueInterior) {

                $categoria = $valueInterior["nombre"];
            };

            $consultaInterior = "select alcance, descripcion, nombre from Habilidades where idCategoria = $idCategoria";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

            foreach ($respuestaInterior as $key => $valueInterior) {

                $alcanceHabilida = $valueInterior["alcance"];
                $descripcionHabilidad = $valueInterior["descripcion"];
                $nombreHabilidad = $valueInterior["nombre"];
            };

            $jsonRespuesta[] = array(
                "id" => $idPersonaje,
                "alcance" => $alcance,
                "armadura" => $armadura,
                "ataque" => $ataque,
                "dano" => $dano,
                "defensa" => $defensa,
                "iniciativa" => $iniciativa,
                "movimiento" => $movimiento,
                "nombre" => $nombre,
                "salud" => $salud,
                "categoria" => $categoria,
                "alcanceHabilidad" => $alcanceHabilida,
                "descripcionHabilidad" => $descripcionHabilidad,
                "nombreHabilidad" => $nombreHabilidad
            );
        }

        $respuestaPersonajes = json_encode($jsonRespuesta);
        echo $respuestaPersonajes;
    }

    function obtenerPersonajes2($nuevoValor) {

        $idUsuario = $nuevoValor->idUsuario;
        $consultaExterior1 = "select idPersonaje from PersonajesUsuarios where idUsuario = $idUsuario and estado = 'ADQUIRIDO Y VIGENTE'";
        $respuestaExterior1 = $this->consultarBaseDatos($consultaExterior1);

        foreach ($respuestaExterior1 as $key => $valueExterior1) {

            $idPersonaje = $valueExterior1["idPersonaje"];            
            $consultaExterior2 = "select * from Personajes where id = $idPersonaje";
            $respuestaExterior2 = $this->consultarBaseDatos($consultaExterior2);
            
            foreach ($respuestaExterior2 as $key => $valueExterior2) {

                $idPersonaje = $valueExterior2["id"];
                $nombre = $valueExterior2["nombre"];
                $alcance = $valueExterior2["alcance"];
                $armadura = $valueExterior2["armadura"];
                $ataque = $valueExterior2["ataque"];
                $dano = $valueExterior2["dano"];
                $defensa = $valueExterior2["defensa"];
                $iniciativa = $valueExterior2["iniciativa"];
                $movimiento = $valueExterior2["movimiento"];
                $salud = $valueExterior2["salud"];
                $idCategoria = $valueExterior2["idCategoria"];
                $consultaInterior = "select nombre from Categorias where id = $idCategoria";
                $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

                foreach ($respuestaInterior as $key => $valueInterior) {

                    $categoria = $valueInterior["nombre"];
                };

                $jsonRespuesta[] = array(
                    "id" => $idPersonaje,
                    "nombre" => $nombre,
                    "alcance" => $alcance,
                    "armadura" => $armadura,
                    "ataque" => $ataque,
                    "dano" => $dano,
                    "defensa" => $defensa,
                    "iniciativa" => $iniciativa,
                    "movimiento" => $movimiento,
                    "salud" => $salud,
                    "categoria" => $categoria
                );
            }
        }

        $respuestaPersonajes = json_encode($jsonRespuesta);
        echo $respuestaPersonajes;
    }
    
    function obtenerPersonajes3($nuevoValor) {

        $idUsuario = $nuevoValor->idUsuario;
        $consultaExterior1 = "select idPersonaje from PersonajesUsuarios where idUsuario = $idUsuario and estado = 'ADQUIRIDO'";
        $respuestaExterior1 = $this->consultarBaseDatos($consultaExterior1);
        
        if (mysqli_num_rows($respuestaExterior1) > 0) {

            foreach ($respuestaExterior1 as $key => $valueExterior1) {

                $idPersonaje = $valueExterior1["idPersonaje"];
                $consultaExterior2 = "select * from Personajes where id = $idPersonaje";
                $respuestaExterior2 = $this->consultarBaseDatos($consultaExterior2);

                foreach ($respuestaExterior2 as $key => $valueExterior2) {

                    $idPersonaje = $valueExterior2["id"];
                    $nombre = $valueExterior2["nombre"];
                    $alcance = $valueExterior2["alcance"];
                    $armadura = $valueExterior2["armadura"];
                    $ataque = $valueExterior2["ataque"];
                    $dano = $valueExterior2["dano"];
                    $defensa = $valueExterior2["defensa"];
                    $iniciativa = $valueExterior2["iniciativa"];
                    $movimiento = $valueExterior2["movimiento"];
                    $salud = $valueExterior2["salud"];
                    $idCategoria = $valueExterior2["idCategoria"];
                    $consultaInterior = "select nombre from Categorias where id = $idCategoria";
                    $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

                    foreach ($respuestaInterior as $key => $valueInterior) {

                        $categoria = $valueInterior["nombre"];
                    };

                    $jsonRespuesta[] = array(
                        "id" => $idPersonaje,
                        "nombre" => $nombre,
                        "alcance" => $alcance,
                        "armadura" => $armadura,
                        "ataque" => $ataque,
                        "dano" => $dano,
                        "defensa" => $defensa,
                        "iniciativa" => $iniciativa,
                        "movimiento" => $movimiento,
                        "salud" => $salud,
                        "categoria" => $categoria
                    );
                }
            }
            
            $respuestaPersonajes = json_encode($jsonRespuesta);
            echo $respuestaPersonajes;
            
        } else {
            
            $respuestaPersonajes = "Sin personajes registrados.";
            echo $respuestaPersonajes;            
        }       
    }
    
    function cambiarPersonaje ($nuevoValor) {

        $idUsuario = $nuevoValor->idUsuario;
        $idPersonaje1 = $nuevoValor->idPersonaje1;
        $idPersonaje2 = $nuevoValor->idPersonaje2;
        $consulta = "update PersonajesUsuarios set estado = 'ADQUIRIDO' where idPersonaje = $idPersonaje1 and idUsuario = $idUsuario";
        $this->consultarBaseDatos($consulta);
        $consulta = "update PersonajesUsuarios set estado = 'ADQUIRIDO Y VIGENTE' where idPersonaje = $idPersonaje2 and idUsuario = $idUsuario";
        $this->consultarBaseDatos($consulta);
        $respuestaPersonajes = "Cambio de personajes registrado.";
        echo $respuestaPersonajes;
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

        $consulta = "insert into Personajes (id, nombre, agilidad, destreza, inteligencia, fuerza, percepcion, resistencia, estado, idUsuario, idArmaPrimaria, idArmaSecundaria, idArmadura) values ($idPersonaje, '$nombrePersonaje', $puntuacionAgilidadPersonaje, $puntuacionDestrezaPersonaje, $puntuacionInteligenciaPersonaje, $puntuacionFuerzaPersonaje, $puntuacionPercepcionPersonaje, $puntuacionResistenciaPersonaje, 'VIGENTE', $idUsuario, $idArmaPrimaria, $idArmaSecundaria, $idArmadura)";
        $this->consultarBaseDatos($consulta);
        echo "El personaje fue registrado de manera exitosa.";
    }

    function obtenerSolicitudesPersonajes(){
        
        $consultaExterior = "select id, estado, fecha, idPersonajeUsuario from Solicitudes";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);
        $jsonRespuesta = array();

        foreach ($respuestaExterior as $key => $valueExterior) {

            $idSolicitud = $valueExterior["id"];
            $estado = $valueExterior["estado"];
            $fecha = $valueExterior["fecha"];
            $idPersonajeUsuario = $valueExterior["idPersonajeUsuario"];
            $consultaInterior = "select idPersonaje, idUsuario from PersonajesUsuarios where id = $idPersonajeUsuario";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);
            
            foreach ($respuestaInterior as $key => $valueInterior) {
                
                $idPersonaje = $valueInterior["idPersonaje"];
                $idUsuario = $valueInterior["idUsuario"];                
            }
            
            $consultaInterior = "select nombre from Personajes where id = $idPersonaje";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);
            
            foreach ($respuestaInterior as $key => $valueInterior) {
                
                $personaje = $valueInterior["nombre"];              
            }
            
            $consultaInterior = "select nombre from Usuarios where id = $idUsuario";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);
            
            foreach ($respuestaInterior as $key => $valueInterior) {
                
                $usuario = $valueInterior["nombre"];              
            }
            
            $jsonRespuesta[] = array(
                "idSolicitud" => $idSolicitud,
                "estado" => $estado,
                "fecha" => $fecha,
                "idPersonajeUsuario" => $idPersonajeUsuario,
                "personaje" => $personaje,
                "usuario" => $usuario
            );
        }

        $respuestaPersonajes = json_encode($jsonRespuesta);
        echo $respuestaPersonajes;
    }
    
    function obtenerSolicitudPersonaje($nuevoValor){
        
        $idSolicitud = $nuevoValor->idSolicitud;        
        $consultaExterior = "select estado, fecha, idPersonajeUsuario from Solicitudes where id = $idSolicitud";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);
        $jsonRespuesta = array();
        
        if (mysqli_num_rows($respuestaExterior) > 0) {

            foreach ($respuestaExterior as $key => $valueExterior) {
                
                $estado = $valueExterior["estado"];
                $fecha = $valueExterior["fecha"];
                $idPersonajeUsuario = $valueExterior["idPersonajeUsuario"];
                $consultaInterior = "select idPersonaje, idUsuario from PersonajesUsuarios where id = $idPersonajeUsuario";
                $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

                foreach ($respuestaInterior as $key => $valueInterior) {

                    $idPersonaje = $valueInterior["idPersonaje"];
                    $idUsuario = $valueInterior["idUsuario"];
                }

                $consultaInterior = "select nombre from Personajes where id = $idPersonaje";
                $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

                foreach ($respuestaInterior as $key => $valueInterior) {

                    $personaje = $valueInterior["nombre"];
                }

                $consultaInterior = "select nombre from Usuarios where id = $idUsuario";
                $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

                foreach ($respuestaInterior as $key => $valueInterior) {

                    $usuario = $valueInterior["nombre"];
                }

                $jsonRespuesta[] = array(
                    "idSolicitud" => $idSolicitud,
                    "estado" => $estado,
                    "fecha" => $fecha,
                    "idPersonajeUsuario" => $idPersonajeUsuario,
                    "personaje" => $personaje,
                    "usuario" => $usuario
                );
            }

            $respuestaPersonajes = json_encode($jsonRespuesta);
            
        } else {
            
            $respuestaPersonajes = "Esta solicitud no está registrada.";            
        }

        echo $respuestaPersonajes;
    }

    function aceptarSolicitudesPersonajes($nuevoValor){
        
        $idSolicitud = $nuevoValor->idSolicitud;        
        $consulta = "update Solicitudes set estado = 'REALIZADA' where id = $idSolicitud";
        $this->consultarBaseDatos($consulta);
        $consultaExterior = "select idPersonajeUsuario from Solicitudes where id = $idSolicitud";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);

        foreach ($respuestaExterior as $key => $valueExterior) {

            $idPersonajeUsuario = $valueExterior["idPersonajeUsuario"];
            $consultaInterior = "update PersonajesUsuarios set estado = 'ADQUIRIDO' where id = $idPersonajeUsuario";
            $this->consultarBaseDatos($consultaInterior);
            $respuestaPersonajes = "Solicitud aceptada y registrada de manera exitosa.";
        }
        
        echo $respuestaPersonajes;
    }  
}
