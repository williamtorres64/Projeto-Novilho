<?php
include_once("conexao.php");
session_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else if (isset($_SESSION['usuario_id'])) {
    $id = $_SESSION['usuario_id'];
} else {
    $id = '';
}

if ($id !== '') {
    $sql = "SELECT `id`, `cpf`, `nome`, `endereco`, `enderecoNumero`, `complemento`, `cep`, `email`, `senha`, `telefone`, `tipoId` 
            FROM `usuario` 
            WHERE `id` = '$id'";
    $resultado = mysqli_query($link, $sql);
    foreach ($resultado as $row) {
        $id = $row["id"];
        $cpf = $row["cpf"];
        $nome = $row["nome"];
        $senha = $row["senha"];
        $cep = $row["cep"];
        $endereco = $row["endereco"];
        $enderecoNumero = $row["enderecoNumero"];
        $complemento = $row["complemento"];
        $email = $row["email"];
        $telefone = $row["telefone"];
        $tipoId = $row["tipoId"];
    }
} else {
    $id = '';
    $cpf = '';
    $nome = '';
    $senha = '';
    $cep = '';
    $endereco = '';
    $enderecoNumero = '';
    $complemento = '';
    $email = '';
    $telefone = '';
    $tipoId = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Registro)</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div>
        <div id="topo">
            <?php
            include 'topo.php'
            ?>
        </div>
        <div id="menu">
            <?php
            include 'menu.php'
            ?>
        </div>

        <div class="box_form">
            <h1 class="titulos" style="font-size:40px">Registro</h1>
            <form action="atualiza_cliente.php" method="post" class="form">

                <label for="nome">Nome:</label>
                <input value="<?php echo $nome ?>" type="text" id="nome" name="nome" class="campos_cad" required>

                <label for="email">E-mail:</label>
                <input value="<?php echo $email ?>" type="email" id="email" name="email" class="campos_cad" required>

                <label for="senha">Senha:</label>
                <input value="<?php echo $senha ?>" type="text" id="senha" name="senha" class="campos_cad" required>

                <label for="cpf">CPF:</label>
                <input value="<?php echo $cpf ?>" type="text" id="cpf" name="cpf" class="campos_cad" required>

                <label for="cep">CEP:</label>
                <input value="<?php echo $cep ?>" type="text" id="cep" name="cep" class="campos_cad" required>

                <label for="endereco">Endereço:</label>
                <input value="<?php echo $endereco ?>" type="text" id="endereco" name="endereco" class="campos_cad" required>

                <label for="enderecoNumero">Número:</label>
                <input value="<?php echo $enderecoNumero ?>" type="text" id="enderecoNumero" name="enderecoNumero" class="campos_cad" required>

                <label for="complemento">Complemento:</label>
                <input value="<?php echo $complemento ?>" type="text" id="complemento" name="complemento" class="campos_cad">

                <label for="telefone">Telefone:</label>
                <input value="<?php echo $telefone ?>" type="text" id="telefone" name="telefone" class="campos_cad" required>

                <input type="hidden" name="tipoId" value="<?php echo ($tipoId !== '') ? $tipoId : '1'; ?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <input type="submit" class="campos_cad" value="<?php echo ($id != '') ? 'Atualizar' : 'Cadastrar'; ?>">
            </form>
        </div>
        <div id="rodape">
            <?php
            include 'rodape.php'
            ?>
        </div>
</body>

</html>

