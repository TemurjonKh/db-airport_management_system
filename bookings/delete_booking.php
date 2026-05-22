<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "

DELETE FROM Ticket
WHERE ticket_id = $id

";

mysqli_query($conn, $query);

header("Location: view_tickets.php");

?>