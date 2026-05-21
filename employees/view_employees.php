<?php

include("../includes/admin_only.php");
include("../config/db.php");

$query = "
SELECT
    employee_id,
    first_name,
    last_name,
    position,
    department,
    salary,
    hire_date,
    phone_number,
    email,
    employee_status
FROM Employee
";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Employees</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">Employees Management</h1>

        <a href="add_employee.php" class="btn btn-primary">
            Add Employee
        </a>

    </div>

    <table class="table table-bordered table-hover shadow bg-white">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Hire Date</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['employee_id']; ?></td>

            <td><?php echo $row['first_name']; ?></td>

            <td><?php echo $row['last_name']; ?></td>

            <td><?php echo $row['position']; ?></td>

            <td><?php echo $row['department']; ?></td>

            <td>$<?php echo $row['salary']; ?></td>

            <td><?php echo $row['hire_date']; ?></td>

            <td><?php echo $row['phone_number']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td><?php echo $row['employee_status']; ?></td>
            <td>

            <a href="edit_employee.php?id=<?php echo $row['employee_id']; ?>"
                class="btn btn-warning btn-sm">
                Edit
            </a>

            <a href="delete_employee.php?id=<?php echo $row['employee_id']; ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this employee?');">
                Delete
            </a>

        </td>

        </tr>

        <?php } ?>

        </tbody>
        

    </table>

</div>

</body>
</html>