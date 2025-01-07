<?php
require 'connect.php';


// Verificar se o ID foi passado
if (!isset($_GET['id'])) {
    echo "ID do relatório não foi fornecido!";
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Atualizar o relatório no banco de dados
        $sql = "
            UPDATE CadastroAssistenteSocial
            SET nome = :nome, cpf = :cpf, rg = :rg, endereco = :endereco, telefone = :telefone, agendamento_visitas = :agendamento_visitas
            WHERE id = :id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':cpf' => $_POST['cpf'],
            ':rg' => $_POST['rg'],
            ':endereco' => $_POST['endereco'],
            ':telefone' => $_POST['telefone'],
            ':agendamento_visitas' => $_POST['agendamento_visitas'],
            ':id' => $id
        ]);

        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar relatório: " . $e->getMessage();
        exit;
    }
}

try {
    // Buscar o relatório pelo ID
    $sql = "SELECT * FROM CadastroAssistenteSocial WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $relatorio = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$relatorio) {
        echo "Relatório não encontrado!";
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao buscar relatório: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Relatório</title>
    <link rel="stylesheet" href="../css/sb-admin-2.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            color: #fff;
            padding-top: 20px;
        }
        .content {
            margin-left: 250px; /* Largura do sidebar */
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <?php include '../includes/sidebar.php'; ?>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center">Editar Relatório</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($relatorio['nome']) ?>">
                        </div>
  

                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= htmlspecialchars($relatorio['endereco']) ?>">
                        </div>

                        <div class="mb-3">
                            <label for="agendamento_visitas" class="form-label">Data da Visita</label>
                            <input type="date" class="form-control" id="agendamento_visitas" name="agendamento_visitas" value="<?= htmlspecialchars($relatorio['agendamento_visitas']) ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <a href="../pages/agendamentos.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
