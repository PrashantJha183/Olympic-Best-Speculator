<?php
session_start();
include("Header.php");
// session_start();
error_reporting(0);
include('Config.php');


if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $newPassword = $_POST['password'];

    // Check if the entered username is correct
    $checkQuery = "SELECT * FROM `user` WHERE `Username` = '$uname'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $userData = mysqli_fetch_assoc($checkResult);
        $currentPassword = $userData['Password'];

        // Check if the new password is different from the current password
        if ($newPassword !== $currentPassword) {
            // Update the password for the provided username
            $updateQuery = "UPDATE `user` SET `Password` = '$newPassword' WHERE `Username` = '$uname'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "<script>alert('Password updated successfully.')</script>";
                // Redirect to login page after updating password
                echo "<script>document.location = 'https://OlympicsQuiz.000webhostapp.com/index.php'</script>";
                exit();
            } else {
                echo "<script>alert('Failed to update password.')</script>";
            }
        } else {
            echo "<script>alert('Please enter a different password than the current one.')</script>";
        }
    } else {
        echo "<script>alert('Invalid username.')</script>";
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
        <div class="border border-dark p-4">
            <h1 class="text-center"><i class="bi bi-lock-fill">&nbsp;Forgot Password</i></h1>
            <form method="post">
                <div class="form-group my-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter username" name="uname" autocomplete="off" required max="20">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your new password" name="password" autocomplete="off" required max="20">
                </div>


                <input type="submit" class="btn btn-success my-4" style="display:block; margin:auto" name="submit"
                    value="Submit">
            </form>
        </div>
    </div>
</body>

</html>