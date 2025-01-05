<?php
require 'connect.php';

if (isset($_GET['id'])) {
    try {
        // Buscar os dados do relatório pelo ID
        $sql = "SELECT * FROM CadastroAssistenteSocial WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $_GET['id']]);
        $relatorio = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$relatorio) {
            echo "Relatório não encontrado!";
            die();
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar o relatório: " . $e->getMessage();
        die();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Atualizar os dados do relatório
        $sql = "UPDATE CadastroAssistenteSocial SET
                nome = :nome,
                cpf = :cpf,
                rg = :rg,
                endereco = :endereco,
                telefone = :telefone,
                renda_familiar = :renda_familiar,
                composicao_familiar = :composicao_familiar,
                beneficios_recebidos = :beneficios_recebidos,
                situacao_habitacional = :situacao_habitacional,
                nivel_escolaridade = :nivel_escolaridade,
                situacao_emprego = :situacao_emprego,
                historico_atendimentos = :historico_atendimentos,
                notas_assistentes_social = :notas_assistentes_social,
                comprovante_renda = :comprovante_renda,
                comprovante_residencia = :comprovante_residencia,
                geracao_relatorios = :geracao_relatorios,
                agendamento_visitas = :agendamento_visitas,
                alertas_prioritarios = :alertas_prioritarios
            WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':cpf' => $_POST['cpf'],
            ':rg' => $_POST['rg'],
            ':endereco' => $_POST['endereco'],
            ':telefone' => $_POST['telefone'],
            ':renda_familiar' => $_POST['renda_familiar'],
            ':composicao_familiar' => $_POST['composicao_familiar'],
            ':beneficios_recebidos' => $_POST['beneficios_recebidos'],
            ':situacao_habitacional' => $_POST['situacao_habitacional'],
            ':nivel_escolaridade' => $_POST['nivel_escolaridade'],
            ':situacao_emprego' => $_POST['situacao_emprego'],
            ':historico_atendimentos' => $_POST['historico_atendimentos'],
            ':notas_assistentes_social' => $_POST['notas_assistentes_social'],
            ':comprovante_renda' => $_POST['comprovante_renda'],
            ':comprovante_residencia' => $_POST['comprovante_residencia'],
            ':geracao_relatorios' => $_POST['geracao_relatorios'],
            ':agendamento_visitas' => $_POST['agendamento_visitas'],
            ':alertas_prioritarios' => $_POST['alertas_prioritarios'],
            ':id' => $_POST['id']
        ]);

        header("Location: ../pages/relatorios.php?msg=Relatório atualizado com sucesso!");
        exit();
    } catch (PDOException $e) {
        $error = "Erro ao atualizar o relatório: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Relatório</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<body class="bg-light">
    <div class="container mt-5">
        <!-- Botão de Voltar (X) -->
        
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Editar Relatório</h1>
        <a href="../pages/relatorios.php" class="btn btn-secondary btn-sm">
            <i class="bi bi-x-circle"></i> Voltar
        </a>
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $relatorio['id'] ?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $relatorio['nome'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $relatorio['cpf'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" value="<?= $relatorio['rg'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $relatorio['endereco'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $relatorio['telefone'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="renda_familiar" class="form-label">Renda Familiar</label>
                        <input type="text" class="form-control" id="renda_familiar" name="renda_familiar" value="<?= $relatorio['renda_familiar'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="composicao_familiar" class="form-label">Composição Familiar</label>
                        <input type="text" class="form-control" id="composicao_familiar" name="composicao_familiar" value="<?= $relatorio['composicao_familiar'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="beneficios_recebidos" class="form-label">Benefícios Recebidos</label>
                        <input type="text" class="form-control" id="beneficios_recebidos" name="beneficios_recebidos" value="<?= $relatorio['beneficios_recebidos'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="situacao_habitacional" class="form-label">Situação Habitacional</label>
                        <input type="text" class="form-control" id="situacao_habitacional" name="situacao_habitacional" value="<?= $relatorio['situacao_habitacional'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nivel_escolaridade" class="form-label">Nível Escolaridade</label>
                        <input type="text" class="form-control" id="nivel_escolaridade" name="nivel_escolaridade" value="<?= $relatorio['nivel_escolaridade'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="situacao_emprego" class="form-label">Situação Emprego</label>
                        <input type="text" class="form-control" id="situacao_emprego" name="situacao_emprego" value="<?= $relatorio['situacao_emprego'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="historico_atendimentos" class="form-label">Histórico de Atendimentos</label>
                        <input type="text" class="form-control" id="historico_atendimentos" name="historico_atendimentos" value="<?= $relatorio['historico_atendimentos'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="notas_assistentes_social" class="form-label">Notas do Assistente Social</label>
                        <input type="text" class="form-control" id="notas_assistentes_social" name="notas_assistentes_social" value="<?= $relatorio['notas_assistentes_social'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="comprovante_renda" class="form-label">Comprovante de Renda</label>
                        <input type="text" class="form-control" id="comprovante_renda" name="comprovante_renda" value="<?= $relatorio['comprovante_renda'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="comprovante_residencia" class="form-label">Comprovante de Residência</label>
                        <input type="text" class="form-control" id="comprovante_residencia" name="comprovante_residencia" value="<?= $relatorio['comprovante_residencia'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="geracao_relatorios" class="form-label">Geração de Relatórios</label>
                        <input type="text" class="form-control" id="geracao_relatorios" name="geracao_relatorios" value="<?= $relatorio['geracao_relatorios'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="agendamento_visitas" class="form-label">Agendamento de Visitas</label>
                        <input type="text" class="form-control" id="agendamento_visitas" name="agendamento_visitas" value="<?= $relatorio['agendamento_visitas'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alertas_prioritarios" class="form-label">Alertas Prioritários</label>
                        <input type="text" class="form-control" id="alertas_prioritarios" name="alertas_prioritarios" value="<?= $relatorio['alertas_prioritarios'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Atualizar Relatório</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
