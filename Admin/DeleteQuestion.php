<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('Config.php'); // Ensure that you include your database connection file

if (isset($_POST['submit'])) {
    $questionNoToDelete = $_POST['questionNo'];

    // Check if the question number exists
    $checkQuery = "SELECT `Id` FROM `question` WHERE `Id` = '$questionNoToDelete'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        echo "<script>alert('Error in checking question number: " . mysqli_error($conn) . "');</script>";
    } else {
        $rows = mysqli_num_rows($checkResult);

        if ($rows > 0) {
            // Question number exists, proceed with deletion
            $deleteQuery = "DELETE FROM `question` WHERE `Id` = '$questionNoToDelete'";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if (!$deleteResult) {
                echo "<script>alert('Error deleting question: " . mysqli_error($conn) . "');</script>";
            } else {
                echo "<script>alert('Question deleted successfully');</script>";
            }
        } else {
            echo "<script>alert('Question number does not exist');</script>";
        }
    }
}
?>