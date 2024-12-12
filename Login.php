<?php
require "conexao.php";
session_start();

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
} else {
    $tipo = null;
}

if (isset($_POST['email_input'])) {
    $email = $_POST['email_input'];
} else {
    $email = null;
}

if (isset($_POST['password_input'])) {
    $senha_digitada = $_POST['password_input'];
} else {
    $senha_digitada = null;
}

if ($tipo == "aluno") {
    $sql = $pdo->prepare("SELECT id, tipo_login, nome, senha FROM alunos WHERE email = :email");

} else if ($tipo == "professor") {
    $sql = $pdo->prepare("SELECT id, tipo_login, nome, senha FROM professores WHERE email = :email");
}

if ($sql) {
    $sql->bindValue(':email', $email);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha_digitada == $usuario['senha']) {
        $_SESSION = $usuario;

        if ($tipo == "aluno") {
            header("Location: ../menu_aluno.php");

        } else if ($tipo == "professor") {
            header("Location: ../menu_professor.php");

        }
    }
}
?>