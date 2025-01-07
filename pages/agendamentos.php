<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios com Visitas Marcadas</title>
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
                    <h1 class="h4 mb-4 text-gray-800 text-center">Relatórios com Visitas Marcadas</h1>

                    <?php
                    require '../system/connect.php';

                    try {
                        // Consulta os relatórios com visitas marcadas
                        $sql = "SELECT * FROM CadastroAssistenteSocial WHERE agendamento_visitas IS NOT NULL AND agendamento_visitas != '' ORDER BY agendamento_visitas ASC";
                        $stmt = $pdo->query($sql);
                        $relatorios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-danger'>Erro ao buscar os relatórios: " . htmlspecialchars($e->getMessage()) . "</div>";
                        die();
                    }
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Visitas Marcadas</h6>
                        </div>
                        <div class="card-body small-text">
                            <?php if (!empty($relatorios)): ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sm text-center" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Data da Visita</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($relatorios as $relatorio): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($relatorio['id']) ?></td>
                                                    <td><?= htmlspecialchars($relatorio['nome']) ?></td>
                                                    <td><?= date("d/m/Y", strtotime($relatorio['agendamento_visitas'])) ?></td>
                                                    <td>
                                                        <a href="../system/visualizarRelatorioAgendamento.php?id=<?= $relatorio['id'] ?>" class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i> Visualizar
                                                        </a>
                                                        <a href="../system/editarRelatorioAgendamento.php?id=<?= $relatorio['id'] ?>" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </a>
                                                        <a href="../system/excluirRelatorioAgendamento.php?id=<?= $relatorio['id'] ?>" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Tem certeza de que deseja excluir este relatório?');">
                                                            <i class="fas fa-trash"></i> Excluir
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-center">Nenhum relatório com visita marcada encontrado.</p>
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
