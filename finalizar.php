<?php
session_start();
include_once("conexao.php");

// Passo 1: Inserir na tabela compra
$stmt = $link->prepare("INSERT INTO compra (usuarioId, data, formaPagamentoId, statusId) VALUES (?, CURDATE(), ?, 1)");
if ($stmt === false) {
    die("Erro ao preparar compra: " . $link->error);
}

$stmt->bind_param("ii", $_SESSION['usuario_id'], $_POST['pagamento']);
if (!$stmt->execute()) {
    die("Erro ao executar compra: " . $stmt->error);
}

// Pega o ID da compra recém-inserida
$compraId = $link->insert_id;
$usuarioId = $_SESSION['usuario_id'];

// Passo 2: Inserir os produtos do carrinho na compraProduto
$sql = "
INSERT INTO compraProduto (idCompra, idProduto, valor, quantidade, tipoQuantidadeId, observacao)
SELECT ?, uc.produtoId, p.valor, uc.quantidade, uc.tipoQuantidadeId, uc.observacao
FROM usuarioCarrinho uc
INNER JOIN produto p ON p.id = uc.produtoId
WHERE uc.usuarioId = ?
";

$stmt = $link->prepare($sql);
if ($stmt === false) {
    die("Erro ao preparar compraProduto: " . $link->error);
}

$stmt->bind_param("ii", $compraId, $usuarioId);
if (!$stmt->execute()) {
    die("Erro ao executar compraProduto: " . $stmt->error);
}

// Passo 3: Limpar o carrinho do usuário
$stmt = $link->prepare("DELETE FROM usuarioCarrinho WHERE usuarioId = ?");
if ($stmt === false) {
    die("Erro ao preparar delete: " . $link->error);
}

$stmt->bind_param("i", $usuarioId);
if (!$stmt->execute()) {
    die("Erro ao limpar carrinho: " . $stmt->error);
}

echo "Compra finalizada com sucesso! Compra ID: " . $compraId;
// TODO usar copilot para criar uma tela bonita aqui
?>

