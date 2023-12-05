<?php
include("Header.php");
session_start();
error_reporting(0);
include('Config.php');

if ($_SESSION['ulogin'] !== '') {
    $_SESSION['ulogin'] = '';
}

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE `Username` = '$uname' AND `Password` = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['ulogin'] = $_POST['uname'];

        // Redirect to another page after successful login
        header('Location: HeaderForUser.php');
        exit();
    } else {
        echo "<script>alert('Invalid login credentials')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <title>KnowledgeKube</title>
</head>

<body>
    <div class="container my-5">
        <div class="border p-5">
            <h1 class="text-center"><i class="bi bi-box-arrow-in-left">&nbsp;Login</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" name="uname" autocomplete="off" required max="20">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password" autocomplete="off" required max="20">
                </div>
                <a href="Register.php">Don't have an account?<br />Register here</a>
                <input type="submit" class="btn btn-success my-3" style="display:block; margin:auto" name="submit"
                    value="Login">
            </form>
        </div>
    </div>
</body>

</html>