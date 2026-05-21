<?php

include("../config/db.php");

$query = "

SELECT

    Flight.flight_id,
    Flight.flight_number,

    Airline.airline_name,

    Airplane.registration_number,

    Flight.departure_airport,
    Flight.arrival_airport,

    Flight.departure_datetime,
    Flight.arrival_datetime,

    Flight.flight_status,

    Flight.ticket_price,

    Flight.available_seats

FROM Flight

JOIN Airline
ON Flight.airline_id = Airline.airline_id

JOIN Airplane
ON Flight.airplane_id = Airplane.airplane_id

";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Flights</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Flights Management
        </h1>

        <a href="add_flight.php"
           class="btn btn-primary">

            Add Flight

        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Flight Number</th>
            <th>Airline</th>
            <th>Airplane</th>
            <th>Departure</th>
            <th>Arrival</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Status</th>
            <th>Price</th>
            <th>Seats</th>

        </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $row['flight_id']; ?>
            </td>

            <td>
                <?php echo $row['flight_number']; ?>
            </td>

            <td>
                <?php echo $row['airline_name']; ?>
            </td>

            <td>
                <?php echo $row['registration_number']; ?>
            </td>

            <td>
                <?php echo $row['departure_airport']; ?>
            </td>

            <td>
                <?php echo $row['arrival_airport']; ?>
            </td>

            <td>
                <?php echo $row['departure_datetime']; ?>
            </td>

            <td>
                <?php echo $row['arrival_datetime']; ?>
            </td>

            <td>
                <?php echo $row['flight_status']; ?>
            </td>

            <td>
                $<?php echo $row['ticket_price']; ?>
            </td>

            <td>
                <?php echo $row['available_seats']; ?>
            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>