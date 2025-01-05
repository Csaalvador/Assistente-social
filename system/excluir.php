<?php
require 'connect.php';

if (isset($_GET['id'])) {
    try {
        // Deletar o relatório pelo ID
        $sql = "DELETE FROM CadastroAssistenteSocial WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $_GET['id']]);

        header("Location: ../pages/relatorios.php?msg=Relatório excluído com sucesso!");
        exit();
    } catch (PDOException $e) {
        header("Location:  ../pages/relatorios.php?msg=Erro ao excluir o relatório: " . $e->getMessage());
        exit();
    }
} else {
    header("Location:  ../pages/relatorios.php?msg=ID inválido para exclusão!");
    exit();
}
