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
$array = ['uno','dos','tres'];
$_SESSION['array'] = $array;

SessionEncryption::sessionEncrypt($_SESSION['array'], $keyDirectory);
print_r($_SESSION['array']);
echo "<br>";
SessionEncryption::sessionDecrypt($_SESSION['array'], $keyDirectory);
print_r($_SESSION['array']);

echo "<br>";
echo "<br>";

echo "<b>EJEMPLO DE OBJETO</b>"."<br>";
class MiClase
{
    public $valor1 = 'uno';
    public $valor2 = 'dos';
    public $valor3 = 'tres';
}

$clase = new MiClase();
$_SESSION['object'] = $clase;
SessionEncryption::sessionEncrypt($_SESSION['object'], $keyDirectory);
var_dump($_SESSION['object']);
echo "<br>";
SessionEncryption::sessionDecrypt($_SESSION['object'], $keyDirectory);
var_dump($_SESSION['object']);

