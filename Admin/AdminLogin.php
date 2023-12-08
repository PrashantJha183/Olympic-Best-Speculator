<?php
session_start();
include('Config.php');
include('Header.php');
if (isset($_POST['submit'])) {
    $adminUname = $_POST['uname'];
    $adminPassword = $_POST['password'];
    $query = "SELECT * FROM `admin` WHERE `Username` =  '$adminUname' AND `Password` = '$adminPassword'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['ulogin'] = $adminUname;
        // Redirect to another page after successful login
        // header('Location:https://OlympicsQuiz.000webhostapp.com/HeaderForUser.php');
        // echo "<script>document.location = 'https://OlympicsQuiz.000webhostapp.com/HeaderForUser.php'</script>";
        // echo "<script>document.location = 'https://OlympicsQuiz.000webhostapp.com/HomepageForAdmin.php'</script>";
        echo "<script>document.location = 'HomepageForAdmin.php'</script>";
        exit();
    } else {
        echo "<script>alert('Invalid login credentials for admin')</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OlympicsQuiz</title>
</head>

<body>
    <div class="container my-5 py-5">
        <div class="border border-dark p-5">
            <h1 class="text-center"><i class="bi bi-person-bounding-box">&nbsp;&nbsp;Admin Login</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="uname">Username</label>
                    <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"
                        placeholder="Enter username" name="uname" autocomplete="off" required max="20">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            aria-describedby="passwordToggle" name="password" autocomplete="off" required max="20">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="passwordToggle"
                                onclick="togglePasswordVisibility()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>





                <input type="submit" class="btn btn-success my-4" style="display:block; margin:auto" name="submit"
                    value="Login">
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