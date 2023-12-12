<?php
include("Header.php");
include('Config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $uname = $_POST['Uname'];
    $password = $_POST['password'];
    $security = $_POST['security'];
    $hashedPassword = md5($password);


    $check = "SELECT `Username` FROM `user` WHERE `Username` = '$uname'";
    $execute = mysqli_query($conn, $check);
    $count = mysqli_num_rows($execute);
    if ($count > 0) {

        echo "<script>alert('Username already exist!')</script>";
    } else {
        $query = "INSERT INTO `user`(`Name`, `Username`,`Password`,`Security`) VALUES ('$name','$uname','$hashedPassword', '$security')";
        $result = mysqli_query($conn, $query);

        echo "<script>alert('You have been registered successfully')</script>";
        // echo "<script>document.location = 'https://Olympic Best Spectaculor.000webhostapp.com/index.php'</script>";
        echo "<script>document.location = 'index.php'</script>";
        exit();
    }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympic Best Spectaculor</title>
</head>

<body>

    <div class="container my-5">
        <div class="border border-dark p-5">
            <h1 class="text-center"><i class="bi bi-person-circle">&nbsp;Register</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp"
                        placeholder="Enter your name" required max="30" autocomplete="off" name="Name">

                </div>
                <div class="form-group my-3">
                    <label for="Uname">Username</label>
                    <input type="text" class="form-control" id="Uname" aria-describedby="emailHelp"
                        placeholder="Enter your username" required max="30" autocomplete="off" name="Uname">

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

                <div class="form-group my-3">
                    <label for="password">Security Key</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="security" placeholder="security"
                            aria-describedby="passwordToggle" name="security" autocomplete="off" required max="20">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="securityToggle"
                                onclick="toggleSecurityVisibility()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success my-4" style="display:block; margin:auto" name="submit"
                    value="Submit">
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


        function toggleSecurityVisibility() {
            const passwordInput = document.getElementById('security');
            const passwordToggle = document.getElementById('securityToggle');

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