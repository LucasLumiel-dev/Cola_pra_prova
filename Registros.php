<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // seu usuário do banco de dados
$password = "cimatec"; // sua senha do banco de dados
$dbname = "colegio_positivo"; // nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT id, nome, email, tipo FROM usuario";
$result = $conn->query($sql);

// Verifique se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta: " . $conn->error);
}

// Verificar se há resultados e exibir na tabela
if ($result->num_rows > 0) {
    // Saída de cada linha
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <th scope='row'>" . $row["id"] . "</th>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["tipo"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>Nenhum registro encontrado</td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <!--bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('caminho/para/sua/imagem.jpg'); /* Substitua pelo caminho da sua imagem */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .table {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semi-transparente para a tabela */
            border-radius: 10px; /* Bordas arredondadas */
        }
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
        <?php
        // Verificar se há resultados e exibir na tabela
        if ($result->num_rows > 0) {
            // Saída de cada linha
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>" . $row["id"] . "</th>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["tipo"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center'>Nenhum registro encontrado</td></tr>";
        }
        ?>
    </tbody>
</table>
        </div>
    </div>
    <!--bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>