<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Disciplina</title>
</head>
<body>
    <?php
    require_once('../conexao.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM disciplina WHERE id = :id";

        $retorno = $conexao->prepare($sql);
        $retorno->bindParam(':id', $id, PDO::PARAM_INT);
        $retorno->execute();

        $disciplina = $retorno->fetch(PDO::FETCH_ASSOC);

        if ($disciplina) {
            $nomedisciplina = $disciplina['nomedisciplina'];
            $ch = $disciplina['ch'];
            $semestre = $disciplina['semestre'];
            $idprofessor = $disciplina['idprofessor'];
            $nota1 = $disciplina['nota1'];
            $nota2 = $disciplina['nota2'];
            $media = $disciplina['media'];
        } else {
            echo "Disciplina não encontrada.";
            exit;
        }
    } else {
        echo "ID da disciplina não fornecido.";
        exit;
    }

    if (isset($_POST['update'])) {
        $nomedisciplina = $_POST["nomedisciplina"] ?? '';
        $ch = $_POST["ch"] ?? '';
        $semestre = $_POST["semestre"] ?? '';
        $idprofessor = $_POST["idprofessor"] ?? '';
        $nota1 = $_POST["nota1"] ;
        $nota2 = $_POST["nota2"] ;
        $media = $_POST["media"] ;
        
    
    }

       
    ?>

    <div class="container">
        <button class="button"><a href="listadisciplina.php">Voltar</a></button>
        <h1>Alteração de disciplina</h1>
        <div class="form">
            <form method="POST" action="cruddisciplina.php">
                <input type="text" name="nomedisciplina" id=""  value="<?php echo $nomedisciplina; ?>">

                <input type="text" name="ch" id="ch" value="<?php echo $ch; ?>">

                <input type="text" name="semestre" id="semestre" value="<?php echo $semestre; ?>">

                <input type="text" name="idprofessor" id="idprofessor"value="<?php echo $idprofessor; ?>">

                <input type="number" name="nota1" id="nota1"value="<?php echo $nota1; ?>">

                <input type="number" name="nota2" id="nota2"value="<?php echo $nota2; ?>">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" name="update" value="Alterar">
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
