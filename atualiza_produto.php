<?php
// Database linkection details (replace with your actual credentials)
include_once("conexao.php");
// Create linkection

// Check linkection

// Get data from the form
$id = $_POST['id'];
$nome = $_POST['nome'];
$nomeImagem = $_POST['nomeImagem'];
$descricao = $_POST['descricao'];
$categoriaId = $_POST['categoria'];
$valor = $_POST['valor'];
$tipoId = $_POST['tipoQuantidade'];



// Prepare data for SQL (to prevent SQL injection)
$nome = $link->real_escape_string($nome);
$nomeImagem = $link->real_escape_string($nomeImagem);
$descricao = $link->real_escape_string($descricao);
$categoriaId = (int)$categoriaId; // Ensure it's an integer
$valor = (float)$valor;           // Ensure it's a float
$tipoId = (int)$tipoId;

if (!empty($id)) {
    // UPDATE existing product
    $sql = "UPDATE produto SET 
                nome = '$nome', 
                nomeImagem = '$nomeImagem', 
                descricao = '$descricao', 
                categoriaId = $categoriaId, 
                valor = $valor,
                tipoQuantidadeId = $tipoId
            WHERE id = " . (int)$id; // Cast id to int for security

    if ($link->query($sql) === TRUE) {
        $message = "Produto atualizado com sucesso!";
        // Optionally redirect to a product list page or the product page
        // header("Location: listaProdutos.php"); // Example redirect
    } else {
        $message = "Erro ao atualizar produto: " . $link->error;
    }
} else {
    // INSERT new product
    $sql = "INSERT INTO produto (nome, nomeImagem, descricao, categoriaId, valor, tipoQuantidadeId) 
            VALUES ('$nome', '$nomeImagem', '$descricao', $categoriaId, $valor, $tipoId)";

    if ($link->query($sql) === TRUE) {
        $newId = $link->insert_id; // Get the ID of the newly inserted product
        $message = "Novo produto cadastrado com sucesso! ID: " . $newId;
        // Optionally redirect to the new product's page or a success page
        // header("Location: verProduto.php?id=" . $newId); // Example redirect
    } else {
        $message = "Erro ao cadastrar novo produto: " . $link->error;
    }
}

$link->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Produto</title>
    <link rel="stylesheet" href="style.css"> <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .status-message {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .status-message h1 {
            color: #333;
        }
        .status-message p {
            color: #555;
        }
        .btn-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-link:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="status-message">
        <h1>Status da Operação</h1>
        <p><?php echo $message; ?></p>
        <?php if (strpos($message, "Erro") !== false): ?>
            <p class="error">Por favor, corrija os erros e tente novamente.</p>
        <?php endif; ?>
        <a href="cadProduto.php<?php if (!empty($id) && strpos($message, "Erro") !== false) echo '?id=' . htmlspecialchars($id); ?>" class="btn-link">
            <?php echo (!empty($id) && strpos($message, "Erro") !== false) ? 'Voltar para Edição' : 'Cadastrar Novo Produto'; ?>
        </a>
        <a href="index.php" class="btn-link">Página Inicial</a> </div>

    <div id="rodape">
        <?php include 'rodape.php'; // Include your footer if it exists ?>
    </div>
</body>
</html>