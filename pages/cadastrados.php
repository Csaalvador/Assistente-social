<?php
// Conexão com o banco de dados usando PDO
header('Content-Type: text/html; charset=utf-8');
require '../system/connect.php'; // Supondo que você tenha a conexão configurada em 'connect.php'

try {
    // Consulta para buscar os dados da tabela 'CadastroAssistenteSocial'
    $query = $pdo->query('SELECT id, nome, cpf, rg, endereco, telefone, renda_familiar, composicao_familiar, 
                          beneficios_recebidos, situacao_habitacional, nivel_escolaridade, situacao_emprego, 
                          historico_atendimentos, notas_assistentes_social, comprovante_renda, comprovante_residencia, 
                          geracao_relatorios, agendamento_visitas, alertas_prioritarios FROM CadastroAssistenteSocial');
    $dadosRelatorio = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // Caso ocorra erro na conexão, exibe mensagem e encerra o script
    die("Erro na conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Cadastro Assistente Social</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Relatórios - Cadastro Assistente Social</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabela de Dados</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Renda Familiar</th>
                                <th>Composição Familiar</th>
                                <th>Benefícios Recebidos</th>
                                <th>Situação Habitacional</th>
                                <th>Nível Escolaridade</th>
                                <th>Situação Emprego</th>
                                <th>Histórico de Atendimentos</th>
                                <th>Notas do Assistente Social</th>
                                <th>Comprovante de Renda</th>
                                <th>Comprovante de Residência</th>
                                <th>Geração de Relatórios</th>
                                <th>Agendamento de Visitas</th>
                                <th>Alertas Prioritários</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dadosRelatorio)): ?>
                                <?php foreach ($dadosRelatorio as $dado): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($dado['id']) ?></td>
                                        <td><?= htmlspecialchars($dado['nome']) ?></td>
                                        <td><?= htmlspecialchars($dado['cpf']) ?></td>
                                        <td><?= htmlspecialchars($dado['rg']) ?></td>
                                        <td><?= htmlspecialchars($dado['endereco']) ?></td>
                                        <td><?= htmlspecialchars($dado['telefone']) ?></td>
                                        <td><?= htmlspecialchars($dado['renda_familiar']) ?></td>
                                        <td><?= htmlspecialchars($dado['composicao_familiar']) ?></td>
                                        <td><?= htmlspecialchars($dado['beneficios_recebidos']) ?></td>
                                        <td><?= htmlspecialchars($dado['situacao_habitacional']) ?></td>
                                        <td><?= htmlspecialchars($dado['nivel_escolaridade']) ?></td>
                                        <td><?= htmlspecialchars($dado['situacao_emprego']) ?></td>
                                        <td><?= htmlspecialchars($dado['historico_atendimentos']) ?></td>
                                        <td><?= htmlspecialchars($dado['notas_assistentes_social']) ?></td>
                                        <td><?= htmlspecialchars($dado['comprovante_renda']) ?></td>
                                        <td><?= htmlspecialchars($dado['comprovante_residencia']) ?></td>
                                        <td><?= htmlspecialchars($dado['geracao_relatorios']) ?></td>
                                        <td><?= htmlspecialchars($dado['agendamento_visitas']) ?></td>
                                        <td><?= htmlspecialchars($dado['alertas_prioritarios']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="19" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery e DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inicializa o DataTables
        $(document).ready(function() {
            $('#dataTable').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
                }
            });
        });
    </script>
</body>
</html>
