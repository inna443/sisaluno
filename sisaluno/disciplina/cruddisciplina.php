
<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');

##cadastrar
if(isset($_POST['entrar'])){
        
        $nomedisciplina = $_POST["nomedisciplina"];
        $ch= $_POST["ch"];
        $semestre=$_POST["semestre"];
        $idprofessor=$_POST["idprofessor"];

        if (empty($nomediscipline) || empty($cg) || empty($semestre)|| empty($idprofessor)) {
          echo "Todos os campos são obrigatórios.";
          exit;
      }
          $sql = "INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor) 
          VALUES('$nomedisciplina','$ch','$semestre', '$idprofessor')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> A disciplina
                $nomedisciplina foi Incluido(a) com sucesso!!"; 
                echo " <button class='button'><a href='caddisciplina.php'>voltar</a></button>";
            }
        }
      
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id= $_POST["id"];
    $nomedisciplina= $_POST["nomedisciplina"];
    $ch= $_POST["ch"];
    $semestre= $_POST["semestre"];
    $idprofessor= $_POST["idprofessor"];

      ##codigo sql
    $sql = "UPDATE  disciplina SET nomedisciplina= :nomedisciplina, ch= :ch, semestre=:semestre, idprofessor=:idprofessor WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina',$nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_INT);


    if ($stmt->execute()) {
      header("Location: listadisciplina.php");
  } else {
      echo "Erro ao cadastrar a disciplina.";
  }

} 
## alterar
if (isset($_POST['update'])) {
  $id = $_POST["id"] ?? '';
  $nomedisciplina = $_POST["nomedisciplina"] ?? '';
  $ch = $_POST["ch"] ?? '';
  $semestre = $_POST["semestre"] ?? '';
  $idprofessor = $_POST["idprofessor"] ?? '';
  

  
  // Aqui você pode adicionar validações e sanitizações dos dados, se necessário

  $sql = "UPDATE aluno SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id";

  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':nomedisciplina', $nomedisciplina, PDO::PARAM_STR);
  $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
  $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
  $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_STR);
  if ($stmt->execute()) {
      echo "<strong>OK!</strong> a disciplina $nomedisciplina foi alterado com sucesso!";
      echo "<button class='button'><a href='../index.php'>Voltar</a></button>";
  } else {
      echo "Erro ao atualizar a disciplina.";
  }
}       


##Excluir
if (isset($_POST['excluir'])) {
  $id = $_POST['id'];

  $sql = "SELECT nomedisciplina FROM disciplina WHERE id = :id";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result_stmt = $stmt->fetch(PDO::FETCH_ASSOC);

  $nomedisciplina = $result_stmt['nomedisciplina'];


echo "<script>
var confirmar = confirm('Tem certeza que deseja excluir a disciplina $nomedisciplina?');
if (confirmar) {
    window.location.href = 'excluirdisciplina.php? id=$id'; 
} else {
    window.location.href = 'listadisciplina.php';
}
</script>";
}


        
?>



