<?php
include_once "SessionEncryption.php";

session_start();
$keyDirectory = "clave.txt";
$_SESSION['username'] = 'MPCH';
$_SESSION['password'] = '1234';

echo "<b>EJEMPLO DE STRING</b>"."<br>";
# llamamos a la funcion sessionEncrypt para cifrar los datos de la variable de sesion
# Establecemos los dos parametros (variable de sesion y el directorio de la llave)
SessionEncryption::sessionEncrypt($_SESSION['password'], $keyDirectory);
echo $_SESSION['password'];
echo "<br>";
# llamamos a la funcion sessionDecrypt para descifrar los datos de la variable de sesion
SessionEncryption::sessionDecrypt($_SESSION['password'], $keyDirectory);
echo $_SESSION['password'];

echo "<br>";
echo "<br>";

echo "<b>EJEMPLO DE ARRAY</b>"."<br>";
$array = ['uno','dos','tres','cuatro'];
$_SESSION['mensaje'] = $array;

SessionEncryption::sessionEncrypt($_SESSION['mensaje'], $keyDirectory);
print_r($_SESSION['mensaje']);
echo "<br>";
SessionEncryption::sessionDecrypt($_SESSION['mensaje'], $keyDirectory);
print_r($_SESSION['mensaje']);

