<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas Prioritários</title>
    <link rel="stylesheet" href="../css/sb-admin-2.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        .small-text {
            font-size: 0.875rem; /* Diminuir o tamanho da fonte */
        }
        .table td, .table th {
            padding: 0.5rem; /* Diminuir o espaçamento interno */
        }
        .card {
            max-width: 800px; /* Limita a largura máxima do card */
            margin: 0 auto; /* Centraliza o card */
        }
    </style>
</head>
<body id="page-top">

    <!-- Página Principal -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include '../includes/sidebar.php'; ?>
        <!-- Fim do Sidebar -->

        <!-- Conteúdo Principal -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Conteúdo da Página -->
                <div class="container mt-4">
                    <h1 class="h4 mb-4 text-gray-800 text-center">Alertas Prioritários</h1>

                    <?php
                    require '../system/connect.php';

                    try {
                        // Consulta os alertas prioritários
                        $sql = "SELECT * FROM CadastroAssistenteSocial WHERE alertas_prioritarios IS NOT NULL AND alertas_prioritarios != '' ORDER BY alertas_prioritarios ASC";
                        $stmt = $pdo->query($sql);
                        $alertas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger'>Erro ao buscar os alertas: " . htmlspecialchars($e->getMessage()) . "</div>";
                        die();
                    }
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Lista de Alertas Prioritários</h6>
                        </div>
                        <div class="card-body small-text">
                            <?php if (!empty($alertas)): ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sm text-center" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Alerta Prioritário</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alertas as $alerta): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($alerta['id']) ?></td>
                                                    <td><?= htmlspecialchars($alerta['nome']) ?></td>
                                                    <td><?= htmlspecialchars($alerta['alertas_prioritarios']) ?></td>
                                                    <td>
                                                        <a href="../system/visualizarAlertas.php?id=<?= $alerta['id'] ?>" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i> Visualizar
                                                        </a>
                                                        <a href="../system/editarAlerta.php?id=<?= $alerta['id'] ?>" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <a href="../system/excluirAlerta.php?id=<?= $alerta['id'] ?>" 
                                                           class="btn btn-danger btn-sm" 
                                                           onclick="return confirm('Tem certeza de que deseja excluir este alerta?');">
                                                            <i class="fas fa-trash"></i> Excluir
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-center">Nenhum alerta prioritário encontrado.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Fim do Conteúdo da Página -->
            </div>
            <!-- Fim do Conteúdo -->
        </div>
        <!-- Fim do Wrapper -->
    </div>

    <!-- JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>
