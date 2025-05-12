<?php
include_once("conexao.php");
$id = $_POST['id'];

// Remove da sessão (carrinho)
if ($_POST['acao'] == 'deletarCarrinho') {
    echo "Item removido!";
    
// Remove postagem do banco
} elseif ($_POST['acao'] == 'deletarPostagem') {
    mysqli_query($link, "DELETE FROM produto WHERE id=" . $id);
    
// Remove do cadastro (se ID válido)
} else if ($id > 0) {
    mysqli_query($link, "DELETE FROM produto WHERE id=" . $id);
}

echo "sucesso";
?>
