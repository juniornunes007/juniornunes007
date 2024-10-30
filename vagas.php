<?php
session_start();
include("conexao.php");
//entrada de dados vindos do HTML
$titulo = $_POST['titulo'];
$Descricao = $_POST['Descricao'];
$salario = $_POST['salario'];
$localizacao = $_POST['localizacao'];
$data_publicasao = $_POST['data_publicasao'];
$status_vaga = $_POST['status_vaga'];

 
//verifica se algum dado nao foi informado
if (
    empty($titulo) || empty($Descricao) || empty($salario) ||
    empty($localizacao) || empty($data_publicasao) ||
    empty($status_vaga)){
        echo " É necessário informar todos os campos";
        exit;
    }
  
    $resultSqlCliente =
     " insert into tb_vagas( titulo, Descricao, salario,
    localizacao, data_publicasao, status_vaga)
    values ('$titulo', '$Descricao', '$salario', '$localizacao',
    '$data_publicasao', '$status_vaga')";
 
   
    $resultadoCliente = mysqli_query($conexao, $resultSqlCliente);
 
    if (mysqli_insert_id($conexao)){
        $_SESSION['msg'] = "<p> Cliente Cadastrado com Sucesso</p>";
    }
    else{
        $_SESSION['msg'] = "<p> Cliente não Cadastrado</p>";
     
    }
    ?>