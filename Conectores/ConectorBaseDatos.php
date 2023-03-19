<?php

class ConectorBaseDatos {

    public function consultarBaseDatos($consulta) {
        
        $servidor = "us-cdbr-east-06.cleardb.net";
        $usuario = "b5ce580a04195a";
        $contrasena = "03d12752";
        $baseDatos = "heroku_3cc55e8986e522a";
        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);        
        $conexion->set_charset("utf8");        
        $respuesta = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        return $respuesta;        
    }
}
