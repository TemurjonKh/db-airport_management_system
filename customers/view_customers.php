<?php

include("../config/db.php");

$query = "SELECT * FROM Customer";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Customers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Customers Management
        </h1>

        <a href="add_customer.php"
           class="btn btn-primary">

            Add Customer

        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Passport</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Loyalty Points</th>

        </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $row['customer_id']; ?>
            </td>

            <td>
                <?php echo $row['passport_number']; ?>
            </td>

            <td>
                <?php echo $row['first_name']; ?>
                <?php echo $row['last_name']; ?>
            </td>

            <td>
                <?php echo $row['gender']; ?>
            </td>

            <td>
                <?php echo $row['nationality']; ?>
            </td>

            <td>
                <?php echo $row['email']; ?>
            </td>

            <td>
                <?php echo $row['phone_number']; ?>
            </td>

            <td>
                <?php echo $row['loyalty_points']; ?>
            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>