<?php
include_once('./config/database.php');

function generateTicketCode($prefix_tiket)
{
    $randomAlphaNumeric = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 7);
    return $prefix_tiket . $randomAlphaNumeric;
}

if ($argc != 3) {
    echo "Usage: php generate-ticket.php {event_id} {total_ticket}\n";
    exit(1);
}

$eventId = $argv[1];
$totalTicket = $argv[2];
$prefixTiket = 'LCS';

try {
    for ($i = 0; $i < $totalTicket; $i++) {
        $ticketCode = generateTicketCode($prefixTiket);

        $result = mysqli_query($db, "INSERT INTO tickets(event_id, ticket_code) VALUES('$eventId', '$ticketCode')");

        if ($result) {
            echo "Ticket code {$ticketCode} successfully inserted for event {$eventId}.\n";
        } else {
            echo "Error inserting ticket code for event {$eventId}: " . mysqli_error($db) . "\n";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
