<?php
include_once("conexao.php");
session_start();
if ($_SESSION['logado'] !== true) {
    header("Location: entrar.php");
    exit();
}

$_GET['id'] = $_GET['id'] ?? null;

$sql = "SELECT `nome`, `valor`, `descricao`, `nomeImagem`, `tipo`, tq.id as tqid FROM `produto` p inner join tipoQuantidade tq on tq.id = p.tipoQuantidadeId WHERE p.id = ?";
// Prepara a declaração
$stmt = mysqli_prepare($link, $sql);
// Verifica se a preparação foi bem-sucedida
if ($stmt === false) {
    die('Erro na preparação da consulta: ' . htmlspecialchars(mysqli_error($link)));
}
// Vincula os parâmetros
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
// Executa a consulta
mysqli_stmt_execute($stmt);
// Obtém o resultado
$resultado = mysqli_stmt_get_result($stmt);

$rs = mysqli_fetch_assoc($resultado);

if ($rs['tipo'] == "Inteiro") {
    $tipo = "unidade";
    $travarInteiro = 'onchange="this.value = parseInt(this.value);"';
    $placeholder = "0";
    $unidade = "unidades";
    $step = "1";

    echo "<style>#observacao {display: none};</style>";
} else if ($rs['tipo'] = "Decimal") {
    $tipo = "Kg";
    $travarInteiro = '';
    $placeholder = "0,0";
    $unidade = "Kg";
    $step = "0.1";
} else {
    $tipo = "Erro";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho Cortes</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="geral">
        <div id="topo">
            <?php
            include "topo.php";
            ?>
        </div>

        <div id="menu">
            <?php
            include "menu.php";
            ?>
        </div>

        <div id="conteudo">
            <!-- INÍCIO DO CONTEÚDO DA CARNE -->
            <div class="container">
                <div class="imagem">
                    <img src="<?php echo $rs['nomeImagem'] ?>" alt="foto produto" class="foto">
                </div>
                <div class="detalhes">
                    <form action="cadCarrinho.php" method="post">
                        <h2><?php echo $rs['nome'] ?></h2>
                        <p><?php echo $rs['descricao'] ?></p>
                        <p><strong>Preço por <?php echo $tipo ?>: R$<?php echo $rs['valor'] ?></strong></p>
                        <div class="quantidade">
                            <label for="quantidade">Quantidade</label>
                            <input required="number" name="quantidade" placeholder="<?php echo $placeholder ?>" step="<?php echo $step ?>" <?php echo $travarInteiro; ?>> 
                            <?php echo $unidade ?>

                        </div>
                        <div id="observacao">
                            <p><strong>observações:</strong></p>
                            <textarea rows="3" name="observacao" placeholder="(como cortar, embalagem, etc.)"></textarea>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="hidden" name="tipoQuantidadeId" value="<?php echo $rs['tqid'] ?>">

                        <div class="botoes">
                            <button class="btn adicionar" type="submit" name="acao" value="adicionar">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FIM DO CONTEÚDO DA CARNE -->
        </div>

        <div id="rodape">
            <?php
            include "rodape.php";
            ?>
        </div>
    </div>
</body>

</html>
