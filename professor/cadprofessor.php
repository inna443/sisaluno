
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;600&display=swap" rel="stylesheet">
    <title>Cadastro de professor</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/logo professor.png" alt="" srcset="">
        </div>
        <div class="form">
            <form method="GET" action="crudprofessor.php">
                <div class="header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="button">
                        <a href="../aluno/index.php">Voltar</a>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                    </div>

                    <div class="input-box">
                        <label for="idade">Idade</label>
                        <input type="number" id="idade" name="idade" placeholder="Digite sua idade" required min="6" max="120">
                    </div>

                    <div class="input-box">
                        <label for="datanascimento">Data de nascimento</label>
                        <input type="date" id="datanascimento" name="datanascimento" required>
                    </div>

                    <div class="input-box">
                        <label for="endereco">Endereco</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço"required>
                    </div>

                    <div class="input-box">
                        <label for="estatus">Status</label>
                        <input type="text" id="estatus" name="estatus" required>
                    </div>

                    <div class="input-box">
                        <label for="siape"> siape</label>
                        <input type="number" id="siape" name="siape" required>
                    </div>
                    <div class="enter-button">
                    <input type="submit" name="entrar" value="Entrar">
                </div>
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>

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
        width: 80%;
        height: 80vh;
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
        width: 50rem;
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
        padding: 0.5rem 1rem;
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
