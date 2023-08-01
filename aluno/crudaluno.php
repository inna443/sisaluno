<?php
## permite acesso às variáveis dentro do arquivo conexao
require_once('conexao.php');

## cadastrar
if (isset($_GET['entrar'])) {
    $nome = $_GET["nome"] ?? '';
    $matricula = $_GET["matricula"] ?? '';
    $email = $_GET["email"] ?? '';
    $numero = $_GET["numero"] ?? '';
    $idade = $_GET["idade"] ?? '';
    $datanas = $_GET["datanas"] ?? '';

    
    

    // Aqui você pode adicionar validações e sanitizações dos dados, por exemplo:
     // Verifica se todos os campos foram preenchidos
     if (empty($nome) || empty($matricula) || empty($email) || empty($numero) || empty($idade) || empty($datanas)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Verificar se a matrícula já está cadastrada
    $sql_matricula = "SELECT COUNT(*) AS total FROM aluno WHERE matricula = :matricula";
    $stmt_matricula = $conexao->prepare($sql_matricula);
    $stmt_matricula->bindParam(':matricula', $matricula, PDO::PARAM_STR);
    $stmt_matricula->execute();
    $result_matricula = $stmt_matricula->fetch(PDO::FETCH_ASSOC);

    if ($result_matricula['total'] > 0) {
        echo "Atenção: A matrícula informada já está cadastrada.";
        exit;
    }

    // Validar formato do email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido. Por favor, insira um e-mail válido.";
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

    $sql = "INSERT INTO aluno (nome, matricula, email, numero, idade, datanas) 
            VALUES (:nome, :matricula, :email, :numero, :idade, :datanas)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':matricula', $matricula, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanas', $datanas, PDO::PARAM_STR);
    
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
    $matricula = $_POST["matricula"] ?? '';
    $email = $_POST["email"] ?? '';
    $numero = $_POST["numero"] ?? '';
    $idade = $_POST["idade"] ?? '';
    $datanas = $_POST["datanas"] ?? '';

    
    // Aqui você pode adicionar validações e sanitizações dos dados, se necessário

    $sql = "UPDATE aluno SET nome = :nome, matricula = :matricula, email = :email, numero = :numero,
            idade = :idade, datanas = :datanas  WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':matricula', $matricula, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanas', $datanas, PDO::PARAM_STR);
    

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
