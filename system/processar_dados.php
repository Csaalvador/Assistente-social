<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // SQL para inserir os dados na tabela CadastroAssistenteSocial
        $sql = "INSERT INTO CadastroAssistenteSocial (nome, cpf, rg, endereco, telefone, renda_familiar, composicao_familiar, 
                beneficios_recebidos, situacao_habitacional, nivel_escolaridade, situacao_emprego, historico_atendimentos, 
                notas_assistentes_social, comprovante_renda, comprovante_residencia, geracao_relatorios, agendamento_visitas, alertas_prioritarios)
                VALUES (:nome, :cpf, :rg, :endereco, :telefone, :renda_familiar, :composicao_familiar, 
                :beneficios_recebidos, :situacao_habitacional, :nivel_escolaridade, :situacao_emprego, :historico_atendimentos, 
                :notas_assistentes_social, :comprovante_renda, :comprovante_residencia, :geracao_relatorios, :agendamento_visitas, :alertas_prioritarios)";
        
        // Preparar a consulta
        $stmt = $pdo->prepare($sql);
        
        // Executar a consulta com os valores do formulário
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':cpf' => $_POST['cpf'],
            ':rg' => $_POST['rg'],
            ':endereco' => $_POST['endereco'],
            ':telefone' => $_POST['telefone'],
            ':renda_familiar' => $_POST['rendaFamiliar'],
            ':composicao_familiar' => $_POST['composicaoFamiliar'],
            ':beneficios_recebidos' => $_POST['beneficios'],
            ':situacao_habitacional' => $_POST['situacaoHabitacional'],
            ':nivel_escolaridade' => $_POST['nivelEscolaridade'],
            ':situacao_emprego' => $_POST['situacaoEmprego'],
            ':historico_atendimentos' => $_POST['historicoAtendimentos'],
            ':notas_assistentes_social' => $_POST['notasAssistentesSocial'],
            ':comprovante_renda' => $_POST['comprovanteRenda'],
            ':comprovante_residencia' => $_POST['comprovanteResidencia'],
            ':geracao_relatorios' => $_POST['geracaoRelatorios'],
            ':agendamento_visitas' => $_POST['agendamentoVisitas'],
            ':alertas_prioritarios' => $_POST['alertasPrioritarios']
        ]);
        header("Location: ../index.html");

        echo "Dados inseridos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao salvar os dados: " . $e->getMessage();
    }
}
?>
