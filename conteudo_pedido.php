<?php
// DADOS FIXOS (simulação - normalmente viriam do banco de dados)
$pedidoId = 789;               // Número do pedido
$clienteNome = "ClienteNome";  // Nome do cliente
$data = "01/10/2025";          // Data do pedido
$hora = "15:50";               // Horário do pedido
$endereco = "Rua Almôndegas";  // Endereço de entrega
$cobranca = "Cartão débito";   // Forma de pagamento

// LÓGICA DE STATUS:
// Verifica se existe parâmetro 'status' na URL e alterna entre 'Concluído' e 'Pendente'
$status = isset($_GET['status']) && $_GET['status'] === 'Concluído' ? 'Concluído' : 'Pendente';
$novoStatus = $status === 'Pendente' ? 'Concluído' : 'Pendente'; // Estado oposto para alternar
?>

<!-- INÍCIO DO CARTÃO DE PEDIDO -->
<div class="pedido-card">

    <!-- CABEÇALHO: Mostra número do pedido e nome do cliente -->
    <div class="pedido-header">
        <span>pedido (<?= $pedidoId ?>)</span> <!-- Número do pedido -->
        <span><?= htmlspecialchars($clienteNome) ?></span> <!-- Nome (protegido contra XSS) -->
    </div>

    <!-- INFORMAÇÕES: Detalhes do pedido -->
    <div class="pedido-info">
        <p>Data/Hora: <?= $data ?> &nbsp; até <?= $hora ?></p> <!-- Data e hora -->
        <p>End.: <?= htmlspecialchars($endereco) ?></p> <!-- Endereço (protegido) -->
        <p>Cobrança: <?= htmlspecialchars($cobranca) ?></p> <!-- Forma de pagamento -->
    </div>

    <!-- RODAPÉ: Ações do pedido -->
    <div class="pedido-footer">
        <!-- FORMULÁRIO PARA ALTERAR STATUS -->
        <form method="GET">
            <!-- Campo oculto que envia o novo status quando clicado -->
            <input type="hidden" name="status" value="<?= $novoStatus ?>">
            <!-- Botão que mostra o status atual e alterna quando clicado -->
            <button type="submit" class="status-button"><?= $status ?></button>
        </form>
        
        <!-- ÍCONE DE IMPRESSÃO (ação não implementada) -->
        <div class="print-icon">
            <img src="printer-icon.png" alt="Imprimir" width="40" height="40">
        </div>
    </div>

</div>