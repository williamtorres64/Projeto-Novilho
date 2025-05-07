<?php
session_start();
// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

if ($_SESSION['logado'] !== true){
    header("Location: entrar.php");
    exit();
}
// Monta a instrução SQL para selecionar os dados da tabela 'produto', ordenando por ID
$sql = "
    SELECT prod.id, prod.nome, prod.nomeImagem, prod.descricao, prod.valor
    FROM produto prod
    INNER JOIN categoria cat ON cat.id = prod.categoriaId
    ORDER BY prod.id
";

// Executa a consulta e guarda o resultado em $resultado
$resultado = mysqli_query($link, $sql);

// Gera o HTML inicial com botão de novo registro
$html = "<center><div style='padding-top: 15px;'>
    <a href=\"cadProduto.php\" style='background: blue; color: white; padding: 10px; border-radius: 19px; text-transform: uppercase;'>
        Novo Produto
    </a>
</div></center><br>";

// Cabeçalho da tabela
$html .= "
<table border='1'>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Imagem</td>
        <td>Descrição</td>
        <td>Valor</td>
        <td>Ação</td>
    </tr>
";

// Monta cada linha da tabela a partir dos produtos
foreach ($resultado as $row) {
    $id          = $row["id"];
    $nome        = htmlspecialchars($row["nome"]);
    $nomeImagem  = htmlspecialchars($row["nomeImagem"]);
    $descricao   = htmlspecialchars($row["descricao"]);
    $valor       = number_format($row["valor"], 2, ',', '.');

    $html .= "
    <tr id='registro-$id'>
        <td>$id</td>
        <td>$nome</td>
        <td>
            <img src='$nomeImagem' alt='$nome' style='height:50px'>
        </td>
        <td>$descricao</td>
        <td>R\$ $valor</td>
        <td>
            <a href='cadProduto.php?id=$id'>
                <img src='imagens/editar.png' style='width:20px'>
            </a>
            /
            <button onclick='deletar($id)'>
                <img src='imagens/excluir.png' style='width:20px'>
            </button>
        </td>
    </tr>
    ";
}

// Fecha a tabela
$html .= "</table>";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Produtos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="geral">
        <div id="topo">
            <?php include 'topo.php'; ?>
        </div>
        <div id="conteudo" class="cad"><br>
            <center><h1>Produtos Registrados</h1></center>
            <div id="cadastro">
                <script>
                    function deletar(id) {
                        fetch("deletar.php", {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'id=' + encodeURIComponent(id) + '&acao=deletarProduto'
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() === "sucesso") {
                                alert("Produto deletado com sucesso!");
                                document.getElementById("registro-" + id).remove();
                            } else {
                                alert("Erro ao deletar produto:\n" + data);
                            }
                        })
                        .catch(error => {
                            alert("Erro:\n" + error);
                        });
                    }
                </script>

                <!-- Insere na tela o HTML gerado -->
                <?php echo $html; ?>
            </div>
        </div>
        <div id="rodape">
            <?php include 'rodape.php'; ?>
        </div>
    </div>
</body>
</html>
