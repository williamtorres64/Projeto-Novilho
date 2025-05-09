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
// TODO: gerar atualiza_cliente com copilot
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
<!-- TODO: refazer estrutura do formulario com copilot para mostar label ao inves de placeholder -->

                <input value="<?php echo $nome ?>" type="text" name="nome" class="campos_cad"
                    placeholder="Nome" required>

                <input value="<?php echo $email ?>" type="email" name="email" class="campos_cad"
                    placeholder="E-mail" required>

                <input value="<?php echo $senha ?>" type="text" name="senha" class="campos_cad"
                    placeholder="Senha" required>

                <input value="<?php echo $cpf ?>" type="text" name="cpf" class="campos_cad"
                    placeholder="CPF" required>

                <input value="<?php echo $cep ?>" type="text" name="cep" class="campos_cad"
                    placeholder="CEP" required>

                <input value="<?php echo $endereco ?>" type="text" name="endereco" class="campos_cad"
                    placeholder="Endereço" required>

                <input value="<?php echo $enderecoNumero ?>" type="text" name="enderecoNumero" class="campos_cad"
                    placeholder="Número" required>

                <input value="<?php echo $complemento ?>" type="text" name="complemento" class="campos_cad"
                    placeholder="Complemento">

                <input value="<?php echo $telefone ?>" type="text" name="telefone" class="campos_cad"
                    placeholder="Telefone" required>

                <input value="<?php echo $tipoId ?>" type="hidden" name="tipoId" class="campos_cad"
                    placeholder="Tipo ID" required value="1">

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
