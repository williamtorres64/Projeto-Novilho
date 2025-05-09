<?php
include_once("conexao.php"); // Inclui o arquivo de conexão com o banco de dados

// Lógica para atualizar o status do pedido
if (isset($_GET['acao']) && $_GET['acao'] === 'mudar_status' && isset($_GET['id_pedido']) && isset($_GET['novo_status'])) {
    $pedidoIdParaAtualizar = (int) $_GET['id_pedido'];
    $novoStatusNome = $_GET['novo_status']; // Nome do novo status (ex: "Concluído")

    // Lista de status permitidos para validação
    $statusPermitidos = ['Pendente', 'Concluído', 'Em Preparo', 'Enviado', 'Cancelado'];

    if (in_array($novoStatusNome, $statusPermitidos)) {
        // Busca o ID do status pelo nome para atualizar a tabela 'compra'
        $stmt_status_id = $link->prepare("SELECT id FROM status WHERE nome = ?");
        if ($stmt_status_id) {
            $stmt_status_id->bind_param("s", $novoStatusNome);
            $stmt_status_id->execute();
            $result_status_id = $stmt_status_id->get_result();

            if ($status_row = $result_status_id->fetch_assoc()) {
                $novoStatusIdParaAtualizar = $status_row['id'];

                // Prepara e executa a atualização do statusId na tabela 'compra'
                $stmt_update = $link->prepare("UPDATE compra SET statusId = ? WHERE id = ?");
                if ($stmt_update) {
                    $stmt_update->bind_param("ii", $novoStatusIdParaAtualizar, $pedidoIdParaAtualizar);
                    $stmt_update->execute();
                    $stmt_update->close();
                    // Redireciona para a página de pedidos para limpar os parâmetros GET e evitar reenvio do formulário
                    header("Location: pedido.php");
                    exit();
                } else {
                    echo "Erro ao preparar a atualização de status: " . htmlspecialchars($link->error);
                }
            } else {
                echo "Nome do status '" . htmlspecialchars($novoStatusNome) . "' não encontrado no banco de dados.";
            }
            $stmt_status_id->close();
        } else {
            echo "Erro ao preparar a busca pelo ID do status: " . htmlspecialchars($link->error);
        }
    } else {
        echo "Status inválido fornecido: " . htmlspecialchars($novoStatusNome);
    }
}

// Consulta SQL para buscar os pedidos e informações relacionadas
$sql_pedidos = "SELECT 
                    c.id AS pedidoId, 
                    u.nome AS clienteNome, 
                    c.data AS dataPedido, 
                    u.endereco AS enderecoEntrega, 
                    fp.nome AS formaPagamentoNome,
                    s.nome AS statusPedidoNome
                FROM compra c
                JOIN usuario u ON c.usuarioId = u.id
                JOIN formaPagamento fp ON c.formaPagamentoId = fp.id
                JOIN status s ON c.statusId = s.id
                ORDER BY c.id DESC, c.id DESC";

$resultado_pedidos = mysqli_query($link, $sql_pedidos);

if (!$resultado_pedidos) {
    echo "Erro ao buscar pedidos: " . htmlspecialchars(mysqli_error($link));
}
?>

<?php if ($resultado_pedidos && mysqli_num_rows($resultado_pedidos) > 0): ?>
    <?php while ($pedido = mysqli_fetch_assoc($resultado_pedidos)): ?>
        <?php
        $statusAtual = htmlspecialchars($pedido['statusPedidoNome']);
        $proximoStatusNomeParaFormulario = ($statusAtual === 'Pendente') ? 'Concluído' : 'Pendente';
        ?>
<div class="pedido-card">
            <div class="pedido-header">
                <span>Pedido (<?= htmlspecialchars($pedido['pedidoId']) ?>)</span>
                <span><?= htmlspecialchars($pedido['clienteNome']) ?></span>
                </div>
            <div class="pedido-info">
                <p>Data: <?= htmlspecialchars(date("d/m/Y", strtotime($pedido['dataPedido']))) ?></p>
                <p>Endereço: <?= htmlspecialchars($pedido['enderecoEntrega']) ?></p>
                <p>Forma de Pagamento: <?= htmlspecialchars($pedido['formaPagamentoNome']) ?></p>
                </div>
            <div class="pedido-footer">
                <form method="GET" action="pedido.php">
                    <input type="hidden" name="acao" value="mudar_status">
                    <input type="hidden" name="id_pedido" value="<?= htmlspecialchars($pedido['pedidoId']) ?>">
                    <input type="hidden" name="novo_status" value="<?= $proximoStatusNomeParaFormulario ?>">
                    <button type="submit" class="status-button"><?= $statusAtual ?></button>
                </form>
                <div class="print-icon">
                    <a href="imprimir_pedido.php?pedidoId=<?= htmlspecialchars($pedido['pedidoId']) ?>" target="_blank">
                        <img src="imagens/printer-icon.png" alt="Imprimir" width="40" height="40">
                    </a>
                    </div>
                    </div>
        </div>
    <?php endwhile; ?>
    <?php else: ?>
    <p>Nenhum pedido encontrado.</p>
    <?php endif; ?>