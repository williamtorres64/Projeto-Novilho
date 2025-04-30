


<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once("conexao.php");?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novilho (Login)</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="geral">
        <div id="topo"><?php include 'topo.php'?></div>
        <div id="menu"><?php include 'menu.php'?></div>
        <div id="conteudo" class="cad">
            <div class="box_form">
                
                <h1 class="titulos" style="font-size:40px">Login</h1>

                
                    <form action="login.php" method="post" enctype="multipart/form-data" class="form">
                        <input type="text" name="usuario" class="campos_cad" placeholder="usuario">
                        <input type="password" name="senha" class="campos_cad" placeholder="Senha">
                        <input type="submit" name="enviar" class="campos_cad">
                    </form>

            </div>
        </div>
        <div id="rodape"><?php include 'rodape.php'?></div>
    </div>
</body>

</html>
