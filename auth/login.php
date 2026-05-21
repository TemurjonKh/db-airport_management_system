<?php

session_start();

include("../config/db.php");

if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $query = "

    SELECT *
    FROM Users
    WHERE email='$email'
    AND password='$password'

    ";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['user_id'];

        $_SESSION['full_name'] = $user['full_name'];

        $_SESSION['role'] = $user['role'];

        header("Location: ../index.php");

    }else{

        $error = "Invalid email or password";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow p-4">

                <h2 class="text-center mb-4">

                    Airport System Login

                </h2>

                <?php if(isset($error)) { ?>

                    <div class="alert alert-danger">

                        <?php echo $error; ?>

                    </div>

                <?php } ?>

                <form method="POST">

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
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <button type="submit"
                            name="submit"
                            class="btn btn-primary w-100">

                        Login

                    </button>

                </form>

                <div class="text-center mt-3">

                    <a href="register.php">

                        Create Account

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>