<?php
include_once("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$enderecoNumero = $_POST['enderecoNumero'];
$complemento = $_POST['complemento'];
$telefone = $_POST['telefone'];
$tipoId = (int)$_POST['tipoId']; // força conversão para inteiro

if ($id == '') {
    $sql = "INSERT INTO usuario (nome, email, senha, cpf, cep, endereco, enderecoNumero, complemento, telefone, tipoId) VALUES ('$nome', '$email', '$senha', '$cpf', '$cep', '$endereco', '$enderecoNumero', '$complemento', '$telefone', $tipoId)";
} else {
    $sql = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha', cpf='$cpf', cep='$cep', endereco='$endereco', enderecoNumero='$enderecoNumero', complemento='$complemento', telefone='$telefone', tipoId=$tipoId WHERE id='$id'";
}

if (mysqli_query($link, $sql)) {
    header("Location: cadCliente.php?id=" . ($id ?: mysqli_insert_id($link)));
} else {
    echo "Erro ao salvar os dados: " . mysqli_error($link);
}
?>

