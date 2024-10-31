<?php
include("conexao.php");
 
if (isset($_GET['id_vagas'])) {
    $id_vagas = $_GET['id_vagas'];
 
    // Buscar os dados do cliente pelo CPF
    $sqlBusca = "SELECT * FROM tb_vagas WHERE id_vagas = '$id_vagas'";
    $resultadoBusca = mysqli_query($conexao, $sqlBusca);
    $cliente = mysqli_fetch_assoc($resultadoBusca);
 
    // Verifica se o cliente existe
    if (!$cliente) {
        echo "Cliente não encontrado!";
        exit;
    }
 
    // Preenche as variáveis com os dados do cliente para exibir no formulário
    $titulo = $cliente['titulo'];
    $descricao = $cliente['descricao'];
    $salario = $cliente['salario'];
    $localizacao = $cliente['localizacao'];
    $data_publicasao = $cliente['data_publicasao'];
    $status_vaga = $cliente['status_vaga'];
 
}
 
// Atualiza o cliente se o formulário for enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $salario = $_POST['salario'];
    $localizacao = $_POST['localizacao'];
    $data_publicasao = $_POST['data_publicasao'];
    $status_vaga = $_POST['status_vaga'];
    

    $sqlUpdate = "UPDATE tb_vagas SET titulo = '$titulo',  descricao = '$descricao',salario = '$salario',localizacao = '$localizacao',data_publicasao = '$data_publicasao',status_vaga = '$status_vaga' WHERE id_vagas = '$id_vagas'";
 
    if (mysqli_query($conexao, $sqlUpdate)) {
        echo "Cliente alterado com sucesso";
    } else {
        echo "Erro ao atualizar!";
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Editar</h1>
    <form action="" method="post">
        <div>
            <label for="titulo">titulo:
                <input type="text" id="titulo" name="titulo"  value="<?php echo $titulo; ?>" >
            </label>
        </div>
        <div>
        <label for="Descricao"> Descrição:
            <input type="text" id="descricao" name="descricao"  value="<?php echo $descricao; ?>" >
        </label>
    </div>
    <div>
        <label for="salario"> salario
            <input type="number" id="salario" name="salario"  value="<?php echo $salario; ?>" >
        </label>
    </div>
    <div>
        <label for="localizacao">Localização
            <input type="text" id="localizacao" name="localizacao"  value="<?php echo $localizacao; ?>" >
        </label>
    </div>
    <div>
        <label for="data_publicasao">Data da publicasão 
            <input type="date" id="data_publicasao" name="data_publicasao"  value="<?php echo $data_publicasao; ?>" >
        </label>
    </div>
    <div>
        <label for="status_vaga">status
            <input type="text" id="status_vaga" name="status_vaga"  value="<?php echo $status_vaga; ?>" >
        </label>
    </div>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>