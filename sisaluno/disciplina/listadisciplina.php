<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista DISCIPLINA</title>
</head>
<body>
<button class="button button3"><a href="caddisciplina.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
    </svg>   Adicionar</a></button>
<?php 


  require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();

?>       
<H3>LISTA DE DISCIPLINAS</H3>
        <table> 
            <thead>
                <tr>
                <th scope="col">DISCIPLINA</th>
                 <th scope="col">CARGA HORÁRIA</th>
                 <th scope="col">SEMESTRE</th>
                 <th scope="col">ID DO PROFESSOR</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                      <td><?php echo $value['nomedisciplina']; ?></td>
                    <td><?php echo $value['ch']; ?></td>
                    <td><?php echo $value['semestre']; ?></td>
                    <td><?php echo $value['idprofessor']; ?></td>
                            <td>
                            <td class="botao">
                        <form method="GET" action="altdisciplina.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button class="Btn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg> Editar
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="GET" action="cruddisciplina.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button name="excluir" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
         </tbody>
     </table>

     <?php echo "<button class='button button3'><a href='../index.php'>voltar</a></button>"; ?>

</body>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

.botao {
    display: flex;
    gap: 10px;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 4px;
}

.button3 {
    background-color: #9;
}

.button a {
    color: white;
    text-decoration: none;
}

.button:hover {
    background-color: #45a049;
}

</style>
</html>
