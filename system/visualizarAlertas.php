<?php
require '../system/connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitiza o ID

    try {
        // Consulta os detalhes do alerta
        $sql = "SELECT * FROM CadastroAssistenteSocial WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $alerta = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$alerta) {
            echo "<div class='alert alert-warning'>Alerta não encontrado.</div>";
            exit();
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erro ao buscar o alerta: " . htmlspecialchars($e->getMessage()) . "</div>";
        die();
    }
} else {
    echo "<div class='alert alert-danger'>ID inválido.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Alerta</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="h4 mb-4 text-gray-800 text-center">Detalhes do Alerta Prioritário</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> <?= htmlspecialchars($alerta['id']) ?></p>
                <p><strong>Nome:</strong> <?= htmlspecialchars($alerta['nome']) ?></p>
                <p><strong>Alerta Prioritário:</strong> <?= htmlspecialchars($alerta['alertas_prioritarios']) ?></p>
                <p><strong>Data de Agendamento:</strong> <?= htmlspecialchars($alerta['agendamento_visitas']) ?></p>
                <a href="../pages/alertasPrioritarios.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
