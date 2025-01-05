<?php
header('Content-Type: application/json');

try {
    // Configurações do banco de dados
    $host = 'localhost';
    $dbname = 'assistentesocial';
    $username = 'root';
    $password = '';

    // Conexão com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para contar os alertas prioritários
    $query = $conn->query('SELECT COUNT(alertas_prioritarios) as total FROM cadastroassistentesocial WHERE alertas_prioritarios IS NOT NULL AND alertas_prioritarios != ""');
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Retorna o total de alertas prioritários no formato JSON
    if ($result && isset($result['total'])) {
        echo json_encode(['totalAlertasPrioritarios' => $result['total']]);
    } else {
        echo json_encode(['totalAlertasPrioritarios' => 0, 'error' => 'Nenhum dado encontrado']);
    }
} catch (Exception $e) {
    // Retorna erro no formato JSON caso ocorra uma exceção
    echo json_encode(['error' => $e->getMessage()]);
}

exit;
?>
