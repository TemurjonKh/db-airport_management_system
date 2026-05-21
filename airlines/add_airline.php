<?php

include("../config/db.php");

if(isset($_POST['submit'])){

    $airline_name = $_POST['airline_name'];
    $airline_code = $_POST['airline_code'];
    $country = $_POST['country'];
    $headquarters = $_POST['headquarters'];
    $founded_year = $_POST['founded_year'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $total_airplanes = $_POST['total_airplanes'];

    $query = "
        INSERT INTO Airline (
            airline_name,
            airline_code,
            country,
            headquarters,
            founded_year,
            contact_number,
            email,
            website,
            total_airplanes
        )

        VALUES (
            '$airline_name',
            '$airline_code',
            '$country',
            '$headquarters',
            '$founded_year',
            '$contact_number',
            '$email',
            '$website',
            '$total_airplanes'
        )
    ";

    mysqli_query($conn, $query);

    header("Location: view_airlines.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Airline</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Airline
        </h1>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Airline Name</label>

                <input type="text"
                       name="airline_name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Airline Code</label>

                <input type="text"
                       name="airline_code"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>

                <input type="text"
                       name="country"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Headquarters</label>

                <input type="text"
                       name="headquarters"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Founded Year</label>

                <input type="number"
                       name="founded_year"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Number</label>

                <input type="text"
                       name="contact_number"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input type="email"
                       name="email"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Website</label>

                <input type="text"
                       name="website"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Total Airplanes</label>

                <input type="number"
                       name="total_airplanes"
                       class="form-control">
            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Airline

            </button>

            <a href="view_airlines.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>