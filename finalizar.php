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

// Após limpar o carrinho, exibir uma página amigável
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Finalizada - Novilho Cortes</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        .mensagem-sucesso {
            text-align: center;
            padding: 40px;
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 50px auto;
        }
        .mensagem-sucesso h2 {
            color: #4CAF50;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .mensagem-sucesso p {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .botao {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .botao:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="geral">
        <div id="topo">
            <?php include "topo.php"; ?>
        </div>

        <div id="conteudo">
            <div class="mensagem-sucesso">
                <h2>🎉 Compra realizada com sucesso!</h2>
                <p>Obrigado por escolher a Novilho Cortes.</p>
                <p>Número da sua compra: <strong>#<?php echo $compraId; ?></strong></p>
                <p>Entraremos em contato em breve com mais detalhes sobre a entrega.</p>
                <a href="index.php" class="botao">🏠 Voltar para a página inicial</a>
            </div>
        </div>

        <div id="rodape">
            <?php include "rodape.php"; ?>
        </div>
    </div>
</body>
</html>


