<?php
include_once("conexao.php");

// Obtém o ID do pedido da URL
if (!isset($_GET['pedidoId']) || !is_numeric($_GET['pedidoId'])) {
    die("ID do pedido inválido.");
}

$pedidoId = (int) $_GET['pedidoId'];

// Consulta SQL para buscar os dados do pedido
$sql_pedido = "SELECT 
                    c.id AS pedidoId, 
                    u.nome AS clienteNome, 
                    u.endereco AS enderecoEntrega, 
                    u.complemento AS complementoEntrega, 
                    u.cep AS cepEntrega, 
                    u.telefone AS telefoneCliente, 
                    c.data AS dataPedido, 
                    fp.nome AS formaPagamentoNome, 
                    s.nome AS statusPedidoNome
                FROM compra c
                JOIN usuario u ON c.usuarioId = u.id
                JOIN formaPagamento fp ON c.formaPagamentoId = fp.id
                JOIN status s ON c.statusId = s.id
                WHERE c.id = ?";

$stmt_pedido = $link->prepare($sql_pedido);
$stmt_pedido->bind_param("i", $pedidoId);
$stmt_pedido->execute();
$resultado_pedido = $stmt_pedido->get_result();

if ($resultado_pedido->num_rows === 0) {
    die("Pedido não encontrado.");
}

$pedido = $resultado_pedido->fetch_assoc();
$stmt_pedido->close();

// Consulta SQL para buscar os produtos do pedido, incluindo a observação
$sql_produtos = "SELECT 
                    p.nome AS produtoNome, 
                    cp.quantidade, 
                    cp.valor, 
                    tq.tipo AS tipoQuantidade,
                    cp.observacao
                FROM compraProduto cp
                JOIN produto p ON cp.idProduto = p.id
                JOIN tipoQuantidade tq ON cp.tipoQuantidadeId = tq.id
                WHERE cp.idCompra = ?";

$stmt_produtos = $link->prepare($sql_produtos);
$stmt_produtos->bind_param("i", $pedidoId);
$stmt_produtos->execute();
$resultado_produtos = $stmt_produtos->get_result();

$produtos = [];
$valorTotal = 0;

while ($produto = $resultado_produtos->fetch_assoc()) {
    $produto['subtotal'] = $produto['quantidade'] * $produto['valor'];
    $valorTotal += $produto['subtotal'];
    $produtos[] = $produto;
}
$stmt_produtos->close();
$link->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Pedido #<?= htmlspecialchars($pedido['pedidoId']) ?></title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .pedido-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .pedido-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .pedido-detalhes {
            margin-bottom: 20px;
        }

        .produto-item {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 5px;
            background-color: #fff;
        }

        .produto-item span {
            flex: 1;
            padding: 0 5px;
        }

        .produto-observacao {
            margin-top: 5px;
            font-style: italic;
            color: #555;
        }

        .pedido-total {
            text-align: right;
            font-size: 18px;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body onload="window.print();">
    <div class="pedido-container">
        <div class="pedido-header">
            <h1>Pedido #<?= htmlspecialchars($pedido['pedidoId']) ?></h1>
            <p>Status: <?= htmlspecialchars($pedido['statusPedidoNome']) ?></p>
        </div>

        <div class="pedido-detalhes">
            <h2>Detalhes do Cliente</h2>
            <p><strong>Nome:</strong> <?= htmlspecialchars($pedido['clienteNome']) ?></p>
            <p><strong>Endereço:</strong> <?= htmlspecialchars($pedido['enderecoEntrega']) ?>,
                <?= htmlspecialchars($pedido['complementoEntrega']) ?></p>
            <p><strong>CEP:</strong> <?= htmlspecialchars($pedido['cepEntrega']) ?></p>
            <p><strong>Telefone:</strong> <?= htmlspecialchars($pedido['telefoneCliente']) ?></p>
            <p><strong>Data do Pedido:</strong> <?= htmlspecialchars(date("d/m/Y", strtotime($pedido['dataPedido']))) ?>
            </p>
            <p><strong>Forma de Pagamento:</strong> <?= htmlspecialchars($pedido['formaPagamentoNome']) ?></p>
        </div>

        <div class="pedido-produtos">
            <h2>Produtos</h2>
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="produto-item">
                        <span><strong>Produto:</strong> <?= htmlspecialchars($produto['produtoNome']) ?></span>
                        <span><strong>Quantidade:</strong> <?= htmlspecialchars($produto['quantidade']) ?>
                            <?= htmlspecialchars($produto['tipoQuantidade']) ?></span>
                        <span><strong>Valor Unitário:</strong> R$ <?= number_format($produto['valor'], 2, ',', '.') ?></span>
                        <span><strong>Total:</strong> R$
                            <?= number_format($produto['subtotal'], 2, ',', '.') ?></span>
                    </div>
                    <?php if (!empty($produto['observacao'])): ?>
                        <div class="produto-observacao">
                            <strong>Observação:</strong> <?= htmlspecialchars($produto['observacao']) ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum produto encontrado para este pedido.</p>
            <?php endif; ?>
        </div>

        <div class="pedido-total">Total do Pedido: R$
            <?= number_format($valorTotal, 2, ',', '.') ?>
        </div>
    </div>
</body>

</html>
