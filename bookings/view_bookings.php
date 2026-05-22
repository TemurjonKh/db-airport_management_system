<?php

include("../config/db.php");

$query = "

SELECT

    Ticket.ticket_id,

    Customer.first_name,
    Customer.last_name,

    Flight.flight_number,

    Ticket.ticket_class,

    Ticket.seat_number,

    Ticket.boarding_gate,

    Ticket.boarding_time,

    Ticket.baggage_allowance,

    Ticket.payment_status,

    Ticket.booking_date

FROM Ticket

JOIN Customer
ON Ticket.customer_id = Customer.customer_id

JOIN Flight
ON Ticket.flight_id = Flight.flight_id

";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tickets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Tickets Management
        </h1>

        <a href="add_ticket.php"
           class="btn btn-primary">

            Add Ticket

        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Customer</th>
            <th>Flight</th>
            <th>Class</th>
            <th>Seat</th>
            <th>Gate</th>
            <th>Boarding Time</th>
            <th>Baggage</th>
            <th>Payment</th>
            <th>Booking Date</th>
            <th>Actions</th>

        </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $row['ticket_id']; ?>
            </td>

            <td>
                <?php echo $row['first_name']; ?>
                <?php echo $row['last_name']; ?>
            </td>

            <td>
                <?php echo $row['flight_number']; ?>
            </td>

            <td>
                <?php echo $row['ticket_class']; ?>
            </td>

            <td>
                <?php echo $row['seat_number']; ?>
            </td>

            <td>
                <?php echo $row['boarding_gate']; ?>
            </td>

            <td>
                <?php echo $row['boarding_time']; ?>
            </td>

            <td>
                <?php echo $row['baggage_allowance']; ?> KG
            </td>

            <td>
                <?php echo $row['payment_status']; ?>
            </td>

            <td>
                <?php echo $row['booking_date']; ?>
            </td>
            <td>

                <a
                    href="edit_ticket.php?id=<?php echo $row['ticket_id']; ?>"
                    class="btn btn-warning btn-sm"
                >
                    Edit
                </a>

                <a
                    href="delete_ticket.php?id=<?php echo $row['ticket_id']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this ticket?');"
                >
                Delete
                </a>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>