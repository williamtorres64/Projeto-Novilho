<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho Cortes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
   <div id="geral">
        <div id="topo">
            <?php
                include "topo.php";
            ?>
        </div>
       
        <div id="menu">
            <?php
                include "menu.php";
            ?>
        </div>
        
        <div id="conteudo">
            <!-- INÍCIO DO CONTEÚDO DA CARNE -->
            <div class="container">
                <div class="imagem">
                    <div class="foto">foto_carne</div>
                </div>
                <div class="detalhes">
                    <h2>nome_carne e corte</h2>
                    <p><strong>preço por quilo</strong></p>
                    <div class="quantidade">
                        <label for="quantidade">quantidade</label>
                        <input type="number" id="quantidade" value="1.5" step="0.1"> Kg
                    </div>
                    <p><strong>observações:</strong></p>
                    <textarea rows="3">Contra Filé cortado de 2 e 2 dedos para churrasco, embalar 1 a 1 a vacuo.</textarea>

                    <div class="botoes">
                        <button class="btn adicionar">Adicionar</button>
                        <button class="btn comprar">Comprar</button>
                    </div>
                </div>
            </div>

            <div class="rodape">
                <p>&lt;mais informações sobre a carne aqui&gt; O Bife de Contra Filé Swift é um corte macio Bife de Contra Filé e muito saboroso. Presente tanto em churrascos quanto nas preparações do dia a dia, vem cortado em bifes congelados individualmente em embalagem abre fácil. É ideal para fritar ou grelhar com muita praticidade e sem desperdício.</p>
            </div>
            <!-- FIM DO CONTEÚDO DA CARNE -->
        </div>
        
        <div id="rodape">
            <?php
                include "rodape.php";
            ?>
        </div>
    </div> 
</body>
</html>
