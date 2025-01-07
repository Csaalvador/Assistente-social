<?php
require '../system/connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitiza o ID

    try {
        // Busca os dados do alerta
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $alertaPrioritario = $_POST['alertas_prioritarios'];
    $dataVisita = $_POST['agendamento_visitas'];

    try {
        // Atualiza os dados do alerta
        $sql = "UPDATE CadastroAssistenteSocial 
                SET nome = :nome, alertas_prioritarios = :alertaPrioritario, agendamento_visitas = :dataVisita 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':alertaPrioritario', $alertaPrioritario, PDO::PARAM_STR);
        $stmt->bindParam(':dataVisita', $dataVisita, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../pages/alertasPrioritarios.php?msg=Alerta atualizado com sucesso");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Erro ao atualizar o alerta.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erro ao atualizar o alerta: " . htmlspecialchars($e->getMessage()) . "</div>";
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alerta</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="h4 mb-4 text-gray-800 text-center">Editar Alerta Prioritário</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($alerta['nome']) ?>" >
            </div>
            <div class="form-group mt-3">
                <label for="alertas_prioritarios">Alerta Prioritário</label>
                <textarea name="alertas_prioritarios" id="alertas_prioritarios" class="form-control" ><?= htmlspecialchars($alerta['alertas_prioritarios']) ?></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="agendamento_visitas">Data de Agendamento</label>
                <input type="date" name="agendamento_visitas" id="agendamento_visitas" class="form-control" value="<?= htmlspecialchars($alerta['agendamento_visitas']) ?>" >
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="../pages/alertasPrioritarios.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
