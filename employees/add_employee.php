<?php

include("../config/db.php");

if(isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $phone_number = $_POST['phone_number'];

    $email = $_POST['email'];

    $position = $_POST['position'];

    $department = $_POST['department'];

    $salary = $_POST['salary'];

    $hire_date = $_POST['hire_date'];

    $employee_status = $_POST['employee_status'];


    // ============================================
    // INSERT INTO EMPLOYEE TABLE
    // ============================================

    $query = "

    INSERT INTO Employee (

        first_name,
        last_name,
        position,
        department,
        salary,
        hire_date,
        email,
        employee_status

    )

    VALUES (

        '$first_name',
        '$last_name',
        '$position',
        '$department',
        '$salary',
        '$hire_date',
        '$email',
        '$employee_status'

    )

    ";

    mysqli_query($conn, $query);


    // ============================================
    // GET LAST INSERTED EMPLOYEE ID
    // ============================================

    $employee_id = mysqli_insert_id($conn);


    // ============================================
    // INSERT PHONE NUMBER
    // ============================================

    $contact_query = "

    INSERT INTO EmployeeContact (

        employee_id,
        phone_number

    )

    VALUES (

        '$employee_id',
        '$phone_number'

    )

    ";

    mysqli_query($conn, $contact_query);


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

                    <input
                        type="text"
                        name="first_name"
                        class="form-control"
                        required
                    >

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        class="form-control"
                        required
                    >

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Phone Number
                </label>

                <input
                    type="text"
                    name="phone_number"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Position
                </label>

                <input
                    type="text"
                    name="position"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Department
                </label>

                <input
                    type="text"
                    name="department"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Salary
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="salary"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Hire Date
                </label>

                <input
                    type="date"
                    name="hire_date"
                    class="form-control"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Employee Status
                </label>

                <select
                    name="employee_status"
                    class="form-control"
                >

                    <option value="Active">
                        Active
                    </option>

                    <option value="Inactive">
                        Inactive
                    </option>

                </select>

            </div>

            <button
                type="submit"
                name="submit"
                class="btn btn-success"
            >
                Save Employee
            </button>

            <a
                href="view_employees.php"
                class="btn btn-secondary"
            >
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>