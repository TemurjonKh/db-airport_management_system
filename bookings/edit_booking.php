<?php

include("../config/db.php");

$id = $_GET['id'];


// ============================================
// GET CURRENT TICKET DATA
// ============================================

$query = "

SELECT *
FROM Ticket
WHERE ticket_id = $id

";

$result = mysqli_query($conn, $query);

$ticket = mysqli_fetch_assoc($result);


// ============================================
// UPDATE TICKET
// ============================================

if(isset($_POST['update'])) {

    $customer_id = $_POST['customer_id'];

    $flight_id = $_POST['flight_id'];

    $ticket_class = $_POST['ticket_class'];

    $seat_number = $_POST['seat_number'];

    $boarding_gate = $_POST['boarding_gate'];

    $boarding_time = $_POST['boarding_time'];

    $baggage_allowance = $_POST['baggage_allowance'];

    $payment_status = $_POST['payment_status'];


    $update = "

    UPDATE Ticket SET

        customer_id = '$customer_id',

        flight_id = '$flight_id',

        ticket_class = '$ticket_class',

        seat_number = '$seat_number',

        boarding_gate = '$boarding_gate',

        boarding_time = '$boarding_time',

        baggage_allowance = '$baggage_allowance',

        payment_status = '$payment_status'

    WHERE ticket_id = $id

    ";

    mysqli_query($conn, $update);

    header("Location: view_tickets.php");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Ticket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Edit Ticket
        </h2>

        <form method="POST">

            <input
                type="number"
                name="customer_id"
                class="form-control mb-3"
                value="<?php echo $ticket['customer_id']; ?>"
                required
            >

            <input
                type="number"
                name="flight_id"
                class="form-control mb-3"
                value="<?php echo $ticket['flight_id']; ?>"
                required
            >

            <select
                name="ticket_class"
                class="form-control mb-3"
            >

                <option value="Economy"
                    <?php if($ticket['ticket_class'] == 'Economy') echo 'selected'; ?>>
                    Economy
                </option>

                <option value="Business"
                    <?php if($ticket['ticket_class'] == 'Business') echo 'selected'; ?>>
                    Business
                </option>

                <option value="First"
                    <?php if($ticket['ticket_class'] == 'First') echo 'selected'; ?>>
                    First
                </option>

            </select>

            <input
                type="text"
                name="seat_number"
                class="form-control mb-3"
                value="<?php echo $ticket['seat_number']; ?>"
            >

            <input
                type="text"
                name="boarding_gate"
                class="form-control mb-3"
                value="<?php echo $ticket['boarding_gate']; ?>"
            >

            <input
                type="datetime-local"
                name="boarding_time"
                class="form-control mb-3"
                value="<?php echo date('Y-m-d\TH:i', strtotime($ticket['boarding_time'])); ?>"
            >

            <input
                type="number"
                name="baggage_allowance"
                class="form-control mb-3"
                value="<?php echo $ticket['baggage_allowance']; ?>"
            >

            <select
                name="payment_status"
                class="form-control mb-3"
            >

                <option value="Pending"
                    <?php if($ticket['payment_status'] == 'Pending') echo 'selected'; ?>>
                    Pending
                </option>

                <option value="Paid"
                    <?php if($ticket['payment_status'] == 'Paid') echo 'selected'; ?>>
                    Paid
                </option>

                <option value="Refunded"
                    <?php if($ticket['payment_status'] == 'Refunded') echo 'selected'; ?>>
                    Refunded
                </option>

            </select>

            <button
                type="submit"
                name="update"
                class="btn btn-success"
            >
                Update Ticket
            </button>

            <a
                href="view_tickets.php"
                class="btn btn-secondary"
            >
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>