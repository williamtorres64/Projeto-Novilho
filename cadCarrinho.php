<?php
session_start();
include_once("conexao.php");

var_dump($_POST);

$quantidade = strtr($_POST['quantidade'], ",", ".");
$observacao = $_POST['observacao'];
$produtoId = $_POST['id'];
$tipoQuantidadeId = $_POST['tipoQuantidadeId'];
$usuarioId = $_SESSION['usuario_id'];

$sql = "INSERT INTO `usuarioCarrinho` (`usuarioId`, `produtoId`, `quantidade`, `tipoQuantidadeId`, `observacao`) VALUES (?, ?, ?, ?, ?)";

$stmt = $link->prepare($sql);
if ($stmt === false) {
    die("Erro ao preparar: " . $link->error);
}

$stmt->bind_param("iidis", $usuarioId, $produtoId, $quantidade, $tipoQuantidadeId, $observacao);

if ($stmt->execute()) {
    echo "Item adicionado ao carrinho com sucesso!";
} else {
    echo "Erro ao adicionar ao carrinho: " . $stmt->error;
}

$stmt->close();
$link->close();

    header("Location: index.php");
    exit();
?>
