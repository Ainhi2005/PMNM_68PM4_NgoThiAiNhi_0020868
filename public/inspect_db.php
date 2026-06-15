<?php
require_once '../app/core/DB.php';
$db = new ConnectDB();
$conn = $db->connect();

$tablesQuery = $conn->query("SHOW TABLES");
$tables = $tablesQuery->fetchAll(PDO::FETCH_COLUMN);

$result = ['tables' => $tables, 'schemas' => []];

foreach ($tables as $table) {
    $schemaQuery = $conn->query("DESCRIBE " . $table);
    $result['schemas'][$table] = $schemaQuery->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
