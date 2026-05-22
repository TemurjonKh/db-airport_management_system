<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "

DELETE FROM Airline
WHERE airline_id = $id

";

mysqli_query($conn, $query);

header("Location: view_airlines.php");

?>