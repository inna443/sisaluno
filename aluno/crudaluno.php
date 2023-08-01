<?php
## permite acesso às variáveis dentro do arquivo conexao
require_once('conexao.php');

## cadastrar
if (isset($_GET['entrar'])) {
    $nome = $_GET["nome"] ?? '';
    $idade = $_GET["idade"] ?? '';
    $datanascimento = $_GET["datanascimento"] ?? '';
    $endereco = $_GET["endereco"] ?? '';
    $estatus = $_GET["estatus"] ?? '';


    
    

    // Aqui você pode adicionar validações e sanitizações dos dados, por exemplo:
     // Verifica se todos os campos foram preenchidos
     if (empty($nome) || empty($idade) || empty($datanascimento)|| empty($endereco)|| empty($estatus)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Validar a idade como número inteiro positivo e dentro da faixa aceitável (6 a 120 anos)
    if (!is_numeric($idade) || intval($idade) <= 0 || intval($idade) > 120) {
        echo "Idade inválida. A idade deve ser um número inteiro positivo entre 6 e 120 anos.";
        exit;
    }

    // Inserir os dados no banco de dados
    
    // $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "INSERT INTO aluno (nome, idade, datanascimento, endereco, estatus) 
            VALUES (:nome, :idade, :datanascimento, :endereco, :estatus)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    

    
    if ($stmt->execute()) {
        header("Location: listaaluno.php");
    } else {
        echo "Erro ao cadastrar o aluno.";
    }
}

## alterar
if (isset($_POST['update'])) {
    $id = $_POST["id"] ?? '';
    $nome = $_POST["nome"] ?? '';
    $idade = $_POST["idade"] ?? '';
    $datanascimento = $_POST["datanascimento"] ?? '';
    $endereco = $_POST["endereco"] ?? '';
    $estatus = $_POST["estatus"] ?? '';


    
    // Aqui você pode adicionar validações e sanitizações dos dados, se necessário

    $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    if ($stmt->execute()) {
        echo "<strong>OK!</strong> O aluno $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='index.php'>Voltar</a></button>";
    } else {
        echo "Erro ao atualizar o aluno.";
    }
}

## excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'] ?? '';
    $sql = "DELETE FROM aluno WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: listaaluno.php");
}
?>
<?php
##permite acesso as variáveis dentro do arquivo conexao
require_once('conexao.php');

##cadastrar
if (isset($_GET['entrar'])) {
    // ... (código de cadastro aqui)
    if ($stmt->execute()) {
        header("Location: listaaluno.php"); // Redireciona para a lista após o cadastro
        exit; // Encerra o script para evitar que o restante do código seja executado desnecessariamente
    } else {
        echo "Erro ao cadastrar o aluno.";
    }
}

##alterar
if (isset($_POST['update'])) {
    // ... (código de atualização aqui)
    if ($stmt->execute()) {
        header("Location: listaaluno.php"); // Redireciona para a lista após a atualização
        exit; // Encerra o script para evitar que o restante do código seja executado desnecessariamente
    } else {
        echo "Erro ao atualizar o aluno.";
    }
}

##excluir
if (isset($_GET['excluir'])) {
    // ... (código de exclusão aqui)
    header("Location: listaaluno.php"); // Redireciona para a lista após a exclusão
    exit; // Encerra o script para evitar que o restante do código seja executado desnecessariamente
}
?>
