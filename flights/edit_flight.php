<?php

include("../config/db.php");

$id = $_GET['id'];


// ============================================
// GET CURRENT FLIGHT DATA
// ============================================

$query = "

SELECT *
FROM Flight
WHERE flight_id = $id

";

$result = mysqli_query($conn, $query);

$flight = mysqli_fetch_assoc($result);


// ============================================
// UPDATE FLIGHT
// ============================================

if(isset($_POST['update'])) {

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


    $update = "

    UPDATE Flight SET

        flight_number = '$flight_number',

        airline_id = '$airline_id',

        airplane_id = '$airplane_id',

        departure_airport = '$departure_airport',

        arrival_airport = '$arrival_airport',

        departure_datetime = '$departure_datetime',

        arrival_datetime = '$arrival_datetime',

        terminal = '$terminal',

        gate = '$gate',

        flight_status = '$flight_status',

        ticket_price = '$ticket_price',

        available_seats = '$available_seats'

    WHERE flight_id = $id

    ";

    mysqli_query($conn, $update);

    header("Location: view_flights.php");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Flight</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Edit Flight
        </h2>

        <form method="POST">

            <input
                type="text"
                name="flight_number"
                class="form-control mb-3"
                value="<?php echo $flight['flight_number']; ?>"
                required
            >

            <input
                type="number"
                name="airline_id"
                class="form-control mb-3"
                value="<?php echo $flight['airline_id']; ?>"
                required
            >

            <input
                type="number"
                name="airplane_id"
                class="form-control mb-3"
                value="<?php echo $flight['airplane_id']; ?>"
                required
            >

            <input
                type="text"
                name="departure_airport"
                class="form-control mb-3"
                value="<?php echo $flight['departure_airport']; ?>"
                required
            >

            <input
                type="text"
                name="arrival_airport"
                class="form-control mb-3"
                value="<?php echo $flight['arrival_airport']; ?>"
                required
            >

            <input
                type="datetime-local"
                name="departure_datetime"
                class="form-control mb-3"
                value="<?php echo date('Y-m-d\TH:i', strtotime($flight['departure_datetime'])); ?>"
                required
            >

            <input
                type="datetime-local"
                name="arrival_datetime"
                class="form-control mb-3"
                value="<?php echo date('Y-m-d\TH:i', strtotime($flight['arrival_datetime'])); ?>"
                required
            >

            <input
                type="text"
                name="terminal"
                class="form-control mb-3"
                value="<?php echo $flight['terminal']; ?>"
            >

            <input
                type="text"
                name="gate"
                class="form-control mb-3"
                value="<?php echo $flight['gate']; ?>"
            >

            <select
                name="flight_status"
                class="form-control mb-3"
            >

                <option value="Scheduled"
                    <?php if($flight['flight_status'] == 'Scheduled') echo 'selected'; ?>>
                    Scheduled
                </option>

                <option value="Delayed"
                    <?php if($flight['flight_status'] == 'Delayed') echo 'selected'; ?>>
                    Delayed
                </option>

                <option value="Cancelled"
                    <?php if($flight['flight_status'] == 'Cancelled') echo 'selected'; ?>>
                    Cancelled
                </option>

                <option value="Completed"
                    <?php if($flight['flight_status'] == 'Completed') echo 'selected'; ?>>
                    Completed
                </option>

            </select>

            <input
                type="number"
                step="0.01"
                name="ticket_price"
                class="form-control mb-3"
                value="<?php echo $flight['ticket_price']; ?>"
            >

            <input
                type="number"
                name="available_seats"
                class="form-control mb-3"
                value="<?php echo $flight['available_seats']; ?>"
            >

            <button
                type="submit"
                name="update"
                class="btn btn-success"
            >
                Update Flight
            </button>

            <a
                href="view_flights.php"
                class="btn btn-secondary"
            >
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>