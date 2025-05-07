<?php
// Inicia a sessão para armazenar dados do usuário logado
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once("conexao.php"); // Usamos require_once para garantir que o arquivo existe

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: entrar.php");
    exit();
}

// Limpa e valida os dados de entrada
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = $_POST['senha'] ?? '';

// Prepara a consulta SQL segura usando prepared statements
$sql = "SELECT usuario.id, usuario.nome,`email`, `senha`, tu.nome as tipo FROM `usuario` inner join tipoUsuario tu on tu.id = usuario.tipoId WHERE email = ?";

// Prepara a declaração
$stmt = mysqli_prepare($link, $sql);

// Vincula os parâmetros
mysqli_stmt_bind_param($stmt, "s", $email);

// Executa a consulta
mysqli_stmt_execute($stmt);

// Obtém o resultado
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) === 1) {
    $usuario_data = mysqli_fetch_assoc($resultado);

    // Verifica a senha usando password_verify (para senhas armazenadas como hash)
    if ($senha == $usuario_data['senha']) {

        // Configura os dados da sessão (nunca armazene a senha na sessão)
        $_SESSION['usuario_id'] = $usuario_data['id'];
        $_SESSION['usuario_nome'] = $usuario_data['nome'];
        $_SESSION['usuario_email'] = $usuario_data['email'];
        $_SESSION['usuario_tipo'] = $usuario_data['tipo'];
        $_SESSION['logado'] = true;

        // Regenera o ID da sessão para prevenir fixation
        session_regenerate_id(true);

        // Redireciona para a área logada
        header("Location: index.php?login=sucesso");
        exit();

    } else {
        // Senha incorreta
        $_SESSION['erro_login'] = 'Usuário ou senha incorretos';
        echo "<script>alert('Usuario ou senha incorretos!');</script>";
        echo "<meta http-equiv='refresh' content='1; URL=\"entrar.php\"' />";
        exit();
    }
} else {
    // Usuário não encontrado
    $_SESSION['erro_login'] = 'Usuário não encontrado';
    echo "<script>alert('Usuario ou senha incorretos!');</script>";
        echo "<meta http-equiv='refresh' content='1; URL=\"entrar.php\"' />";
    exit();
}

// Fecha a declaração e a conexão
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
