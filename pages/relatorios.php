<?php
require '../system/connect.php';

try {
    // Consulta para buscar os relatórios
    $sql = "SELECT * FROM CadastroAssistenteSocial";
    $stmt = $pdo->query($sql);

    // Buscar todos os resultados
    $relatorios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os relatórios: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Relatórios Cadastrados</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        .table-container {
            padding: 20px;
            background: #f8f9fc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #ffffff;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background: #4e73df;
            color: #ffffff;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #d1d3e2;
        }

        .action-links a {
            text-decoration: none;
            margin-right: 10px;
            padding: 5px 10px;
            background: #4e73df;
            color: #ffffff;
            border-radius: 4px;
            font-size: 14px;
        }

        .action-links a:hover {
            background: #2e59d9;
        }

        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #4e73df;
            margin-top: 20px;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Reports</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="../index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Público
            </div>

            <!-- Nav Item - Cadastro -->
            <li class="nav-item">
                <a class="nav-link" href="cadastrados.php">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Cadastros</span></a>
            </li>

            <!-- Nav Item - Relatórios -->
            <li class="nav-item active">
                <a class="nav-link" href="relatorios.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Relatórios</span></a>
            </li>

            <!-- Nav Item - Documentos -->
            <li class="nav-item">
                <a class="nav-link" href="documentos.html">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Documentos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sistema
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configurações</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="cadastro.html">Cadastro</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="page-title">Relatórios Cadastrados</h1>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($relatorios as $relatorio): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($relatorio['id']) ?></td>
                                        <td><?= htmlspecialchars($relatorio['nome']) ?></td>
                                        <td><?= htmlspecialchars($relatorio['cpf']) ?></td>
                                        <td><?= htmlspecialchars($relatorio['rg']) ?></td>
                                        <td><?= htmlspecialchars($relatorio['telefone']) ?></td>
                                        <td class="action-links">
                                            <a href="../system/editar.php?id=<?= urlencode($relatorio['id']) ?>">Editar</a>
                                            <a href="#" onclick="confirmarExclusao(<?= $relatorio['id'] ?>)">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza de que deseja excluir este relatório?")) {
                window.location.href = "../system/excluir.php?id=" + id;
            }
        }
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
