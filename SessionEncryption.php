<?php

include_once "EncryptionPHP/EncryptionPHP.php";

class SessionEncryption{

    /**
     * @param mixed $variableSession
     * @param string $keyDirectory
     * 
     * @return void
     */
    public static function sessionEncrypt($variableSession, $keyDirectory = "config/key.txt"){
        SessionEncryption::session($variableSession, $keyDirectory, "encode");
    }

    /**
     * @param mixed $variableSession
     * @param string $keyDirectory
     * 
     * @return void
     */
    public static function sessionDecrypt($variableSession, $keyDirectory = "config/key.txt"){
        SessionEncryption::session($variableSession, $keyDirectory, "decode");
    }

    /**
     * @param mixed $variableSession
     * @param mixed $keyDirectory
     * @param mixed $methodName
     * 
     * @return void
     */
    private static function session($variableSession, $keyDirectory, $methodName){
        # Obtenemos el nombre de la clave de la variable de sesion
        $variableName = array_keys($_SESSION, $variableSession);
        # Apuntamos al primer parametro
        $variableName = $variableName[0];
        # ciframos el contenido de la variable de sesion
        switch ($variableSession) {
            # Verificamos si es un arreglo
            case is_array($variableSession):
                for ($i=0; $i < count($variableSession); $i++) { 
                    $sessionContent[] = EncryptionPHP::$methodName($variableSession[$i], $keyDirectory);
                }
                break;
            # Verificamos si es un objeto
            case is_object($variableSession):
                foreach($variableSession as $clave => $valor) {
                    $variableSession->$clave = EncryptionPHP::$methodName($valor, $keyDirectory);
                }
                $sessionContent = $variableSession;
                break;
            # Verificamos si es un string
            case is_string($variableSession):
                $sessionContent = EncryptionPHP::$methodName($variableSession, $keyDirectory);
                break;
            default:
                $sessionContent = $variableSession;
                break;
        }
        # establecemos el contenido cifrado en la variable de sesion
        $_SESSION[$variableName] = $sessionContent;
    }
}
