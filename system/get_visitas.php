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

    // Consulta para contar os agendamentos do mês atual
    $query = $conn->query('SELECT COUNT(agendamento_visitas) as total FROM cadastroassistentesocial WHERE agendamento_visitas IS NOT NULL AND MONTH(agendamento_visitas) = MONTH(CURRENT_DATE()) AND YEAR(agendamento_visitas) = YEAR(CURRENT_DATE())');
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Retorna o total de agendamentos no formato JSON
    if ($result && isset($result['total'])) {
        echo json_encode(['totalVisitas' => $result['total']]);
    } else {
        echo json_encode(['totalVisitas' => 0, 'error' => 'Nenhum dado encontrado']);
    }
} catch (Exception $e) {
    // Retorna erro no formato JSON caso ocorra uma exceção
    echo json_encode(['error' => $e->getMessage()]);
}

exit;
?>
