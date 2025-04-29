<?php
session_start();
include_once("conexao.php");
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$sql = "SELECT `id`, `nome`, `sobrenome`, `usuario`, `senha`, `cep`, `endereco`, `telefone`, `status` FROM `cadastro` WHERE usuario = '$usuario' AND senha = '$senha'";
$resultado = mysqli_query($link, $sql);
if (mysqli_num_rows($resultado) > 0) {
    foreach ($resultado as $rs) {
        $_SESSION["id"] = $rs["id"];
        $_SESSION["nome"] = $rs["nome"];
        $_SESSION["senha"] = $rs["senha"];
        echo "Usuário encontrado! Fazendo login...";
        echo "<meta http-equiv='refresh' content='2; URL=\"index.php?login=ok\"' />";
        break;
    }
} else {
    echo "<script>alert('Usuario ou senha incorretos!');</script>";
    echo "<meta http-equiv='refresh' content='1; URL=\"form_login.php\"' />";
}
?>