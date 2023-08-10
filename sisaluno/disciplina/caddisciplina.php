<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;600&display=swap" rel="stylesheet">
    <title>Cadastro de aluno</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="../img/logotipo3.png" alt="" srcset="">
        </div>
        <div class="form">
            <form method="GET" action="listadisciplina.php">
                <div class="header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="button">
                        <a href="../index.php">Voltar</a>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nomedisciplina">DISCIPLINA:</label>
                        <input type="text" id="nomedisciplina" name="nomedisciplina" placeholder="Digite a disciplina" required>
                    </div>

                    <div class="input-box">
                        <label for="ch">CARGA HORÁRIA:</label>
                        <input type="text" id="ch" name="ch" placeholder="Digite a carga horaria" required min="6" max="120">
                    </div>

                    <div class="input-box">
                        <label for="semestre">SEMESTRE</label>
                        <input type="text" id="semestre" name="semestre" required>
                    </div>

                    <div class="input-box">
                        <label for="idprofessor">ID DO PROFESSOR</label>
                        <input type="number" id="idprofessor" name="idprofessor" required>
                    </div>

                    <div class="enter-button">
                    <input type="submit" name="entrar" value="Entrar" href="listadisciplina.php">
                </div>
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
        height: 60vh;
        display: flex;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.30);
        background: white;
        border-radius:20px;
    }

    .form-image {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }

    .form-image img {
        width: 40rem;
        height: 40rem;
    }

    .form {
        width: 50%;
        padding: 2rem;
        display: flex;
        flex-direction: column;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .title h1 {
        font-size: 2rem;
    }

    .button a {
        text-decoration: none;
        color: black;
        border: 1px solid black;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .button a:hover {
        background-color: #f5f5f5;
    }

    .input-group {
        display: flex;
        flex-wrap: wrap;
    }

    .input-box {
        width: 50%;
        margin-bottom: 1.5rem;
    }

    .input-box label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .input-box input {
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
        background-color: #	191970;
    }
</style>
</html>