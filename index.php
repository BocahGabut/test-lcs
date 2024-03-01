<?php

header("Content-Type: application/json");

$request = $_GET['request'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'check-tickets':
        if ($method === 'GET') {
            include './controller/checkStatusTicket.php';
            return checkTickets();
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
        }
        break;
    case 'update-tickets':
        if ($method === 'GET') {
            include './controller/updateStatusTicket.php';
            return updateStatusTicket();
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}