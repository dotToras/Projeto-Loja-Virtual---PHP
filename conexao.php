<?php

$servidor="localhost";
$usuario="blade";
$senha="12345678";
$banco="dbBlade";
$comando=new PDO("mysql:host=$servidor;dbname=$banco;",$usuario,$senha);

?>