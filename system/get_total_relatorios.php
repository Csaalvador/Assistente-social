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

    // Consulta para contar os registros na tabela 'relatorios'
    $query = $conn->query('SELECT COUNT(*) as total FROM cadastroassistentesocial');
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Retorna o total de relatórios no formato JSON
    if ($result && isset($result['total'])) {
        echo json_encode(['totalRelatorios' => $result['total']]);
    } else {
        echo json_encode(['totalRelatorios' => 0, 'error' => 'Nenhum dado encontrado']);
    }
} catch (Exception $e) {
    // Retorna erro no formato JSON caso ocorra uma exceção
    echo json_encode(['error' => $e->getMessage()]);
}

exit;
