<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Verificar se o CPF já existe no banco
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM cadastroassistentesocial WHERE cpf = :cpf");
        $stmt->execute([':cpf' => $_POST['cpf']]);
        if ($stmt->fetchColumn() > 0) {
            die("Erro: CPF já cadastrado.");
        }

        // SQL para inserir os dados na tabela
        $sql = "INSERT INTO cadastroassistentesocial (nome, cpf, rg, endereco, telefone, renda_familiar, composicao_familiar, 
                beneficios_recebidos, situacao_habitacional, nivel_escolaridade, situacao_emprego, historico_atendimentos, 
                notas_assistentes_social, comprovante_renda, comprovante_residencia, geracao_relatorios, agendamento_visitas, alertas_prioritarios)
                VALUES (:nome, :cpf, :rg, :endereco, :telefone, :renda_familiar, :composicao_familiar, 
                :beneficios_recebidos, :situacao_habitacional, :nivel_escolaridade, :situacao_emprego, :historico_atendimentos, 
                :notas_assistentes_social, :comprovante_renda, :comprovante_residencia, :geracao_relatorios, :agendamento_visitas, :alertas_prioritarios)";
        
        // Preparar a consulta
        $stmt = $pdo->prepare($sql);

        // Executar a consulta com os valores do formulário
        $stmt->execute([
            ':nome' => htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8'),
            ':cpf' => htmlspecialchars($_POST['cpf'], ENT_QUOTES, 'UTF-8'),
            ':rg' => htmlspecialchars($_POST['rg'], ENT_QUOTES, 'UTF-8'),
            ':endereco' => htmlspecialchars($_POST['endereco'], ENT_QUOTES, 'UTF-8'),
            ':telefone' => htmlspecialchars($_POST['telefone'], ENT_QUOTES, 'UTF-8'),
            ':renda_familiar' => htmlspecialchars($_POST['renda_familiar'], ENT_QUOTES, 'UTF-8'),
            ':composicao_familiar' => htmlspecialchars($_POST['composicao_familiar'], ENT_QUOTES, 'UTF-8'),
            ':beneficios_recebidos' => htmlspecialchars($_POST['beneficios_recebidos'], ENT_QUOTES, 'UTF-8'),
            ':situacao_habitacional' => htmlspecialchars($_POST['situacao_habitacional'], ENT_QUOTES, 'UTF-8'),
            ':nivel_escolaridade' => htmlspecialchars($_POST['nivel_escolaridade'], ENT_QUOTES, 'UTF-8'),
            ':situacao_emprego' => htmlspecialchars($_POST['situacao_emprego'], ENT_QUOTES, 'UTF-8'),
            ':historico_atendimentos' => htmlspecialchars($_POST['historico_atendimentos'], ENT_QUOTES, 'UTF-8'),
            ':notas_assistentes_social' => htmlspecialchars($_POST['notas_assistentes_social'], ENT_QUOTES, 'UTF-8'),
            ':comprovante_renda' => htmlspecialchars($_POST['comprovante_renda'], ENT_QUOTES, 'UTF-8'),
            ':comprovante_residencia' => htmlspecialchars($_POST['comprovante_residencia'], ENT_QUOTES, 'UTF-8'),
            ':geracao_relatorios' => htmlspecialchars($_POST['geracao_relatorios'], ENT_QUOTES, 'UTF-8'),
            ':agendamento_visitas' => htmlspecialchars($_POST['agendamento_visitas'], ENT_QUOTES, 'UTF-8'),
            ':alertas_prioritarios' => htmlspecialchars($_POST['alertas_prioritarios'], ENT_QUOTES, 'UTF-8')
        ]);

        // Redirecionamento seguro
        header("Location: ../index.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("Erro ao salvar os dados: " . $e->getMessage());
    }
}
?>
