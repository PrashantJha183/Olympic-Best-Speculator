<?php
session_start();
include("Config.php");
include('HeaderForQuiz.php');
$save = $_SESSION['ulogin'];
$insertSuccess = false;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'selectedopt') !== false) {
            // Extract question ID from the input name
            $questionId = str_replace('selectedopt', '', $key);

            // Get the selected option for the current question
            $selectedOption = mysqli_real_escape_string($conn, $value);

            // Insert the selected option into the database
            $query = "INSERT INTO `answer`(`QueId`, `Selectedopt`, `Username`) VALUES ('$questionId', '$selectedOption', '$save')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $insertSuccess = true;
            }
        }
    }


    // Fetch data from the contestant table for the logged-in admin
    $contestantQuery = "SELECT `Username`, `SelectedOpt`, `Date and time` FROM `contestant`";
    $contestantResult = mysqli_query($conn, $contestantQuery);

    if ($contestantResult) {
        while ($contestantRow = mysqli_fetch_assoc($contestantResult)) {
            $userName = $contestantRow['Username'];
            // echo "<script>alert('$userName');</script>";
            $userAnswer = $contestantRow['SelectedOpt'];
            $submissionTime = strtotime($contestantRow['Date and time']);

            $selectLeaderboardQuery = "SELECT `Username` , `Points` FROM `leaderboard`;";
            $selectLeaderboardResult = mysqli_query($conn, $selectLeaderboardQuery);


            $adminQuery = "SELECT `Selectedopt` FROM `answer` WHERE `QueId` = '$questionId'";
            $adminResult = mysqli_query($conn, $adminQuery);

            if ($adminResult && mysqli_num_rows($adminResult) > 0) {
                $adminRow = mysqli_fetch_assoc($adminResult);
                $adminAnswer = $adminRow['Selectedopt'];
                // echo "<script>alert('$adminAnswer');</script>";
                // Fetch end time for the current question
                $endTimeQuery = "SELECT `EndTime` FROM `question` WHERE `Id` = '$questionId'";
                $endTimeResult = mysqli_query($conn, $endTimeQuery);

                if ($endTimeResult && mysqli_num_rows($endTimeResult) > 0) {
                    $endTimeRow = mysqli_fetch_assoc($endTimeResult);
                    $endTime = strtotime($endTimeRow['EndTime']);

                    echo "<script>alert('$endTime');</script>";

                } else {
                    echo "<script>alert('Time fetch issue');</script>";
                }



                if (empty($selectLeaderboardResult)) {
                    echo "<script>alert('Leaderboard empty');</script>";
                    if ($submissionTime <= $endTime && strcasecmp($adminAnswer, $userAnswer) === 0) {
                        $insertion = "INSERT INTO `leaderboard`(`Username`, `Points`) VALUES ('$userName',10)";
                        mysqli_query($conn, $insertion);
                    } else {
                        echo "<script>alert('Qeury condition not matched');</script>";
                    }
                } else {

                    while ($row = mysqli_fetch_assoc($selectLeaderboardResult)) {
                        $username = $row['Username'];
                        $point = $row['Points'];
                        if ($username == $userName) {
                            if ($submissionTime <= $endTime && strcasecmp($adminAnswer, $userAnswer) === 0) {
                                $point = $point + 10;

                                $updateQuery = "UPDATE `leaderboard` SET `Points`= $point WHERE `UserName` = '$username'";
                                mysqli_query($conn, $updateQuery);
                            }
                        } else {
                            if ($submissionTime <= $endTime && strcasecmp($adminAnswer, $userAnswer) === 0) {
                                $insertion = "INSERT INTO `leaderboard`(`Username`, `Points`) VALUES ('$userName',10)";
                                mysqli_query($conn, $insertion);
                            }
                        }
                    }
                }




            }
        }
    } else {
        echo "<script>alert('Contestent table issue');</script>";
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
    <div class="container">
        <form method="post">
            <h1 class="text-center">Quiz</h1>

            <?php
            // Fetch questions that haven't been submitted by the admin and have non-empty options
            $sql = "SELECT * FROM `question` WHERE `flag` != 1 AND `Id` NOT IN (SELECT `QueId` FROM `answer` WHERE `Username` = '$save')";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['Id'] . "." . " " . $row['Query'] . "<br>";

                    // Display radio buttons for non-empty options
                    for ($i = 1; $i <= 12; $i++) {
                        $optionColumnName = "option" . $i;
                        $optionValue = $row[$optionColumnName];

                        if (!empty($optionValue)) {
                            echo "<input type='radio' name='selectedopt" . $row['Id'] . "' value='$optionValue'> $optionValue <br>";
                        }
                    }

                    echo "<hr>";
                }
            } else {
                echo "<script>alert('All questions have been attempted.');</script>";
                echo "<script>document.location='HomepageForAdmin.php';</script>";
            }
            ?>

            <input type="submit" class="btn btn-success my-3" style="display:block; margin:auto" name="submit">
        </form>


    </div>
    
</body>

</html>