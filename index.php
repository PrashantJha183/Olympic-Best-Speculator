<?php
session_start();
include("Header.php");

error_reporting(0);
include('Config.php');

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $encrypt = md5($password);
    $query = "SELECT * FROM `user` WHERE `Username` = '$uname' AND `Password` = '$encrypt'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['ulogin'] = $uname;
        // Redirect to another page after successful login
        echo "<script>document.location = 'Home.php'</script>";
        // echo "<script>document.location = 'https://Olympic Best Speculator.000webhostapp.com/Home.php'</script>";
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
    <title>Olympic Best Speculator</title>
</head>

<body>
    <div class="container my-5 py-5">
        <div class="border border-dark border-1 rounded p-5">
            <h1 class="text-center"><i class="bi bi-box-arrow-in-left">&nbsp;Login</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="uname">Username</label>
                    <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"
                        placeholder="Enter your username" name="uname" autocomplete="off" required max="20">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            aria-describedby="passwordToggle" name="password" autocomplete="off" required max="20">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="passwordToggle"
                                onclick="togglePasswordVisibility()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <a href="Forgotpassword.php" style="text-decoration: none; float:right;" class="my-1">Forgot
                    password</a>

                <input type="submit" class="btn btn-success my-5 py-2 w-100 rounded"
                    style="display:block; margin:auto; font-size: 18px;" name="submit" value="Login" />

                <h5 class="text-center"><a href="Register.php" style="text-decoration: none; color:black; ">Don't
                        have an account? Create an acccount</a></h5>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>'; // Change icon to hide
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = '<i class="bi bi-eye"></i>'; // Change icon to show
            }
        }
    </script>
</body>

</html>