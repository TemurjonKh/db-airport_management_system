<?php

include("../config/db.php");

if(isset($_POST['submit'])){

    $passport_number = $_POST['passport_number'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $gender = $_POST['gender'];

    $nationality = $_POST['nationality'];

    $date_of_birth = $_POST['date_of_birth'];

    $phone_number = $_POST['phone_number'];

    $email = $_POST['email'];

    $address = $_POST['address'];

    $emergency_contact = $_POST['emergency_contact'];

    $loyalty_points = $_POST['loyalty_points'];

    $query = "

    INSERT INTO Customer (

        passport_number,

        first_name,
        last_name,

        gender,

        nationality,

        date_of_birth,

        phone_number,

        email,

        address,

        emergency_contact,

        loyalty_points

    )

    VALUES (

        '$passport_number',

        '$first_name',
        '$last_name',

        '$gender',

        '$nationality',

        '$date_of_birth',

        '$phone_number',

        '$email',

        '$address',

        '$emergency_contact',

        '$loyalty_points'
    )

    ";

    mysqli_query($conn, $query);

    header("Location: view_customers.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Customer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Customer
        </h1>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Passport Number
                </label>

                <input type="text"
                       name="passport_number"
                       class="form-control"
                       required>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        First Name
                    </label>

                    <input type="text"
                           name="first_name"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Last Name
                    </label>

                    <input type="text"
                           name="last_name"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Gender
                </label>

                <select name="gender"
                        class="form-control">

                    <option value="Male">
                        Male
                    </option>

                    <option value="Female">
                        Female
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nationality
                </label>

                <input type="text"
                       name="nationality"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Date of Birth
                </label>

                <input type="date"
                       name="date_of_birth"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Phone Number
                </label>

                <input type="text"
                       name="phone_number"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Address
                </label>

                <textarea name="address"
                          class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Emergency Contact
                </label>

                <input type="text"
                       name="emergency_contact"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Loyalty Points
                </label>

                <input type="number"
                       name="loyalty_points"
                       class="form-control"
                       value="0">

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Customer

            </button>

            <a href="view_customers.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>