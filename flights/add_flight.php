<?php

include("../config/db.php");

$airline_query = "SELECT * FROM Airline";
$airline_result = mysqli_query($conn, $airline_query);

$airplane_query = "SELECT * FROM Airplane";
$airplane_result = mysqli_query($conn, $airplane_query);

if(isset($_POST['submit'])){

    $flight_number = $_POST['flight_number'];
    $airline_id = $_POST['airline_id'];
    $airplane_id = $_POST['airplane_id'];

    $departure_airport = $_POST['departure_airport'];
    $arrival_airport = $_POST['arrival_airport'];

    $departure_datetime = $_POST['departure_datetime'];
    $arrival_datetime = $_POST['arrival_datetime'];

    $terminal = $_POST['terminal'];
    $gate = $_POST['gate'];

    $flight_status = $_POST['flight_status'];

    $ticket_price = $_POST['ticket_price'];

    $available_seats = $_POST['available_seats'];

    $query = "

    INSERT INTO Flight (

        flight_number,
        airline_id,
        airplane_id,

        departure_airport,
        arrival_airport,

        departure_datetime,
        arrival_datetime,

        terminal,
        gate,

        flight_status,

        ticket_price,

        available_seats

    )

    VALUES (

        '$flight_number',
        '$airline_id',
        '$airplane_id',

        '$departure_airport',
        '$arrival_airport',

        '$departure_datetime',
        '$arrival_datetime',

        '$terminal',
        '$gate',

        '$flight_status',

        '$ticket_price',

        '$available_seats'
    )

    ";

    mysqli_query($conn, $query);

    header("Location: view_flights.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Flight</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Flight
        </h1>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Flight Number
                </label>

                <input type="text"
                       name="flight_number"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Airline
                </label>

                <select name="airline_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Airline
                    </option>

                    <?php while($airline = mysqli_fetch_assoc($airline_result)) { ?>

                    <option value="<?php echo $airline['airline_id']; ?>">

                        <?php echo $airline['airline_name']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Airplane
                </label>

                <select name="airplane_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Airplane
                    </option>

                    <?php while($airplane = mysqli_fetch_assoc($airplane_result)) { ?>

                    <option value="<?php echo $airplane['airplane_id']; ?>">

                        <?php echo $airplane['registration_number']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Departure Airport
                </label>

                <input type="text"
                       name="departure_airport"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Arrival Airport
                </label>

                <input type="text"
                       name="arrival_airport"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Departure Date & Time
                </label>

                <input type="datetime-local"
                       name="departure_datetime"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Arrival Date & Time
                </label>

                <input type="datetime-local"
                       name="arrival_datetime"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Terminal
                </label>

                <input type="text"
                       name="terminal"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Gate
                </label>

                <input type="text"
                       name="gate"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Flight Status
                </label>

                <select name="flight_status"
                        class="form-control">

                    <option value="Scheduled">
                        Scheduled
                    </option>

                    <option value="Delayed">
                        Delayed
                    </option>

                    <option value="Cancelled">
                        Cancelled
                    </option>

                    <option value="Completed">
                        Completed
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Ticket Price
                </label>

                <input type="number"
                       step="0.01"
                       name="ticket_price"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Available Seats
                </label>

                <input type="number"
                       name="available_seats"
                       class="form-control">

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Flight

            </button>

            <a href="view_flights.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>