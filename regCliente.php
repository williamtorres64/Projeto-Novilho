<?php
include_once("conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if ($id != '') {
    $sql = "SELECT `id`, `nome`, `sobrenome`, `usuario`, `senha`, `cep`, `endereco`, `telefone`, `status` FROM `cadastro` WHERE id = '$id'";
    $resultado = mysqli_query($link, $sql);
    foreach ($resultado as $row) {
        $id = $row["id"];
        $nome = $row["nome"];
        $sobrenome = $row["sobrenome"];
        $usuario = $row["usuario"];
        $senha = $row["senha"];
        $cep = $row["cep"];
        $endereco = $row["endereco"];
        $telefone = $row["telefone"];
    }
} else {
    $id = '';
    $nome = '';
    $sobrenome = '';
    $usuario = '';
    $senha = '';
    $cep = '';
    $endereco = '';
    $telefone = '';
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
            

                <!-- `nome`, `sobrenome`, `usuario`, `senha`, `cep`, `endereço`, `telefone` -->

                <input value="<?php echo $nome ?>" type="text" name="nome" class="campos_cad"
                    placeholder="Nome" required>

                <input value="<?php echo $sobrenome ?>" type="text" name="sobrenome" class="campos_cad"
                    placeholder="Sobrenome" required>

                <input value="<?php echo $usuario ?>" type="text" name="usuario" class="campos_cad"
                    placeholder="Usuario" required>

                <input value="<?php echo $senha ?>" type="text" name="senha" class="campos_cad"
                    placeholder="Senha" required>

                <input value="<?php echo $cep ?>" type="text" name="cep" class="campos_cad"
                    placeholder="Cep" required>

                <input value="<?php echo $endereco ?>" type="text" name="endereco" class="campos_cad"
                    placeholder="Endereço" required>

                <input value="<?php echo $telefone ?>" type="text" name="telefone" class="campos_cad"
                    placeholder="Telefone" required>

                <input type="hidden" name="id" value="<?php echo $id ?>">



                <input type="submit" class="campos_cad" value="Enviar">
            </form>
        </div>
        <div id="rodape">
                <?php
                include 'rodape.php'
                ?>
        </div>
</body>

</html>