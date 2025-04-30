<?php
include_once("conexao.php");

$sql = "SELECT `id`, `titulo`, `imagem`, `chamada`, `dataDeCadastro`, `idUsuario`, `status` FROM
`postagens` WHERE 1";

$resultado = mysqli_query($link, $sql);
/* echo "<prev>";
var_dump($resultado);
echo "</prev>";
foreach ($resultado as $rs) {
    echo "<pre>";
    var_dump($rs);
    echo "</pre>";
    echo $rs['titulo'];
} */
?>

<?php

/*
echo '<div id="conteudo_principal">
    <h1 class="titulos">Postagens</h1>';

foreach ($resultado as $rs) {

    echo '<div class="postagens">
        <h1 class="titulos">' . $rs["titulo"] . '</h1>
        <img src="' . $rs['imagem'] . '" class="imagem" style="height:100px">
        <p class="paragrafo">' . $rs["chamada"] . '</p>
        <span class="data">' . date("d/m/Y h:m", strtotime($rs["dataDeCadastro"])) . '</span>
</div>';
}
?>
</div>
*/
?>
<section class="product">
    <h2 class="product-title">Picanha</h2>
    <div class="product-box">
      <div class="product-image">foto</div>
      <div class="product-description">
        <p>A picanha é um corte de carne bovina muito apreciado no Brasil, famoso por sua maciez e sabor marcante. Ela tem uma camada de gordura que, quando bem preparada, confere suculência e um sabor irresistível à carne.</p>
        <p>Os melhores pratos com picanha incluem:</p>
        <ul>
          <li>Churrasco de picanha: Grelhada na brasa, fatiada em pedaços grossos e temperada apenas com sal grosso.</li>
          <li>Picanha na manteiga: Selada na frigideira com alho e manteiga, ideal para um preparo rápido e delicioso.</li>
          <li>Picanha ao forno: Assada lentamente com ervas e acompanhada de batatas ou legumes.</li>
        </ul>
      </div>
      <button class="buy-button"><a href="adicionaProd.php">Comprar</a></button>
    </div>
  </section>

  <section class="product">
    <h2 class="product-title">Acém</h2>
    <div class="product-box">
      <div class="product-image">foto</div>
      <div class="product-description">
        <p>O acém é uma carne de fibras longas e com boa quantidade de colágeno, sendo ideal para preparos que exigem cozimento lento, como ensopados, carnes de panela, guisados e até hambúrgueres artesanais. Versátil e saborosa, quando bem preparada, o acém entrega uma textura macia e suculenta.</p>
        <li>Sugestão de pratos: Carne de panela (com batatas e cenoura);</li><li>Ensopado de acém (com legumes);</li> <li>Carne louca (desfiada para sanduíches);</li> <li>Picadinho de acém (com arroz e farofa).</li>
      </div>
      <button class="buy-button">Comprar</button>
    </div>
  </section>
  
  <section class="product">
    <h2 class="product-title">Asa de frango</h2>
    <div class="product-box">
      <div class="product-image">foto</div>
      <div class="product-description">
        <p>A asa de frango é a parte do frango composta por três partes: drumette, flat e ponta. É muito popular em petiscos e churrascos devido à sua carne saborosa e suculenta, especialmente quando assada ou frita.</p>
        <p>Sugestão de pratos: Asa de frango frita, Asa de frango assada com ervas, Asa de frango na air fryer.</p>
      </div>
      <button class="buy-button">Comprar</button>
    </div>
  </section>

  



