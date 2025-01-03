<?php
require 'connect.php';

try {
    // SQL para contar os registros da tabela cadastroassistentesocial
    $sql = "SELECT COUNT(*) FROM cadastroassistentesocial"; // Tabela correta
    $stmt = $pdo->query($sql);
    $totalRelatorios = $stmt->fetchColumn(); // Pega o valor retornado pela contagem

    // Retorna o valor como JSON
    echo json_encode(['totalRelatorios' => $totalRelatorios]);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao consultar os relatórios: ' . $e->getMessage()]);
}
?>
