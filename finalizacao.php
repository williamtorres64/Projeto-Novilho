<?php
include_once("conexao.php");
session_start();
if ($_SESSION['logado'] !== true) {
    header("Location: entrar.php");
    exit();
}
$id = $_SESSION['usuario_id'];

$sql = "select `cpf`, `nome`, `endereco`, `enderecoNumero`, `complemento`, `cep`, `email`, `senha`, `telefone` from usuario where id=?";
// Prepara a declaração
$stmt = mysqli_prepare($link, $sql);
// Verifica se a preparação foi bem-sucedida
if ($stmt === false) {
    die('Erro na preparação da consulta: ' . htmlspecialchars(mysqli_error($link)));
}
// Vincula os parâmetros
mysqli_stmt_bind_param($stmt, "i", $id);
// Executa a consulta
mysqli_stmt_execute($stmt);
// Obtém o resultado
$resultado = mysqli_stmt_get_result($stmt);

$rs = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR"> <!-- Idioma alterado para português -->

<head>
    <!-- Metadados essenciais -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho Cortes - Finalização</title>
    <link rel="stylesheet" href="estilo.css"> <!-- CSS principal -->
</head>

<body>
    <!-- Estrutura principal -->
    <div id="geral">
        <!-- Cabeçalho incluído via PHP -->
        <div id="topo">
            <?php include "topo.php"; ?>
        </div>


        <!-- Conteúdo principal centralizado -->
        <div id="conteudo"><br>
            <center>

                <!-- Seção de entrega -->
                <div class="entrega-container">
                    <h3>Informações de entrega</h3>
                    <div class="form-entrega">
                        <!-- Formulário de endereço -->
                        <label>Endereço:
                        <input type="text" name="endereco" class="input-grande" required disabled value="<?php echo $rs['endereco'] ?>">
                        </label>
                        <label>Nº
                            <input type="number" name="numero" class="input-pequeno" required disabled value="<?php echo $rs['enderecoNumero'] ?>">
                        </label>
                        <br><br>

                        <!-- Dados complementares -->
                        <label>CEP:
                            <input type="text" name="cep" class="input-medio" pattern="\d{5}-?\d{3}" disabled value="<?php echo $rs['cep'] ?>">
                        </label>
                        <label>Complemento:
                            <input type="text" name="complemento" class="input-medio" disabled value="<?php echo $rs['complemento'] ?>">
                        </label>
                        <br><br>

                        <!-- Seleção de data/horário -->
                        <!--<label>Data:</label>
                        <div class="calendario">calendário</div>

                        <label>Entregar até:
                            <input type="time" name="entregar_ate" class="input-pequeno">
                        </label>-->
                    </div>
                </div>

                <div class="pagamento-container">
                    <h3>Forma de Pagamento <span class="sub">(Pagamento na entrega)</span></h3>
                    <form action="finalizar.php" method="post">
                        <div class="botoes-pagamento">
                        <input type="radio" id="pix" name="pagamento" value="1" required>
                        <label for="pix" class="btn-laranja">Pix</label>

                        <input type="radio" id="dinheiro" name="pagamento" value="2">
                        <label for="dinheiro" class="btn-laranja">Dinheiro</label>

                        <input type="radio" id="debito" name="pagamento" value="3">
                        <label for="debito" class="btn-laranja">Débito</label>

                        <input type="radio" id="credito" name="pagamento" value="4">
                        <label for="credito" class="btn-laranja">Crédito</label>
                        </div>
                        <!-- Botões de ação -->
                        <div class="acoes-container">
                            <button class="btn-laranja" type="button" onclick="location.href = 'carrinho.php';">Cancelar</button>
                            <button class="btn-laranja" type="submit">Finalizar</button>
                        </div>
                    </form>
                </div>

            </center>
        </div>

        <!-- Rodapé incluído via PHP -->
        <div id="rodape">
            <?php include "rodape.php"; ?>
        </div>
    </div>
</body>

</html>
