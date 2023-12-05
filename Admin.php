<?php
session_start();
include("Config.php");
include('HeaderForUser.php');
$save = $_SESSION['ulogin'];


if ($save == 'admin') {

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
                $query = "INSERT INTO `answer`(`QueId`, `Selectedopt`) VALUES ('$questionId', '$selectedOption')";
                $result = mysqli_query($conn, $query);

                

            }



        }


        if ($result) {
            echo "<script>alert('Answer submitted by the admin')</script>";

        }
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