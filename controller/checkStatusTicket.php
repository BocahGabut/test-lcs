<?php

function checkTickets()
{
    include_once('./config/database.php');

    try {
        if (isset($_GET['event_id'], $_GET['ticket_code'])) {
            $eventId = $_GET['event_id'];
            $ticketCode = $_GET['ticket_code'];

            $getData = $db->query("SELECT ticket_code,status FROM tickets WHERE event_id = '$eventId' AND ticket_code = '$ticketCode'");
            if ($getData->num_rows > 0) {
                $data = $getData->fetch_object();

                http_response_code(200);
                echo json_encode([
                    'message' => 'Fetch data success!!!',
                    'data' => $data
                ]);
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'Data not found.', 'data' => null]);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid or missing data parameters.', 'data' => null]);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}