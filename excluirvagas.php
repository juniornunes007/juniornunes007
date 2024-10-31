<?php
include ("conexao.php");

if(isset($_GET['id_vagas'])){
    $id_vagas= $_GET['id_vagas'];
    

    $sqlexcluir = "delete from tb_vagas where id_vagas = '$id_vagas'";
    if (mysqli_query($conexao, $sqlexcluir)) {
        echo "excluindo com sucesso";
    }else{
        echo "não excluido";
    }
    
    }
    ?>