<?php
include("config/db.php");

$query = "SELECT 
            Airplane.reg_no,
            Model.model_name,
            Airline.airline_name
          FROM Airplane
          JOIN Model
          ON Airplane.model_no = Model.model_no
          JOIN Airline
          ON Airplane.airline_id = Airline.airline_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Airplanes</title>
</head>
<body>

<h1>Airplanes</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Registration No</th>
        <th>Model</th>
        <th>Airline</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['reg_no']; ?></td>
        <td><?php echo $row['model_name']; ?></td>
        <td><?php echo $row['airline_name']; ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>