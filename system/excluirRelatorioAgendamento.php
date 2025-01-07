<?php
require '../system/connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitiza o ID

    try {
        $sql = "DELETE FROM CadastroAssistenteSocial WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona com mensagem de sucesso
        header("Location: ../pages/agendamentos.php?status=sucesso");
        exit;
    } catch (PDOException $e) {
        // Redireciona com mensagem de erro
        header("Location: ../pages/agendamentos.php?status=erro&mensagem=" . urlencode($e->getMessage()));
        exit;
    }
} else {
    // Redireciona se o ID não for fornecido
    header("Location: ../pages/agendamentos.php?status=erro&mensagem=ID inválido");
    exit;
}
