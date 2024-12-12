<?php
require "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

if ($id !== null) {
    $sql = "DELETE FROM usuario WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Usuário deletado com sucesso!";
        header("Location: Registros.php");
        exit;
    } else {
        echo "Erro ao deletar usuário: " . $stmt->$error;
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>