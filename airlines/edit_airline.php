<?php

include("../config/db.php");

$id = $_GET['id'];


// ============================================
// GET CURRENT AIRLINE DATA
// ============================================

$query = "

SELECT *
FROM Airline
WHERE airline_id = $id

";

$result = mysqli_query($conn, $query);

$airline = mysqli_fetch_assoc($result);


// ============================================
// UPDATE AIRLINE
// ============================================

if(isset($_POST['update'])) {

    $airline_name = $_POST['airline_name'];

    $airline_code = $_POST['airline_code'];

    $country = $_POST['country'];

    $headquarters = $_POST['headquarters'];

    $founded_year = $_POST['founded_year'];

    $contact_number = $_POST['contact_number'];

    $email = $_POST['email'];

    $website = $_POST['website'];

    $total_airplanes = $_POST['total_airplanes'];


    $update = "

    UPDATE Airline SET

        airline_name = '$airline_name',

        airline_code = '$airline_code',

        country = '$country',

        headquarters = '$headquarters',

        founded_year = '$founded_year',

        contact_number = '$contact_number',

        email = '$email',

        website = '$website',

        total_airplanes = '$total_airplanes'

    WHERE airline_id = $id

    ";

    mysqli_query($conn, $update);

    header("Location: view_airlines.php");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Airline</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4">
            Edit Airline
        </h2>

        <form method="POST">

            <input
                type="text"
                name="airline_name"
                class="form-control mb-3"
                value="<?php echo $airline['airline_name']; ?>"
                required
            >

            <input
                type="text"
                name="airline_code"
                class="form-control mb-3"
                value="<?php echo $airline['airline_code']; ?>"
                required
            >

            <input
                type="text"
                name="country"
                class="form-control mb-3"
                value="<?php echo $airline['country']; ?>"
                required
            >

            <input
                type="text"
                name="headquarters"
                class="form-control mb-3"
                value="<?php echo $airline['headquarters']; ?>"
            >

            <input
                type="number"
                name="founded_year"
                class="form-control mb-3"
                value="<?php echo $airline['founded_year']; ?>"
            >

            <input
                type="text"
                name="contact_number"
                class="form-control mb-3"
                value="<?php echo $airline['contact_number']; ?>"
            >

            <input
                type="email"
                name="email"
                class="form-control mb-3"
                value="<?php echo $airline['email']; ?>"
            >

            <input
                type="text"
                name="website"
                class="form-control mb-3"
                value="<?php echo $airline['website']; ?>"
            >

            <input
                type="number"
                name="total_airplanes"
                class="form-control mb-3"
                value="<?php echo $airline['total_airplanes']; ?>"
            >

            <button
                type="submit"
                name="update"
                class="btn btn-success"
            >
                Update Airline
            </button>

            <a
                href="view_airlines.php"
                class="btn btn-secondary"
            >
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>