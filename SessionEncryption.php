<?php

include_once "EncryptionPHP/EncryptionPHP.php";

class SessionEncryption{

    public static function sessionEncrypt($variableSession, $keyDirectory){
        SessionEncryption::session($variableSession, $keyDirectory, "encode");
    }

    public static function sessionDecrypt($variableSession, $keyDirectory){
        SessionEncryption::session($variableSession, $keyDirectory, "decode");
    }

    private static function session($variableSession, $keyDirectory, $methodName){
        # Obtenemos el nombre de la clave de la variable de sesion
        $variableName = array_keys($_SESSION, $variableSession);
        # Apuntamos al primer parametro
        $variableName = $variableName[0];
        # En caso de ser un arreglo encriptamos la informacion dentro de este
        if(is_array($variableSession)){
            for ($i=0; $i < count($variableSession); $i++) { 
                $sessionContent[] = EncryptionPHP::$methodName($variableSession[$i], $keyDirectory);
            }
        }else{
            # ciframos el contenido de la variable de sesion
            $sessionContent = EncryptionPHP::$methodName($variableSession, $keyDirectory);
        }
        # establecemos el contenido cifrado en la variable de sesion
        $_SESSION[$variableName] = $sessionContent;
    }
}
