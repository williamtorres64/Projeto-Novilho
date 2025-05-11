<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metadados básicos da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Painel)</title>
    <!-- Link para o arquivo CSS -->
    <link rel="stylesheet" href="estilo.css">
    <style>
        .painel-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            text-align: center;
        }

        .painel-container h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .painel-container .botao-painel {
            display: inline-block;
            margin: 10px;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .painel-container .botao-painel:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div id="geral">
        <div id="topo">
            <?php include 'topo.php'; ?>
        </div>

        <div id="conteudo">
            <div class="painel-container">
                <h1>Painel Administrativo</h1>
                <a href="regProduto.php" class="botao-painel">Cadastro de Produto</a>
                <a href="pedido.php" class="botao-painel">Tela de Pedidos</a>
            </div>
        </div>

        <div id="rodape">
            <?php include 'rodape.php'; ?>
        </div>
    </div>
</body>

</html>

