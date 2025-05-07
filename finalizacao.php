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
        <div id="conteudo"><br><center>
        
        <!-- Seção de entrega -->
        <div class="entrega-container">
            <h3>Informações de entrega</h3>
            <div class="form-entrega">
                <!-- Formulário de endereço -->
                <label>Endereço:
                    <input type="text" name="endereco" class="input-grande" required>
                </label>
                <label>Nº
                    <input type="number" name="numero" class="input-pequeno" required>
                </label>
                <br><br>
                
                <!-- Dados complementares -->
                <label>CEP:
                    <input type="text" name="cep" class="input-medio" pattern="\d{5}-?\d{3}">
                </label>
                <label>Complemento:
                    <input type="text" name="complemento" class="input-medio">
                </label>
                <br><br>
                
                <!-- Seleção de data/horário -->
                <label>Data:</label>
                <div class="calendario">calendário</div> <!-- Deveria ser um input type="date" -->

                <label>Entregar até:
                    <input type="time" name="entregar_ate" class="input-pequeno">
                </label>
            </div>
        </div>

        <!-- Seção de pagamento -->
        <div class="pagamento-container">
            <h3>Formas de Pagamento <span class="sub">(Pagamento na entrega)</span></h3>
            <div class="botoes-pagamento">
                <!-- Botões deveriam ser type="button" para evitar submit acidental -->
                <button class="btn-laranja" type="button">Pix</button>
                <button class="btn-laranja" type="button">Dinheiro</button>
                <button class="btn-laranja" type="button">Débito</button>
                <button class="btn-laranja" type="button">Crédito</button>
            </div>
        </div>

        <!-- Botões de ação -->
        <div class="acoes-container">
            <button class="btn-laranja cancelar" type="button">Cancelar</button>
            <button class="btn-laranja finalizar" type="submit">Finalizar</button>
        </div>

        </center></div>
        
        <!-- Rodapé incluído via PHP -->
        <div id="rodape">
            <?php include "rodape.php"; ?>
        </div>
    </div> 
</body>
</html>