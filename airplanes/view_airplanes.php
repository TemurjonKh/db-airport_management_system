<?php

include("../config/db.php");

$query = "
    SELECT
        Airplane.airplane_id,
        Airplane.registration_number,
        Airplane.manufacture_year,
        Airplane.airplane_status,
        Airplane.current_airport,
        Airplane.total_flight_hours,

        Model.model_name,

        Airline.airline_name

    FROM Airplane

    JOIN Model
    ON Airplane.model_id = Model.model_id

    JOIN Airline
    ON Airplane.airline_id = Airline.airline_id
";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Airplanes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Airplanes Management
        </h1>

        <a href="add_airplane.php"
           class="btn btn-primary">

            Add Airplane

        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Registration</th>
            <th>Model</th>
            <th>Airline</th>
            <th>Year</th>
            <th>Status</th>
            <th>Current Airport</th>
            <th>Flight Hours</th>

        </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $row['airplane_id']; ?>
            </td>

            <td>
                <?php echo $row['registration_number']; ?>
            </td>

            <td>
                <?php echo $row['model_name']; ?>
            </td>

            <td>
                <?php echo $row['airline_name']; ?>
            </td>

            <td>
                <?php echo $row['manufacture_year']; ?>
            </td>

            <td>
                <?php echo $row['airplane_status']; ?>
            </td>

            <td>
                <?php echo $row['current_airport']; ?>
            </td>

            <td>
                <?php echo $row['total_flight_hours']; ?>
            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>