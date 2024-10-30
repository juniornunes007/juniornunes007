<?php
include ("conexao.php");

if(isset($_GET['cpf'])){
    $cpf = $_GET['cpf'];
    

    $sqlexcluir = "delete from tb_cliente where cpf = '$cpf'";
    if (mysqli_query($conexao, $sqlexcluir)) {
        echo "excluindo com sucesso";
    }else{
        echo "não excluido";
    }
    
    }
    ?>
