<?php 
$local="localhost";
$usuario_BD="root";
$senha_BD="root";
$base="habit_you_db";

$conecta = new mysqli($local, $usuario_BD, $senha_BD, $base);

if ($conecta->connect_error){
    die("Deu erro na conexão ". $conecta->connect_error);
}