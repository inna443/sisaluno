<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    require_once('../conexao.php');

   $id= $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre= $array_retorno['semestre'];
   $idprofessor= $array_retorno['idprofessor'];
 

?>
<header>
    <h3>ALTERAR DISCIPLINA</h3> </header>


  <form method="POST" action="crudisciplina.php">
        <input type="text" name="nomedisciplina" id="" value="<?php echo $nomedisciplina?>" >
                                                
        <input type="text" name="ch" id="" value="<?php echo $ch?>" >
      
        <input type="text" name="semestre" id="" value="<?php echo $semestre?>" >

        <input type="text" name="idprofessor" id="" value="<?php echo $idprofessor?>" >

        <input type="hidden" name="id" id="" value="<?php echo $id?>" >

    
        <input type="submit" name="update" value="Alterar">
        

      
  </form>



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
