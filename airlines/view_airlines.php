<?php

include("../config/db.php");

$query = "SELECT * FROM Airline";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Airlines</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Airlines Management
        </h1>

        <a href="add_airline.php" class="btn btn-primary">
            Add Airline
        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Country</th>
                <th>Headquarters</th>
                <th>Founded</th>
                <th>Total Airplanes</th>
            </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <tr>

                <td>
                    <?php echo $row['airline_id']; ?>
                </td>

                <td>
                    <?php echo $row['airline_name']; ?>
                </td>

                <td>
                    <?php echo $row['airline_code']; ?>
                </td>

                <td>
                    <?php echo $row['country']; ?>
                </td>

                <td>
                    <?php echo $row['headquarters']; ?>
                </td>

                <td>
                    <?php echo $row['founded_year']; ?>
                </td>

                <td>
                    <?php echo $row['total_airplanes']; ?>
                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>