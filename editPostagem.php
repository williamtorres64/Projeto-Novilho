<?php
// Inclui arquivo de conexão com o banco (seguro contra múltiplas inclusões)
include_once("conexao.php");

// Obtém ID da URL de forma segura (PHP 7+), padrão para string vazia se não existir
$id = $_GET["id"] ?? '';

// Se existir ID, busca os dados da postagem
if ($id) {
    // Prepara consulta SQL segura (evita SQL Injection)
    $sql = "SELECT id, titulo, imagem, chamada, dataDeCadastro, idUsuario, status 
            FROM postagens 
            WHERE id = ?";
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indica que $id é um inteiro
    $stmt->execute();
    
    // Obtém resultado e extrai dados
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc(); // Pega a primeira linha
    
    // Se encontrou dados, extrai para variáveis individuais
    if ($dados) {
        $titulo = $dados['titulo'];
        $imagem = $dados['imagem'];
        // ... (demais campos)
    }
} else {
    // Inicializa variáveis vazias para modo de criação (sem ID)
    $titulo = $imagem = $chamada = $dataDeCadastro = $idUsuario = $status = '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Metadados básicos para responsividade -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ? 'Editar' : 'Criar' ?> Postagem</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <!-- Estrutura principal do layout -->
    <div id="geral">
        <!-- Inclui cabeçalho, menu e rodapé -->
        <?php include 'topo.php'; ?>
        <?php include 'menu.php'; ?>
        
        <!-- Formulário principal -->
        <div id="conteudo">
            <form action="atualiza_postagem.php" method="post">
                <!-- Campo Título -->
                <label class="legenda">Título:</label>
                <input type="text" name="titulo" value="<?= htmlspecialchars($titulo) ?>" required>
                
                <!-- Campo Imagem (URL) -->
                <label class="legenda">Imagem:</label>
                <input type="text" name="imagem" value="<?= htmlspecialchars($imagem) ?>" required>
                
                <!-- Campo Data (formatada para input type="date") -->
                <label class="legenda">Data:</label>
                <input type="date" name="dataDeCadastro" 
                       value="<?= date('Y-m-d', strtotime($dataDeCadastro)) ?>" required>
                
                <!-- ID oculto para operações de atualização -->
                <input type="hidden" name="id" value="<?= $id ?>">
                
                <!-- Botão de submissão -->
                <input type="submit" value="<?= $id ? 'Atualizar' : 'Criar' ?>" class="bt_enviar">
            </form>
        </div>
        
        <?php include 'rodape.php'; ?>
    </div>
</body>
</html>