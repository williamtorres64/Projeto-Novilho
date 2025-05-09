<?php
// Inclui o arquivo de conexão com o banco de dados
include_once("conexao.php");

// Verifica se existe um ID na URL (para edição de registro)
if (isset($_GET["id"])) {
    $id = $_GET["id"]; // Pega o ID da URL
} else {
    $id = ""; // Se não tiver ID, deixa vazio (modo de cadastro novo)
}

// Se tiver ID, busca os dados do cliente no banco
if ($id != '') {
    // Consulta SQL para pegar os dados do cliente (CUIDADO: vulnerável a SQL Injection)
    $sql = "SELECT id, nome, sobrenome, usuario, senha, cep, endereco, enderecoNumero, telefone, status 
            FROM cadastro 
            WHERE id = '$id'";
    
    $resultado = mysqli_query($link, $sql);
    
    // Extrai os dados do resultado da consulta
    foreach ($resultado as $row) {
        $id = $row["id"];
        $nome = $row["nome"];
        $sobrenome = $row["sobrenome"];
        $usuario = $row["usuario"];
        $senha = $row["senha"]; // ATENÇÃO: Senha em texto puro (inseguro)
        $cep = $row["cep"];
        $endereco = $row["endereco"];
        $enderecoNumero = $row["enderecoNumero"];
        $telefone = $row["telefone"];
    }
} else {
    // Se não tiver ID, inicializa todas as variáveis vazias (modo de cadastro)
    $nome = $sobrenome = $usuario = $senha = $cep = $endereco = $telefone = $enderecoNumero = '';
}
?>
<!DOCTYPE html>
<html lang="pt-BR"> <!-- Idioma alterado para português do Brasil -->
<head>
    <!-- Configurações básicas da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Cadastro)</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Arquivo de estilos CSS -->
</head>

<body>
    <!-- Estrutura principal da página -->
    <div>
        <!-- Cabeçalho incluído de arquivo externo -->
        <div id="topo">
            <?php include 'topo.php'; ?>
        </div>
        
        <!-- Formulário de cadastro/edição -->
        <div class="box_form">
            <h1 class="titulos" style="font-size:40px">Cadastrar Cliente</h1>
            
            <!-- Formulário que envia dados para atualiza_cliente.php -->
            <form action="atualiza_cliente.php" method="post" class="form">
                
                <!-- Campos do formulário pré-preenchidos quando em modo de edição -->
                <input value="<?php echo htmlspecialchars($nome); ?>" type="text" name="nome" class="campos_cad" placeholder="Nome" required>

                <input value="<?php echo htmlspecialchars($sobrenome); ?>" type="text" name="sobrenome" class="campos_cad" placeholder="Sobrenome" required>

                <input value="<?php echo htmlspecialchars($usuario); ?>" type="text" name="usuario" class="campos_cad" placeholder="Usuário" required>

                <input value="<?php echo htmlspecialchars($senha); ?>" type="password" name="senha" class="campos_cad" placeholder="Senha" required> <!-- Alterado para type="password" -->

                <input value="<?php echo htmlspecialchars($cep); ?>" type="text" name="cep" class="campos_cad" placeholder="CEP" required>

                <input value="<?php echo htmlspecialchars($endereco); ?>" type="text" name="endereco" class="campos_cad" placeholder="Endereço" required>

                <input value="<?php echo htmlspecialchars($enderecoNumero); ?>" type="text" name="enderecoNumero" class="campos_cad" placeholder="Número" required>

                <input value="<?php echo htmlspecialchars($telefone); ?>" type="tel" name="telefone" class="campos_cad" placeholder="Telefone" required> <!-- Alterado para type="tel" -->

                <!-- Campo oculto para enviar o ID quando for edição -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <!-- Botão de envio do formulário -->
                <input type="submit" class="campos_cad" value="<?php echo ($id != '') ? 'Atualizar' : 'Cadastrar'; ?>">
            </form>
        </div>
        
        <!-- Rodapé incluído de arquivo externo -->
        <div id="rodape">
            <?php include 'rodape.php'; ?>
        </div>
</body>
</html>
