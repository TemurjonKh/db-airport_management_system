<?php

include("../config/db.php");

$id = $_GET['id'];

// STEP 1: get current data
$query = "SELECT * FROM Employee WHERE employee_id = $id";
$result = mysqli_query($conn, $query);
$employee = mysqli_fetch_assoc($result);

// STEP 2: update on submit
if(isset($_POST['update'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $employee_status = $_POST['employee_status'];

    $update = "
    UPDATE Employee SET
        first_name = '$first_name',
        last_name = '$last_name',
        position = '$position',
        department = '$department',
        salary = '$salary',
        hire_date = '$hire_date',
        phone_number = '$phone_number',
        email = '$email',
        employee_status = '$employee_status'
    WHERE employee_id = $id
    ";

    mysqli_query($conn, $update);

    header("Location: view_employees.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="mb-4">Edit Employee</h2>

        <form method="POST">

            <input type="text" name="first_name" class="form-control mb-2"
                   value="<?php echo $employee['first_name']; ?>" required>

            <input type="text" name="last_name" class="form-control mb-2"
                   value="<?php echo $employee['last_name']; ?>" required>

            <input type="text" name="position" class="form-control mb-2"
                   value="<?php echo $employee['position']; ?>" required>

            <input type="text" name="department" class="form-control mb-2"
                   value="<?php echo $employee['department']; ?>" required>

            <input type="number" name="salary" class="form-control mb-2"
                   value="<?php echo $employee['salary']; ?>" required>

            <input type="date" name="hire_date" class="form-control mb-2"
                   value="<?php echo $employee['hire_date']; ?>" required>

            <input type="text" name="phone_number" class="form-control mb-2"
                   value="<?php echo $employee['phone_number']; ?>" required>

            <input type="email" name="email" class="form-control mb-2"
                   value="<?php echo $employee['email']; ?>" required>

            <select name="employee_status" class="form-control mb-3">

                <option value="Active" <?php if($employee['employee_status']=="Active") echo "selected"; ?>>
                    Active
                </option>

                <option value="Inactive" <?php if($employee['employee_status']=="Inactive") echo "selected"; ?>>
                    Inactive
                </option>

            </select>

            <button type="submit" name="update" class="btn btn-success">
                Update Employee
            </button>

            <a href="view_employees.php" class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>