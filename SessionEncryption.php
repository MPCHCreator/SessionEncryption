<?php

include_once "EncryptionPHP/EncryptionPHP.php";

class SessionEncryption{

    public static function sessionEncrypt($variableSession, $keyDirectory){
        # Obtenemos el nombre de la clave de la variable de sesion
        $variableName = array_keys($_SESSION, $variableSession);
        # Apuntamos al primer parametro
        $variableName = $variableName[0];
        # ciframos el contenido de la variable de sesion
        $sessionContent = EncryptionPHP::encode($variableSession, $keyDirectory);
        # establecemos el contenido cifrado en la variable de sesion
        $_SESSION[$variableName] = $sessionContent;
    }

    public static function sessionDecrypt($variableSession, $keyDirectory){
        $variableName = array_keys($_SESSION, $variableSession);
        $variableName = $variableName[0];
        # ciframos el contenido de la variable de sesion
        $variableSession = EncryptionPHP::decode($variableSession, $keyDirectory);
        $_SESSION[$variableName] = $variableSession;
    }
}
