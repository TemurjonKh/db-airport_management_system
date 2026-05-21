<?php

include("../config/db.php");

if(isset($_POST['submit'])){

    $full_name = $_POST['full_name'];

    $email = $_POST['email'];

    $phone_number = $_POST['phone_number'];

    $password = $_POST['password'];

    $role = "Customer";

    $query = "

    INSERT INTO Users (

        full_name,
        email,
        phone_number,
        password,
        role

    )

    VALUES (

        '$full_name',
        '$email',
        '$phone_number',
        '$password',
        '$role'
    )

    ";

    mysqli_query($conn, $query);

    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow p-4">

                <h2 class="mb-4 text-center">

                    Create Account

                </h2>

                <form method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input type="text"
                               name="full_name"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

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
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <button type="submit"
                            name="submit"
                            class="btn btn-success w-100">

                        Register

                    </button>

                </form>

                <div class="text-center mt-3">

                    <a href="login.php">

                        Already have account?

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>