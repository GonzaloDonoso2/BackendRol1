<?php

include "Funciones//FuncionesUsuario.php";

class ControladorUsuario extends FuncionesUsuario {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "GET") {
            
            if ($nuevoParametro === "inicioSesion") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->iniciarSesion($nuevoValor);
                
            } elseif ($nuevoParametro === "nombreUsuario1") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->verificarNombreUsuario1($nuevoValor);
                
            }  elseif ($nuevoParametro === "correoElectronicoUsuario1") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->verificarCorreoElectronicoUsuario1($nuevoValor); 
                
            } elseif ($nuevoParametro === "nombreUsuario2") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->verificarNombreUsuario2($nuevoValor);
                
            } elseif ($nuevoParametro === "correoElectronicoUsuario2") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->verificarCorreoElectronicoUsuario2($nuevoValor);
                
            } elseif ($nuevoParametro === "id") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerUsuario($nuevoValor);
                
            } elseif ($nuevoParametro === "usuarios1") {

                $this->obtenerUsuarios1();
                
            } elseif ($nuevoParametro === "usuarios2") {

                $this->obtenerUsuarios2();
                
            } elseif ($nuevoParametro === "buscarUsuario") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->buscarUsuario($nuevoValor);
            }
            
        } elseif ($metodo === "POST") {
            
            if ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $usuario = json_decode($valor);
                $this->registrarUsuario($usuario);                
            }
            
        } elseif ($metodo === "PUT") {
            
            if ($nuevoParametro === "nombreUsuario") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->editarNombre($nuevoValor);
                
            } elseif ($nuevoParametro === "correoElectronicoUsuario") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->editarCorreoElectronico($nuevoValor);
                
            } elseif ($nuevoParametro === "contrasenaUsuario") {
                
                $valor = urldecode($parametro[1]);                
                $nuevoValor = json_decode($valor);
                $this->editarContrasena($nuevoValor);
                
            } elseif ($nuevoParametro === "habilitarUsuario") {
                
                $valor = urldecode($parametro[1]);                
                $nuevoValor = json_decode($valor);
                $this->habilitarUsuario($nuevoValor);
                
            } elseif ($nuevoParametro === "deshabilitarUsuario") {
                
                $valor = urldecode($parametro[1]);                
                $nuevoValor = json_decode($valor);
                $this->deshabilitarUsuario($nuevoValor);
            }
        }
    }
}
