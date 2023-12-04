<?php
include("Header.php");
include("Config.php");
if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $uname = $_POST['Uname'];
    $email = $_POST['email'];
    $password = $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO `user`(`Name`, `Username`, `Email`, `Password`) VALUES ('$name','$uname','$email','$password')";
    $result = mysqli_query($conn, $query);
    echo"<script>alert('You have been registered successfully')</script>";
    header('Location: Login.php');
    exit();


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <form method="post">
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter your name" required max="3" autocomplete="off" name="Name">

                </div>
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter your username" required max="5" autocomplete="off" name="Uname">

                </div>
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter your email id" required max="5" autocomplete="off" name="email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your password" required max="8" autocomplete="off" name="password">
                </div>
                <a href="#">Don't have an account?<br />Register here</a>
                <input type="submit" class="btn btn-success my-3" style="display:block; margin:auto" name="submit">
            </form>
        </div>
    </div>
</body>

</html>