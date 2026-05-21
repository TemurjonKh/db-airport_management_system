<?php

include("../config/db.php");

if(isset($_POST['submit'])){

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $gender = $_POST['gender'];

    $date_of_birth = $_POST['date_of_birth'];

    $phone_number = $_POST['phone_number'];

    $email = $_POST['email'];

    $address = $_POST['address'];

    $position = $_POST['position'];

    $department = $_POST['department'];

    $salary = $_POST['salary'];

    $hire_date = $_POST['hire_date'];

    $employee_status = $_POST['employee_status'];

    $query = "

    INSERT INTO Employee (

        first_name,
        last_name,

        gender,

        date_of_birth,

        phone_number,

        email,

        address,

        position,

        department,

        salary,

        hire_date,

        employee_status

    )

    VALUES (

        '$first_name',
        '$last_name',

        '$gender',

        '$date_of_birth',

        '$phone_number',

        '$email',

        '$address',

        '$position',

        '$department',

        '$salary',

        '$hire_date',

        '$employee_status'
    )

    ";

    mysqli_query($conn, $query);

    header("Location: view_employees.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="mb-4">
            Add Employee
        </h1>

        <form method="POST">

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
                    Position
                </label>

                <input type="text"
                       name="position"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Department
                </label>

                <input type="text"
                       name="department"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Salary
                </label>

                <input type="number"
                       step="0.01"
                       name="salary"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Hire Date
                </label>

                <input type="date"
                       name="hire_date"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Employee Status
                </label>

                <select name="employee_status"
                        class="form-control">

                    <option value="Active">
                        Active
                    </option>

                    <option value="On Leave">
                        On Leave
                    </option>

                    <option value="Retired">
                        Retired
                    </option>

                </select>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-success">

                Save Employee

            </button>

            <a href="view_employees.php"
               class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

</body>
</html>