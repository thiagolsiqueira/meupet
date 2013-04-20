<?php


include "conexao.php";

session_start();

if (!isset($_SESSION['login_usuario']) 
   && $_SESSION['senha_usuario'] !== true) {

   header('Location: index.php');
   exit;
}


?>