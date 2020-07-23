<?php
include_once "SessionEncryption.php";
# La funcion sessionEncrypt sirve para cifrar los datos de la variable de sesión
# La funcion sessionDecrypt sirve para descifrar los datos de la variable de sesión
# Ambas reciben como parametro la variable de sesión a encriptar o desencriptar

session_start();

echo "<b>EJEMPLO DE STRING</b>"."<br>";
$_SESSION['username'] = 'MPCH';
$_SESSION['password'] = '1234';

echo '<center>'."USERNAME".'</center>'."<br>";
SessionEncryption::sessionEncrypt($_SESSION['username']);
echo $_SESSION['username']."<br>";
SessionEncryption::sessionDecrypt($_SESSION['username']);
echo $_SESSION['username']."<br>";

echo '<center>'."PASSWORD".'</center>'."<br>";
SessionEncryption::sessionEncrypt($_SESSION['password']);
echo $_SESSION['password']."<br>";
SessionEncryption::sessionDecrypt($_SESSION['password']);
echo $_SESSION['password'];

echo "<br>";
echo "<br>";

echo "<b>EJEMPLO DE ARRAY</b>"."<br>";
$array = ['uno','dos','tres'];
$_SESSION['array'] = $array;
echo '<center>'."VARIABLE ENCRIPTADA".'</center>'."<br>";
SessionEncryption::sessionEncrypt($_SESSION['array']);
print_r($_SESSION['array']);
echo "<br>";
echo '<center>'."VARIABLE DESENCRIPTADA".'</center>'."<br>";
SessionEncryption::sessionDecrypt($_SESSION['array']);
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
echo '<center>'."VARIABLE ENCRIPTADA".'</center>'."<br>";
SessionEncryption::sessionEncrypt($_SESSION['object']);
var_dump($_SESSION['object']);
echo "<br>";
echo '<center>'."VARIABLE DESENCRIPTADA".'</center>'."<br>";
SessionEncryption::sessionDecrypt($_SESSION['object']);
var_dump($_SESSION['object']);

