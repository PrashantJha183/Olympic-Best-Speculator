<?php
session_start();
include("Config.php");
include('HeaderForUser.php');
$save = $_SESSION['ulogin'];
$score = 0;
$insertSuccess = false;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'selectedopt') !== false) {
            // Extract question ID from the input name
            $questionId = str_replace('selectedopt', '', $key);

            // Get the selected option for the current question
            $selectedOption = mysqli_real_escape_string($conn, $value);

            // Get the current date and time
            date_default_timezone_set('Asia/Mumbai');
            $currentDateTime = date("Y-m-d H:i:s");


            // Insert the selected option into the database
            $query = "INSERT INTO `contestant`(`Username`, `QueId`, `Selectedopt`,  `Date and time`) VALUES ('$save', '$questionId', '$selectedOption', '$currentTime')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $insertSuccess = true;
            }

        }
    }

    if ($insertSuccess) {
        echo "<script>alert('You had attempted the quiz. Best of luck for the result!!');</script>";
        echo "<script>document.location='Quiz.php';</script>";
    } else {
        echo "<script>alert('Error inserting selected options.');</script>";
    }
    // exit();
    // $currentTime = time();


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
    <div class="container my-5 py-3">
        <form method="post">
            <h1 class="text-center my-2">Quiz</h1>

            <?php
            // Fetch questions that haven't been submitted by the user and have non-empty options
            date_default_timezone_set('Asia/Kolkata');
            $currentDateTime = date("Y-m-d H:i:s");

            // echo $currentDateTime;
            $sql = "SELECT * FROM `question` WHERE `flag` != 1 AND `Id` NOT IN (SELECT `QueId` FROM `contestant` WHERE `Username` = '$save') AND `EndTime` > '$currentDateTime'";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Check if the end time has passed
                    $endTime = strtotime($row['EndTime']);
                    if ($endTime <= time()) {
                        echo "<div class='text-center'>Question {$row['Id']} has passed its end time. You can't attempt it anymore.</div>";
                        continue; // Skip to the next iteration
                    }

                    echo $row['Id'] . "." . " " . $row['Query'] . "<br>";

                    // Display radio buttons for non-empty options
                    for ($i = 1; $i <= 12; $i++) {
                        $optionColumnName = "option" . $i;
                        $optionValue = $row[$optionColumnName];
                        ?>

                        <div class="my-2">
                            <?php
                            if (!empty($optionValue)) {
                                echo "<input type='hidden' name='question_{$row['Id']}_endtime' value='{$row['EndTime']}''>";
                                echo "<input type='radio' name='selectedopt" . $row['Id'] . "' value='$optionValue'> $optionValue<br>";
                            }
                    }
                    ?>
                    </div>
                    <?php

                    echo "<hr>";
                }
            } else {
                echo "<script>alert('All questions have been attempted.')</script>;";
                echo "<script>document.location = 'LeaderboardForUser.php';</script>";
            }
            ?>


            <input type="submit" class="btn btn-success my-3" style="display:block; margin:auto" name="submit">
        </form>
    </div>
</body>

</html>