<?php
session_start();
include("Header.php");
// session_start();
error_reporting(0);
include('Config.php');


if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $newPassword = $_POST['password'];
    $security = $_POST['security'];


    // Check if the entered username is correct
    $checkQuery = "SELECT * FROM `user` WHERE `Username` = '$uname' AND `Security` = '$security'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $userData = mysqli_fetch_assoc($checkResult);
        $currentPassword = $userData['Password'];

        // Check if the new password is different from the current password
        if ($newPassword !== $currentPassword) {
            // Update the password for the provided username
            $updateQuery = "UPDATE `user` SET `Password` = '$newPassword' WHERE `Username` = '$uname' AND `Security` = '$security'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "<script>alert('Password updated successfully.')</script>";
                // Redirect to login page after updating password
                echo "<script>document.location = 'https://Olympic Best Spectaculor.000webhostapp.com/index.php'</script>";
                exit();
            } else {
                echo "<script>alert('Failed to update password.')</script>";
            }
        } else {
            echo "<script>alert('Please enter a different password than the current one.')</script>";
        }
    } else {
        echo "<script>alert('Invalid username or security key.')</script>";
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
    <div class="container my-5 py-5">
        <div class="border border-dark p-4">
            <h1 class="text-center"><i class="bi bi-lock-fill">&nbsp;Forgot Password</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
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
                

                
                <div class="form-group my-3">
                    <label for="password">Security Key</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="security" placeholder="Security key"
                            aria-describedby="passwordToggle" name="security" autocomplete="off" required max="20">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="securityToggle"
                                onclick="toggleSecurityVisibility()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success my-5 py-2 w-100 rounded"
                    style="display:block; margin:auto; font-size: 18px;" name="submit" value="Submit" />
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