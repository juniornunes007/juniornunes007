<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta </title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #F5DEB3;
    color: #4B3621;
    text-align: center;
 }
 div{
    padding: 5px;
    font-size: 15px;

 }


    </style>
</head>
<body>
    <h1> consuta</h1>
    <form action="" method="post">
        <label for="nome">nome</label>
        <input type="text" id="nome" name="nome">
        <input type="submit" value="buscar">
    </form>
</body>
</html>


<?php
session_start();
include("conexao.php");
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['nome'];
 
    // Consulta os dados na tabela 'tb_cliente' com base no nome
    $sqlConsulta = "SELECT * FROM tb_vagas WHERE titulo LIKE '%$nome%'";
    $resultadoConsulta = mysqli_query($conexao, $sqlConsulta);
 
    // Verifica se há resultados
    if (mysqli_num_rows($resultadoConsulta) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>titulo</th>
                    <th>descricao</th>
                    <th>salario</th>
                    <th>localizacao</th>
                    <th>data_publicasao</th>
                    <th>status_vaga</th>
              
                </tr>";
 
        // Exibe os resultados
        while ($row = mysqli_fetch_assoc($resultadoConsulta)) {
            $id_vagas = $row['id_vagas'];
            echo "<tr>
                    <td>{$row['titulo']}</td>
                    <td>{$row['descricao']}</td>
                    <td>{$row['salario']}</td>
                    <td>{$row['localizacao']}</td>
                    <td>{$row['data_publicasao']}</td>
                    <td>{$row['status_vaga']}</td>
        
                    <td>
                    <a href='editar_vagas.php?id_vagas=$id_vagas'>editar</a>
                    <a href='excluirvagas.php?id_vagas=$id_vagas' >excluir</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Sem clientes no registro.";
    }
}
?>