<?php
session_start();
var_dump($_POST);

$quantidade = $_POST['quantidade'];
$observacao = $_POST['observacao'];
$produtoId = $_POST['id'];
$tipoQuantidadeId = $_POST['tipoQuantidadeId'];
$usuarioId = $_SESSION['usuario_id'];

// IMPORTANTE: Use sempre prepared statements para evitar SQL injection
$sql = "INSERT INTO `usuariocarrinho` (`usuarioId`, `produtoId`, `quantidade`, `tipoQuantidadeId`, `observacao`) VALUES (?, ?, ?, ?, ?)";

// Exemplo usando MySQLi
$conn = new mysqli('localhost', 'root', 'root', 'seu_banco');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Erro ao preparar: " . $conn->error);
}

$stmt->bind_param("iiiss", $usuarioId, $produtoId, $quantidade, $tipoQuantidadeId, $observacao);

if ($stmt->execute()) {
    echo "Item adicionado ao carrinho com sucesso!";
} else {
    echo "Erro ao adicionar ao carrinho: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>