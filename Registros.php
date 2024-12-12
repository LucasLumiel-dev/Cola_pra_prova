<?php
 require "conexao.php"; ////////

$sql = "SELECT id, nome, email, tipo FROM usuario";
$result = $pdo->query($sql);
$result->execute();

// Verificar se há resultados
if ($result->rowCount() > 0) {
    $usuarios = $result->fetchAll(pdo::FETCH_ASSOC);
} else {
    $usuarios = null;
}

// Fechar conexão

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <!--bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .table {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semi-transparente para a tabela */
            border-radius: 10px; /* Bordas arredondadas */
            margin: 0 auto;
        }
        td, th {
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="text-center p-3">Registros de Usuários</h1>
    <div class="container-fluid row justify-content-center">
        <div class="col-8 p-4">
        <table class="table text-center">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo de Usuário</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($usuarios !== null) : ?>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <th scope='row'><?= $usuario['id'] ?></th>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['tipo'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan='4' class='text-center'>Nenhum registro encontrado</td></tr>
        <?php endif; ?>
    </tbody>
</table>
        </div>
    </div>
    <!--bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>