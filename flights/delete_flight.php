<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "

DELETE FROM Flight
WHERE flight_id = $id

";

mysqli_query($conn, $query);

header("Location: view_flights.php");

?>