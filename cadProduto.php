<?php
// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

// Verifica se existe um ID na URL (para edição)
if (isset($_GET["id"]) && $_GET["id"] !== '') {
    $id = $_GET["id"];
} else {
    $id = ""; // modo de cadastro novo
}

if ($id !== '') {
    $sql = "
        SELECT id, nome, nomeImagem, descricao, valor
        FROM produto
        WHERE id = '" . mysqli_real_escape_string($link, $id) . "'
    ";
    $resultado = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_assoc($resultado)) {
        $nome = $row["nome"];
        $nomeImagem = $row["nomeImagem"];
        $descricao = $row["descricao"];
        $valor = $row["valor"];
    } else {
        // se não encontrar, volta para listagem ou inicializa vazio
        $id = "";
        $nome = $nomeImagem = $descricao = $valor = '';
    }
} else {
    // modo de cadastro novo
    $nome = $nomeImagem = $descricao = $valor = '';
}


$sql = "
    SELECT id, nome
    FROM categoria
    ORDER BY nome;";
$resultado = mysqli_query($link, $sql);
if ($resultado) {
    $categorias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
} else {
    $categorias = [];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($id !== '') ? 'Editar Produto' : 'Novo Produto'; ?></title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="geral">
        <div id="topo">
            <?php include 'topo.php'; ?>
        </div>

        <div id="conteudo"><br>
            <center>
                <h1 class="titulos" style="font-size:31px">
                    <?php echo ($id !== '') ? 'Editar Produto' : 'Cadastrar Novo Produto'; ?>
                </h1>
            </center>
            <form action="atualiza_produto.php" method="post">
                <!-- Campo Nome -->
                <label class="legenda">Nome:</label><br>
                <input type="text" name="nome" class="campos" value="<?php echo htmlspecialchars($nome); ?>"
                    placeholder="Preencha o nome do produto" required><br>

                <!-- Campo Imagem -->
                <label class="legenda">Caminho da Imagem:</label><br>
                <input type="text" name="nomeImagem" class="campos" value="<?php echo htmlspecialchars($nomeImagem); ?>"
                    placeholder="Preencha o caminho da imagem" required><br>

                <!-- Campo Descrição -->
                <label class="legenda">Descrição:</label><br>
                <textarea name="descricao" class="campos" rows="4" placeholder="Descreva o produto"
                    required><?php echo htmlspecialchars($descricao); ?></textarea><br>

                <!-- Campo Categoria-->
                <label class="legenda">Categoria:</label><br>
                <select name="categoria" class="campos" required>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo htmlspecialchars($categoria['id']); ?>"
                            <?php if ($id !== '' && $row['categoriaId'] == $categoria['id']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($categoria['nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>         
                
                <!-- Campo Tipo quantidade-->
                <label class="legenda">Produto unitário ou decimal:</label><br>
                <select name="tipoQuantidade" class="campos" required>
                    
                        <option value="1">Unitário</option>
                        <option value="2">Decimal</option>

         
                    
                </select><br><br>    


                <!-- Campo Valor -->
                <label class="legenda">Valor:</label><br>
                <input type="number" name="valor" class="campos" step="0.01"
                    value="<?php echo htmlspecialchars($valor); ?>" placeholder="0.00" required><br><br>

                <!-- Campo oculto para enviar o ID em edição -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <!-- Botão de envio -->
                <input type="submit" value="<?php echo ($id !== '') ? 'Atualizar Produto' : 'Cadastrar Produto'; ?>"
                    class="bt_enviar">
            </form>
        </div>

        <div id="rodape">
            <?php include 'rodape.php'; ?>
        </div>
    </div>
</body>

</html>
