<?php
## permite acesso às variáveis dentro do arquivo conexao
require_once('../conexao.php');

## cadastrar
if (isset($_GET['entrar'])) {
    $nome = $_GET["nome"] ?? '';
    $cpf = $_GET["cpf"] ?? '';;
    $idade = $_GET["idade"] ?? '';
    $datanascimento = $_GET["datanascimento"] ?? '';
    $endereco = $_GET["endereco"] ?? '';
    $estatus = $_GET["estatus"] ?? '';
    $siape = $_GET["siape"] ?? '';

    // Aqui você pode adicionar validações e sanitizações dos dados, por exemplo:
    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($cpf) || empty($idade) || empty($datanascimento) || empty($endereco) || empty($estatus)|| empty($siape)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Verificar se o cpf ja está cadastrado
    $sql_cpf = "SELECT COUNT(*) AS total FROM professor WHERE cpf = :cpf";
    $stmt_cpf = $conexao->prepare($sql_cpf);
    $stmt_cpf->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt_cpf->execute();
    $result_cpf = $stmt_cpf->fetch(PDO::FETCH_ASSOC);

    if ($result_cpf['total'] > 0) {
        echo "Atenção: O CPF informado já está cadastrado.";
        exit;
    }

    // Validar a idade como número inteiro positivo e dentro da faixa aceitável (6 a 120 anos)
    if (!is_numeric($idade) || intval($idade) <= 0 || intval($idade) > 120) {
        echo "Idade inválida. A idade deve ser um número inteiro positivo entre 6 e 120 anos.";
        exit;
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO professor(nome, cpf, idade, datanascimento, endereco, estatus, siape) 
            VALUES (:nome, :cpf, :idade, :datanascimento, :endereco, :estatus, :siape)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_INT);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    $stmt->bindParam(':siape', $siape, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header("Location: listaprofessor.php");
        exit; // Encerra o script para evitar que o restante do código seja executado desnecessariamente
    } else {
        echo "Erro ao cadastrar o professor.";
    }
}

## alterar
if (isset($_POST['update'])) {
    $id = $_POST["id"] ?? '';
    $nome = $_POST["nome"] ?? '';
    $cpf = $_POST["cpf"] ?? ''; 
    $idade = $_POST["idade"] ?? '';
    $datanascimento = $_POST["datanascimento"] ?? '';
    $endereco = $_POST["endereco"] ?? '';
    $estatus = $_POST["estatus"] ?? '';
    $siape = $_POST["siape"] ?? '';

       // Validar a idade como número inteiro positivo e dentro da faixa aceitável (6 a 120 anos)
       if (!is_numeric($idade) || intval($idade) <= 0 || intval($idade) > 120) {
        echo "Idade inválida. A idade deve ser um número inteiro positivo entre 6 e 120 anos.";
        exit;
    }


    $sql = "UPDATE aluno SET nome = :nome, cpf = :cpf, idade = :idade, datanascimento = :datanascimento,
    endereco = :endereco, estatus = :estatus, siape = :siape  WHERE id = :id";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_INT);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    $stmt->bindParam(':siape', $siape, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "<strong>OK!</strong> O professor $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='../index.php'>Voltar</a></button>";
    } else {
        echo "Erro ao atualizar o professor.";
    }
}

## excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'] ?? '';
    $sql = "DELETE FROM professor WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: listaprofessor.php");
}

// Função para validar o formato do CPF
function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

    // Verifica se foi informado um CPF completo
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Validação do primeiro dígito verificador
    for ($i = 9, $j = 0, $soma1 = 0; $i > 0; $i--, $j++) {
        $soma1 += $cpf[$j] * $i;
    }

    $resto1 = $soma1 % 11;
    $dv1 = $resto1 < 2 ? 0 : 11 - $resto1;

    // Validação do segundo dígito verificador
    for ($i = 10, $j = 0, $soma2 = 0; $i > 0; $i--, $j++) {
        $soma2 += $cpf[$j] * $i;
    }

    $resto2 = $soma2 % 11;
    $dv2 = $resto2 < 2 ? 0 : 11 - $resto2;

    // Verifica se os dígitos calculados são iguais aos informados
    if ($dv1 !== intval($cpf[9]) || $dv2 !== intval($cpf[10])) {
        return false;
    }

    return true;
}
?>