<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;600&display=swap" rel="stylesheet">
    <title>Cadastro de Disciplina</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="../img/logotipo3.png" alt="Logotipo" class="logo">
        </div>
        <div class="form">

            <h1>Cadastro de Disciplina</h1>
            <form method="POST" action="cruddisciplina.php">
                <div class="input-group">
                    <div class="input-box">
                        <label for="nomedisciplina">Disciplina:</label>
                        <input type="text" id="nomedisciplina" name="nomedisciplina" placeholder="Digite a disciplina" required>
                    </div>

                    <div class="input-box">
                        <label for="ch">Carga Horária:</label>
                        <input type="number" id="ch" name="ch" placeholder="Digite a carga horária" required min="6" max="120">
                    </div>

                    <div class="input-box">
                        <label for="semestre">Semestre:</label>
                        <input type="text" id="semestre" name="semestre" placeholder="Digite o semestre" required>
                    </div>

                    <div class="input-box">
                        <label for="idprofessor">ID do Professor:</label>
                        <input type="number" id="idprofessor" name="idprofessor" placeholder="Digite o ID do professor" required>
                    </div>

                    <div class="input-box">
                        <label for="nota1">Nota 1:</label>
                        <input type="number" id="nota1" name="nota1" min="0" max="10" placeholder="Digite a nota 1" required>
                    </div>

                    <div class="input-box">
                        <label for="nota2">Nota 2:</label>
                        <input type="number" id="nota2" name="nota2" min="0" max="10" placeholder="Digite a nota 2" required>
                    </div>
                </div>
                <div class="enter-button">
                    <input type="submit" name="cadastrar" value="Cadastrar">
                </div>
                <div class="back-button">
                <a href="../index.php">Voltar</a>
            </div>
            </form>

        </div>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;600&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #C0C0C0;
    }

    .container {
        width: 60%;
        height: auto;
        display: flex;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.30);
        background: white;
        border-radius: 20px;
    }

    .form-image {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }

    .logo {
        width: 100%;
        max-width: 300px;
        height: auto;
    }

    .form {
        width: 50%;
        padding: 2rem;
        display: flex;
        flex-direction: column;
    }

    h1 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .input-group {
        display: flex;
        flex-wrap: wrap;
    }

    .input-box {
        width: 50%;
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .enter-button input {
        margin-top: 2rem;
        padding: 1rem 5rem;
        background-color: #011e31;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .enter-button input:hover {
        background-color: #191970;
    }

    .back-button a {
        text-decoration: none;
        color: black;
        border: 1px solid black;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .back-button a:hover {
        background-color: #f5f5f5;
    }
</style>
</html>