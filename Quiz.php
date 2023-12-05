<?php
session_start();
include("Config.php");
include('HeaderForUser.php');
$save = $_SESSION['ulogin'];
$score = 0;
$insertSuccess = false;

$checkQuery = "SELECT `QueId` FROM `contestant` WHERE `Username` = '$save'";
$checkResult = mysqli_query($conn, $checkQuery);
$submittedCount = mysqli_num_rows($checkResult);

if ($submittedCount > 0) {
    echo "<script>alert('You have already submitted the quiz. Best of luck for the result!!')</script>";
    // Redirect or perform any other action as needed
    // header('Location: HeaderForUser.php');
    exit();
}
if (isset($_POST['submit'])) {



    foreach ($_POST as $key => $value) {
        if (strpos($key, 'selectedopt') !== false) {
            // Extract question ID from the input name
            $questionId = str_replace('selectedopt', '', $key);
            // echo "Question no: " . $questionId;

            // Get the selected option for the current question
            $selectedOption = mysqli_real_escape_string($conn, $value);
            // echo "Answer: " . $selectedOption;

            // Insert the selected option into the database
            $query = "INSERT INTO `contestant`(`Username`, `QueId`, `Selectedopt`) VALUES ('$save', '$questionId', '$selectedOption')";
            $result = mysqli_query($conn, $query);
            // exit();

            if ($result) {
                $insertSuccess = true;
            }


            $correctOptionQuery = "SELECT `Selectedopt` FROM `answer` WHERE `QueId` = '$questionId'";
            $correctOptionResult = mysqli_query($conn, $correctOptionQuery);

            if ($correctOptionResult && mysqli_num_rows($correctOptionResult) > 0) {
                $row = mysqli_fetch_assoc($correctOptionResult);
                $correctOption = $row['Selectedopt'];

                // Compare the selected option to the correct option
                if ($selectedOption == $correctOption) {
                    // Award 10 points for each correct answer
                    $score += 10;

                }
            } else {
                echo "<script>alert('Error fetching correct option for Question ID $questionId.');</script>";
            }

        }

    }



    if ($insertSuccess) {
        echo "<script>alert('You had attempted the quiz. Best of the luck for the result!!');</script>";
    } else {
        echo "<script>alert('You had not attempted the quiz');</script>";
    }

    // echo "<script>alert('Your score: $score');</script>";



    if ($save != 'admin') {
        $updatePointsQuery = "INSERT INTO `leaderboard` (`Username`, `Points`) VALUES ('$save', $score) ON DUPLICATE KEY UPDATE `Points` = `Points` + $score";
        $updatePointsResult = mysqli_query($conn, $updatePointsQuery);
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <title>KnowledgeKube</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <h1 class="text-center">Quiz</h1>

            <table class="my-5" style="margin: 0px auto;">
                <?php
                $sql = "SELECT * FROM `question`";
                $result = mysqli_query($conn, $sql);
                $execute = mysqli_fetch_all($result);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $know) {
                        ?>
                        <div class='container'>
                            <tr>
                                <td>
                                    <?php

                                    echo htmlentities($know['Id']);
                                    echo ".";
                                    echo "&nbsp";
                                    echo "&nbsp";

                                    //Question
                                    echo htmlentities($know['Query']);
                                    echo "<br/>";
                                    ?>
                                    <fieldset class="selectedopt mx-4">
                                        <?php
                                        //Option 1
                                        echo "<input type='radio' name='selectedopt" . $know['Id'] . "' value='1'>";
                                        echo "&nbsp";
                                        echo htmlentities($know['option1']);
                                        echo "<br/>";

                                        //Option 2
                                        echo "<input type='radio' name='selectedopt" . $know['Id'] . "' value='2'>";
                                        echo "&nbsp";
                                        echo htmlentities($know['option2']);
                                        echo "<br/>";

                                        //Option 3
                                        echo "<input type='radio' name='selectedopt" . $know['Id'] . "' value='3'>";
                                        echo "&nbsp";
                                        echo htmlentities($know['option3']);
                                        echo "<br/>";

                                        //Option 4
                                        echo "<input type='radio' name='selectedopt" . $know['Id'] . "' value='4'>";
                                        echo "&nbsp";
                                        echo htmlentities($know['option4']);
                                        echo "<br/>";
                                        echo "<br/>";
                                        ?>
                                    </fieldset>

                                </td>
                            </tr>
                        </div>

                        <?php
                    }
                }
                ?>
            </table>

            <input type="submit" class="btn btn-success my-3" style="display:block; margin:auto" name="submit">
        </form>
    </div>
</body>

</html>