<?php
//include_once "../123.php";
    //CONFIGURACIÓN DE **P R U E B A S**
    function verCredenciales(){
        $usuarioBdD = "root";
        $contraseniaBdD = "";
        $servidorBdD = "localhost:3306";
        $baseDeDatos = "estock";
        
        $credenciales = array($servidorBdD,$usuarioBdD,$contraseniaBdD,$baseDeDatos);
        return $credenciales; 
    }
   

 ?>