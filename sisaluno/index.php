<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCAD - Sistema de Cadastro</title>
</head>
<body>
    <div class="container">
        <h1>SISCAD</h1>
        <div class="buttons">
            <a href="../sisaluno/aluno/cadaluno.php" class="button">Cadastrar Aluno</a>
            <a href="../sisaluno/professor/cadprofessor.php" class="button">Cadastrar Professor</a>
            <a href="../sisaluno/disciplina/caddisciplina.php" class="button">Cadastrar Disciplina</a>
            <a href="../sisaluno/aluno/listaaluno.php" class="button">Listar Alunos</a>
            <a href="../sisaluno/professor/listaprofessor.php" class="button">Listar Professores</a>
            <a href="../sisaluno/disciplina/listadisciplina.php" class="button">Listar Disciplinas</a>
        </div>
    </div>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f1f1f1;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        max-width: 100vh;
        width: 80%;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        background-color: #ffffff;
        border-radius: 20px;
        text-align: center;
    }

    h1 {
        margin-bottom: 30px;
    }

    .buttons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .button {
        display: block;
        padding: 15px;
        background-color: #011e31;
        color: #ffffff;
        text-decoration: none;
        text-align: center;
        border-radius: 10px;
        font-size: 16px;
    }

    .button:hover {
        background-color: #011e31;
    }
</style>
</html>
