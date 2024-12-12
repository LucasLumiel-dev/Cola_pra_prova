<?php
require "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

if ($id !== null) {
    $sql = "SELECT id, nome, email, tipo FROM usuario WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        ?>
        <h1 class="text-center p-3">Editar Usuário</h1>
        <div class="container-fluid row justify-content-center">
            <form class="col-4 form-container" method="POST" action="">
                <h3 class="text-center text-secondary">Editar Usuário</h3>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Usuário</label>
                    <select class="form-select" name="tipo" required>
                        <option value="aluno" <?php if ($usuario['tipo'] == 'aluno') echo 'selected'; ?>>Aluno</option>
                        <option value="professor" <?php if ($usuario['tipo'] == 'professor') echo 'selected'; ?>>Professor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </form>
        </div>
        <?php
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}

// Processar o formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    $sql = "UPDATE usuario SET nome = :nome, email = :email, tipo = :tipo WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Usuário editado com sucesso!";
        header("Location: Registros.php");
        exit;
    } else {
        echo "Erro ao editar usuário: " . $stmt->$error;
    }
}
?>