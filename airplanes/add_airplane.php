<?php

include("../config/db.php");

$model_query = "SELECT * FROM Model";
$model_result = mysqli_query($conn, $model_query);

$airline_query = "SELECT * FROM Airline";
$airline_result = mysqli_query($conn, $airline_query);

if(isset($_POST['submit'])){

    $registration_number = $_POST['registration_number'];
    $model_id = $_POST['model_id'];
    $airline_id = $_POST['airline_id'];
    $manufacture_year = $_POST['manufacture_year'];
    $airplane_status = $_POST['airplane_status'];
    $current_airport = $_POST['current_airport'];
    $last_maintenance_date = $_POST['last_maintenance_date'];
    $total_flight_hours = $_POST['total_flight_hours'];

    $query = "
        INSERT INTO Airplane (
            registration_number,
            model_id,
            airline_id,
            manufacture_year,
            airplane_status,
            current_airport,
            last_maintenance_date,
            total_flight_hours
        )

        VALUES (
            '$registration_number',
            '$model_id',
            '$airline_id',
            '$manufacture_year',
            '$airplane_status',
            '$current_airport',
            '$last_maintenance_date',
            '$total_flight_hours'
        )
    ";

    mysqli_query($conn, $query);

    header("Location: view_airplanes.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Airplane</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Airplane
        </h1>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Registration Number
                </label>

                <input type="text"
                       name="registration_number"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Model
                </label>

                <select name="model_id"
                        class="form-control"
                        required>

                    <option value="">
                        Select Model
                    </option>

                    <?php while($model = mysqli_fetch_assoc($model_result)) { ?>

                    <option value="<?php echo $model['model_id']; ?>">

                        <?php echo $model['model_name']; ?>

                    </option>

                    <?php } ?>

                </select>

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
                    Manufacture Year
                </label>

                <input type="number"
                       name="manufacture_year"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select name="airplane_status"
                        class="form-control">

                    <option value="Active">
                        Active
                    </option>

                    <option value="Maintenance">
                        Maintenance
                    </option>

                    <option value="Grounded">
                        Grounded
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Current Airport
                </label>

                <input type="text"
                       name="current_airport"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Last Maintenance Date
                </label>

                <input type="date"
                       name="last_maintenance_date"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Total Flight Hours
                </label>

                <input type="number"
                       name="total_flight_hours"
                       class="form-control">

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Airplane

            </button>

            <a href="view_airplanes.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>