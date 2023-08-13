<?php
require_once('../conexao.php');

if (isset($_POST['cadastrar'])) {
    $nomedisciplina = $_POST["nomedisciplina"] ?? '';
    $ch = $_POST["ch"] ?? '';
    $semestre = $_POST["semestre"] ?? '';
    $idprofessor = $_POST["idprofessor"] ?? '';
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'] ;
    $media = $_POST['media'];

    
    if (empty($nomedisciplina) || empty($ch) || empty($semestre) || empty($idprofessor) || empty($nota1) || empty($nota2)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

  
    if ($nota1 !== '' && $nota2 !== '') {
        $media = ($nota1 + $nota2) / 2;
    } else {
        $media = null;
    }

    $sql = "INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor, nota1, nota2, media) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor, :nota1, :nota2, :media)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_INT);
    $stmt->bindParam(':nota1', $nota1, PDO::PARAM_STR);
    $stmt->bindParam(':nota2', $nota2, PDO::PARAM_STR);
    $stmt->bindParam(':media', $media, PDO::PARAM_STR);

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
    $nota1 = $_POST["nota1"] ?? '';
    $nota2 = $_POST["nota2"] ?? '';

    if ($nota1 !== '' && $nota2 !== '') {
        $nota1 = floatval($nota1);
        $nota2 = floatval($nota2); 
        $media = ($nota1 + $nota2) / 2;
    } else {
        $media = null;
    }
    

    $sql = "UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor, nota1 = :nota1, nota2 = :nota2, media = :media WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_INT);
    $stmt->bindParam(':nota1', $nota1, PDO::PARAM_STR);
    $stmt->bindParam(':nota2', $nota2, PDO::PARAM_STR);
    $stmt->bindParam(':media', $media, PDO::PARAM_STR);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['success_message'] = "A disciplina $nomedisciplina foi alterada com sucesso!";
        header("Location: listadisciplina.php");
        exit;
    } else {
        echo "Erro ao atualizar a disciplina.";
    }
    header("Location: listadisciplina.php");
}


if (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $nomedisciplina = $_GET['nomedisciplina'];

    $sql = "DELETE FROM disciplina WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "<div class='aviso'><strong>OK!</strong> <br> A disciplina $nomedisciplina foi excluída!!!</div><br>";
        echo "<button class='button'><a href='listadisciplina.php'>Voltar</a></button>";
    } catch (PDOException $e) {
        echo "Erro ao excluir a disciplina: " . $e->getMessage();
    }
    header("Location: listadisciplina.php");
}
?>