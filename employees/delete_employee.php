<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "DELETE FROM Employee WHERE employee_id = $id";

mysqli_query($conn, $query);

header("Location: view_employees.php");

?>