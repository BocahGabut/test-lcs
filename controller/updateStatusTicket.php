<?php 

function updateStatusTicket() {
    include_once('./config/database.php');

    try {
        if (isset($_GET['event_id'], $_GET['ticket_code'],$_GET['status'])) {
            $eventId = $_GET['event_id'];
            $ticketCode = $_GET['ticket_code'];
            $status = $_GET['status'];

            if ($status !== 'claimed' && $status !== 'available') {
                http_response_code(400); 
                echo json_encode(['message' => 'Invalid status value.', 'data' => null]);
                exit;
            }

            $checkData = $db->query("SELECT ticket_code,status FROM tickets WHERE event_id = '$eventId' AND ticket_code = '$ticketCode'");
            if ($checkData->num_rows > 0) {
                $updateData = $db->query("UPDATE tickets SET status = '$status' WHERE event_id = '$eventId' AND ticket_code = '$ticketCode'");
                if($updateData){
                    $fetchData = $db->query("SELECT ticket_code,status,updated_at FROM tickets WHERE event_id = '$eventId' AND ticket_code = '$ticketCode'");
                    $data = $fetchData->fetch_object();

                    http_response_code(200);
                    echo json_encode([
                        'message' => 'Update data success!!!',
                        'data' => $data
                    ]);
                }else{
                    http_response_code(500);
                    echo json_encode([
                        'message' => 'Update data failed!!!',
                        'data' => null
                    ]);
                }
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