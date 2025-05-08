<?php
session_start();
include_once("conexao.php");

if (isset($_GET['ucid'])) {
    $sql = "delete from usuarioCarrinho where id=" . $_GET['ucid'];
    mysqli_query($link, $sql);
    
    header("Location: carrinho.php");
    exit();
}
