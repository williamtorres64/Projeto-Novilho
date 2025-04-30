<?php
include_once("conexao.php");

$sql = "SELECT `id`, `titulo`, `imagem`, `chamada`, `dataDeCadastro`, `idUsuario`, `status` FROM `postagens` order by id";
$resultado = mysqli_query($link, $sql);
/* var_dump($resultado); */


$html = "<table border='1'><tr><td>ID</td><td>titulo</td><td>imagem</td><td>chamada</td><td>data de cadastro</td><td>id usuario</td><td>Status</td><td>Ação</td></tr>";
foreach ($resultado as $row) {
    /*  `id`, `titulo`, `imagem`, `chamada`, `dataDeCadastro`, `idUsuario` */
    $id = $row["id"];
    $titulo = $row["titulo"];
    $imagem = $row["imagem"];
    $chamada = $row["chamada"];
    $dataDeCadastro = $row["dataDeCadastro"];
    $idUsuario = $row["idUsuario"];
    $status = $row['status'];


    $html .= "<tr id='registro-$id'>
        <td>$id</td>
        <td>$titulo</td>
        <td>$imagem</td>
        <td>$chamada</td>
        <td>$dataDeCadastro</td>
        <td>$idUsuario</td>
        <td>$status</td>
        <td><a href='editarPostagem.php?id=$id'><img src='imagens/editar.png' style='width:20px'></a> / <button onclick='deletar(" . $id . ")'><img src='imagens/excluir.png' style='width:20px'></button></td>";
}

$html .= "</table>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Painel)</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="geral">
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
        <div id="conteudo" class="cad">
            <center>
                <h1 class="titulos" style="font-size:40px">Painel</h1><br>
                <div><a href="cadCliente.php" class="link_top1"><button>Cadastro Produto</button></a></div>
                <div><a href="cadPostagem.php" class="link_top1"><button>Tela de Pedidos</button></a></div>  
            </center>
        </div>
        <div id="rodape">
            <?php
            include 'rodape.php'
                ?>
        </div>
</body>

</html>