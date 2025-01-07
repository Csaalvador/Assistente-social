<?php
require '../system/connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitiza o ID para evitar SQL Injection

    try {
        // Prepara e executa a exclusão
        $sql = "DELETE FROM CadastroAssistenteSocial WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../pages/alertasPrioritarios.php?msg=Alerta excluído com sucesso");
            exit();
        } else {
            header("Location: ../pages/alertasPrioritarios.php?msg=Erro ao excluir o alerta");
            exit();
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erro ao excluir o alerta: " . htmlspecialchars($e->getMessage()) . "</div>";
        die();
    }
} else {
    header("Location: ../pages/alertasPrioritarios.php?msg=ID inválido");
    exit();
}
?>
