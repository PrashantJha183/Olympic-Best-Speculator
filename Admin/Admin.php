<?php
session_start();
include("Config.php");
include('HeaderForAdmin.php');
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

            // Insert the selected option into the database
            $query = "INSERT INTO `answer`(`QueId`, `Selectedopt`, `Username`) VALUES ('$questionId', '$selectedOption', '$save')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $insertSuccess = true;
            }
        }
    }


    // Fetch all contestants who submitted the quiz
    $contestantsQuery = "SELECT DISTINCT `UserName` FROM `contestant`";
    $contestantsResult = mysqli_query($conn, $contestantsQuery);

    while ($contestantRow = mysqli_fetch_assoc($contestantsResult)) {
        $username = $contestantRow['UserName'];

        // Fetch all questions
        $questionsQuery = "SELECT * FROM `question`";
        $questionsResult = mysqli_query($conn, $questionsQuery);

        $score = 0;

        while ($questionRow = mysqli_fetch_assoc($questionsResult)) {
            $questionId = $questionRow['Id'];

            // Get admin's answer
            $adminQuery = "SELECT `Selectedopt` FROM `answer` WHERE `QueId` = '$questionId'";
            $adminResult = mysqli_query($conn, $adminQuery);
            $adminRow = mysqli_fetch_assoc($adminResult);
            $adminAnswer = $adminRow['answer'];



            $know = "SELECT `SelectedOpt` FROM `contestant` WHERE `QueId` = '$questionId' AND `UserName` = '$username'";
            $knowResult = mysqli_query($conn, $know);
            $Row = mysqli_fetch_assoc($knowResult);
            $Answer = $Row['contestant'];

            $contestantQuery = "SELECT `Date and time` FROM `contestant` WHERE `QueId` = '$questionId' AND `Username` = '$username'";
            $contestantResult = mysqli_query($conn, $contestantQuery);

            if ($contestantResult && mysqli_num_rows($contestantResult) > 0) {
                $contestantRow = mysqli_fetch_assoc($contestantResult);
                $contestantAnswer = $contestantRow['Selectedopt'];
                $submissionTime = strtotime($contestantRow['SubmissionTime']);

                $endTimeQuery = "SELECT `EndTime` FROM `question` WHERE `Id` = '$questionId'";
                $endTimeResult = mysqli_query($conn, $endTimeQuery);

                if ($endTimeResult && mysqli_num_rows($endTimeResult) > 0) {
                    $endTimeRow = mysqli_fetch_assoc($endTimeResult);
                    $endTime = strtotime($endTimeRow['EndTime']);

                    // Check if the user submitted before the end time
                    if ($submissionTime <= $endTime && $adminAnswer === $Answer) {

                        // Give 100 points to the user
                        $updateLeaderboardQuery = "INSERT INTO `leaderboard` (`Username`, `Points`) VALUES ('$username', 100) ON DUPLICATE KEY UPDATE `Points` = `Points` + 100";
                        mysqli_query($conn, $updateLeaderboardQuery);

                    }
                }
            }

        }
    }
    echo "Leaderboard updated successfully.";
    if ($insertSuccess) {
        echo "<script>alert('You have answered the quiz. Best of luck for the result!!');</script>";
        echo "<script>document.location='HomepageForAdmin.php';</script>";
    } else {
        echo "<script>alert('Error inserting selected options.');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OlympicsQuiz</title>

    <style>

    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <h1 class="text-center">Quiz</h1>

            <?php
            // Fetch questions that haven't been submitted by the admin and have non-empty options
            $sql = "SELECT * FROM `question` WHERE `flag` != 1 AND `Id` NOT IN (SELECT `QueId` FROM `answer` WHERE `Username` = '$save')";
            // echo "Debug: SQL Query - $sql<br>";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo $row['Id'] . "." . " " . $row['Query'] . "<br>";


                    // Display radio buttons for non-empty options
                    for ($i = 1; $i <= 12; $i++) {
                        $optionColumnName = "option" . $i;
                        $optionValue = $row[$optionColumnName];

                        if (!empty($optionValue)) {
                            echo "<input type='radio' name='selectedopt" . $row['Id'] . "' value='$optionValue'> $optionValue<br>";
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