<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: auth/login.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Airport Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold">

                Welcome,
                <?php echo $_SESSION['full_name']; ?>

            </h2>

            <p class="text-muted">

                Role:
                <?php echo $_SESSION['role']; ?>

            </p>

        </div>

        <a href="auth/logout.php"
           class="btn btn-danger">

            Logout

        </a>

    </div>

    <!-- TITLE -->

    <h1 class="text-center mb-5 fw-bold">

        ✈ Airport Management System

    </h1>

    <!-- MODULES -->

    <div class="row">

        <!-- FLIGHTS -->

        <div class="col-md-4 mb-4">

            <a href="flights/view_flights.php"
               class="btn btn-dark w-100 p-4">

                Flights Module

            </a>

        </div>

        <!-- BOOKINGS -->

        <div class="col-md-4 mb-4">

            <a href="bookings/view_bookings.php"
               class="btn btn-danger w-100 p-4">

                Bookings Module

            </a>

        </div>

        <!-- CUSTOMER ACCESS -->

        <?php if($_SESSION['role'] != 'Customer') { ?>

        <!-- AIRLINES -->

        <div class="col-md-4 mb-4">

            <a href="airlines/view_airlines.php"
               class="btn btn-primary w-100 p-4">

                Airlines Module

            </a>

        </div>

        <!-- AIRPLANES -->

        <div class="col-md-4 mb-4">

            <a href="airplanes/view_airplanes.php"
               class="btn btn-success w-100 p-4">

                Airplanes Module

            </a>

        </div>

        <!-- CUSTOMERS -->

        <div class="col-md-4 mb-4">

            <a href="customers/view_customers.php"
               class="btn btn-warning w-100 p-4">

                Customers Module

            </a>

        </div>

        <?php } ?>

        <!-- ADMIN + MANAGER ONLY -->

        <?php

        if(
            $_SESSION['role'] == 'Admin'
            ||
            $_SESSION['role'] == 'Manager'
        ) {

        ?>

        <!-- EMPLOYEES -->

        <div class="col-md-4 mb-4">

            <a href="employees/view_employees.php"
               class="btn btn-secondary w-100 p-4">

                Employees Module

            </a>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>