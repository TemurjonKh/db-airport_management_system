<?php

include("../config/db.php");

$customer_query = "SELECT * FROM Customer";
$customer_result = mysqli_query($conn, $customer_query);

$flight_query = "SELECT * FROM Flight";
$flight_result = mysqli_query($conn, $flight_query);

if(isset($_POST['submit'])){

    $customer_id = $_POST['customer_id'];

    $flight_id = $_POST['flight_id'];

    $ticket_class = $_POST['ticket_class'];

    $seat_number = $_POST['seat_number'];

    $boarding_gate = $_POST['boarding_gate'];

    $boarding_time = $_POST['boarding_time'];

    $baggage_allowance = $_POST['baggage_allowance'];

    $payment_status = $_POST['payment_status'];

    $booking_date = $_POST['booking_date'];

    $query = "

    INSERT INTO Ticket (

        customer_id,
        flight_id,

        ticket_class,

        seat_number,

        boarding_gate,

        boarding_time,

        baggage_allowance,

        payment_status,

        booking_date

    )

    VALUES (

        '$customer_id',
        '$flight_id',

        '$ticket_class',

        '$seat_number',

        '$boarding_gate',

        '$boarding_time',

        '$baggage_allowance',

        '$payment_status',

        '$booking_date'
    )

    ";

    mysqli_query($conn, $query);

    header("Location: view_tickets.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Ticket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Ticket
        </h1>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Customer
                </label>

                <select name="customer_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Customer
                    </option>

                    <?php while($customer = mysqli_fetch_assoc($customer_result)) { ?>

                    <option value="<?php echo $customer['customer_id']; ?>">

                        <?php echo $customer['first_name']; ?>
                        <?php echo $customer['last_name']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Flight
                </label>

                <select name="flight_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Flight
                    </option>

                    <?php while($flight = mysqli_fetch_assoc($flight_result)) { ?>

                    <option value="<?php echo $flight['flight_id']; ?>">

                        <?php echo $flight['flight_number']; ?>

                    </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Ticket Class
                </label>

                <select name="ticket_class"
                        class="form-control">

                    <option value="Economy">
                        Economy
                    </option>

                    <option value="Business">
                        Business
                    </option>

                    <option value="First Class">
                        First Class
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Seat Number
                </label>

                <input type="text"
                       name="seat_number"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Boarding Gate
                </label>

                <input type="text"
                       name="boarding_gate"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Boarding Time
                </label>

                <input type="datetime-local"
                       name="boarding_time"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Baggage Allowance (KG)
                </label>

                <input type="number"
                       name="baggage_allowance"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Payment Status
                </label>

                <select name="payment_status"
                        class="form-control">

                    <option value="Paid">
                        Paid
                    </option>

                    <option value="Pending">
                        Pending
                    </option>

                    <option value="Refunded">
                        Refunded
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Booking Date
                </label>

                <input type="date"
                       name="booking_date"
                       class="form-control">

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Ticket

            </button>

            <a href="view_tickets.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>