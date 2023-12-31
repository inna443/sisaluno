<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Aluno</title>
</head>
<body>

<?php
require_once('../conexao.php');

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL para selecionar apenas um aluno
    $sql = "SELECT * FROM aluno WHERE id = :id";
   
    // Prepara o SQL
    $retorno = $conexao->prepare($sql);

    // Define o parâmetro do ID
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    // Executa a consulta
    $retorno->execute();

    // Transforma o resultado em um array associativo
    $aluno = $retorno->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se o aluno foi encontrado no banco de dados
    if ($aluno) {
        $nome = $aluno['nome'];
        $idade = $aluno['idade'];
        $datanascimento = $aluno['datanascimento'];
        $endereco = $aluno['endereco'];
        $estatus = $aluno['estatus'];
        
    } else {
        // Caso o aluno não seja encontrado, redireciona para alguma página de erro ou exibe uma mensagem de erro
        echo "Aluno não encontrado.";
        exit;
    }
} else {
    // Caso o ID não tenha sido passado pela URL, redireciona para alguma página de erro ou exibe uma mensagem de erro
    echo "ID do aluno não fornecido.";
    exit;
}

// Função para validar a data de nascimento (1900 ao ano atual)
function validarDataNascimento($data) {
    $dataAtual = new DateTime();
    $dataNascimento = DateTime::createFromFormat('Y-m-d', $data);

    if (!$dataNascimento) {
        return false;
    }

    return ($dataNascimento->format('Y') >= 1900 && $dataNascimento <= $dataAtual);
}

if (isset($_POST['update'])) {
    $nome = $_POST["nome"] ?? '';
    $idade = $_POST["idade"] ?? '';
    $datanascimento = $_POST["datanascimento"] ?? '';
    $endereco = $_POST["endereco"] ?? '';
    $estatus = $_POST["estatus"] ?? '';


    // Aqui você pode adicionar mais validações, se necessário


    // Verificar a idade como número inteiro positivo e dentro da faixa aceitável (6 a 120 anos)
    if (!is_numeric($idade) || intval($idade) <= 0 || intval($idade) > 120) {
        echo "Idade inválida. A idade deve ser um número inteiro positivo entre 6 e 120 anos.";
        exit;
    }

    // Validar a data de nascimento (1900 ao ano atual)
    if (!validarDataNascimento($datanascimento)) {
        echo "Data de nascimento inválida. Insira uma data válida entre 1900 e o ano atual.";
        exit;
    }

    // Aqui você pode adicionar mais validações, se necessário

    // Atualizar os dados no banco de dados
    $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco,
     estatus = :estatus WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    

    if ($stmt->execute()) {
        echo "Dados do aluno atualizados com sucesso!";
       
        header("Location: listaaluno.php");
        exit; 
    } else {
        echo "Erro ao atualizar o aluno.";
    }
}
?>

<div class="container">
    <button class="button"><a href="listaaluno.php">Voltar</a></button>
    <h1>Alteração de Aluno</h1>
    
    <div class="form">
        <form action="crudaluno.php" method="POST">
        <input type="text" name="nome" id="" value="<?php echo $nome?>" >
                                                
        <input type="number" name="idade" id="idade" value="<?php echo $idade ?>" >

        <input type="date" name="datanascimento" id="datanascimento" value="<?php echo $datanascimento?> ">

        <input type="text" name="endereco" id="endereco" value="<?php echo $endereco?>" >

        <input type="text" name="estatus" id="estatus" value="<?php echo $estatus?>" >
      
        <input type="hidden" name="id" id="" value="<?php echo $id ?>" >
        
        <input type="submit" name="update" value="Alterar" >
  

        </form>
    </div>
</div>

</body>
<style>

body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #C0C0C0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 600px;
            width: 80%;
            height: 80vh;
            padding: 20px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.30);
            background: white;
            border-radius: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .gender-group {
            margin-bottom: 15px;
        }

        .enter-button {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button {
            background-color: #2aab45;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .button a {
            color: white;
            text-decoration: none;
        }

        .button:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
</html>