<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Config.php');

$insertSuccess = false;

if (isset($_POST['submit'])) {
    $questionNo = $_POST['questionNo'];
    $question = $_POST['question'];
    $time = $_POST['time'];
    $options = array();

    // Collect all options from the form
    for ($i = 1; $i <= 12; $i++) {
        $option = $_POST['option' . $i];
        if (!empty($option)) {
            $cat = "option" . $i;


            $options[] = $cat;
            $newopt[] = $option;


        }
    }



    // Check if the question number already exists
    $checkQuery = "SELECT `Id` FROM `question` WHERE `Id` = '$questionNo'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        echo "<script>alert('Error in checking question number');</script>";
    } else {
        $rows = mysqli_num_rows($checkResult);
        $attempted = true;
        if ($rows > 0) {
            if (sizeof($options) != 0) {
                for ($i = 0; $i < sizeof($options); $i++) {
                    echo $options[$i];
                    echo $newopt[$i];
                    if (empty($question)) {
                        if (empty($time)) {
                            $updateQuery = "UPDATE `question` SET `$options[$i]`='$newopt[$i]', `flag`= 0, `Active` = 1 WHERE `Id` = '$questionNo'";
                            $run = mysqli_query($conn, $updateQuery);
                        } else {
                            $updateQuery = "UPDATE `question` SET `$options[$i]`='$newopt[$i]', `flag`= 0, `Active` = 1, `EndTime` = '$time' WHERE `Id` = '$questionNo'";
                            $run = mysqli_query($conn, $updateQuery);
                        }
                    } else {
                        if (empty($time)) {
                            $updateQuery = "UPDATE `question` SET `Query`='$question', `$options[$i]`='$newopt[$i]', `flag`= 0, `Active` = 1    WHERE `Id` = '$questionNo'";
                            $run = mysqli_query($conn, $updateQuery);
                        } else {
                            $updateQuery = "UPDATE `question` SET `Query`='$question', `$options[$i]`='$newopt[$i]', `flag`= 0, `Active` = 1, `EndTime` = '$time' WHERE `Id` = '$questionNo'";
                            $run = mysqli_query($conn, $updateQuery);
                        }

                    }


                }
            } else {

                if (empty($question)) {
                    if (empty($time)) {
                        echo "<script>alert('Please update somthing!!');</script>";
                    } else {
                        $updateQuery = "UPDATE `question` SET `flag`= 0, `Active` = 1, `EndTime` = '$time' WHERE `Id` = '$questionNo'";
                        $run = mysqli_query($conn, $updateQuery);
                    }
                } else {
                    if (empty($time)) {
                        $updateQuery = "UPDATE `question` SET `Query`='$question', `flag`= 0, `Active` = 1    WHERE `Id` = '$questionNo'";
                        $run = mysqli_query($conn, $updateQuery);
                    } else {
                        $updateQuery = "UPDATE `question` SET `Query`='$question', `flag`= 0, `Active` = 1, `EndTime` = '$time' WHERE `Id` = '$questionNo'";
                        $run = mysqli_query($conn, $updateQuery);
                    }

                }

            }



            if ($run) {
                $insertSuccess = true;
                echo "<script>alert('Question and options updated successfully');</script>";
                echo "<script>document.location = 'HomepageForAdmin.php';</script>";
            } else {
                echo "<script>alert('Error updating question and options');</script>";
            }
        } else if ($attempted = true) {
            echo "<script>alert('Question number does not exist, not updating');</script>";
        }
    }
    if (!$insertSuccess) {
        echo "<script>alert('Something went wrong while updating questions and options');</script>";
        echo "<script>document.location = 'HomepageForAdmin.php';</script>";
    }
}
// else {

if (isset($_POST['delete'])) {
    $questionNoToDelete = $_POST['questionNo'];

    // Check if the question number exists
    $checkQuery = "SELECT `Id` FROM `question` WHERE `Id` = '$questionNoToDelete'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        echo "<script>alert('Error in checking question number');</script>";
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
                echo "<script>document.location = 'HomepageForAdmin.php';</script>";
            }
        } else {
            echo "<script>alert('Question number does not exist');</script>";

        }
    }
}
// }



if (isset($_POST['deleteAnswer'])) {
    $questionNoToDeleteAnswer = $_POST['questionNoForDeleteAnswer'];
 
    // var_dump($_POST);


    // Check if the question number exists in the answer table and is answered by the admin
    $query = "SELECT * FROM `answer` WHERE `QueId` = '$questionNoToDeleteAnswer'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Error in checking answer for question number');</script>";
    } else {
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            // Question number exists and is answered by the admin, proceed with deletion
            $deleteQuery = "DELETE FROM `answer` WHERE `QueId` = '$questionNoToDeleteAnswer'";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if (!$deleteResult) {
                echo "<script>alert('Error deleting answer: " . mysqli_error($conn) . "');</script>";
            } else {
                echo "<script>alert('Answer deleted successfully');</script>";
                echo "<script>document.location = 'HomepageForAdmin.php';</script>";
            }
        } else {
            echo "<script>alert('Question number does not exist or is not answered by the admin');</script>";
        }
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <title>Olympic Best Spectaculor</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="HomepageForAdmin.php">Olympic Best Spectaculor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="HomepageForAdmin.php"> <i
                                class="bi bi-house">&nbsp;Home</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Leaderboard.php"><i
                                class="bi bi-trophy">&nbsp;Leaderboard</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Admin.php"><i
                                class="bi bi-question-octagon-fill">&nbsp;Quiz</i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="AdminAddQuestion.php"><i
                                class="bi bi-question-octagon">&nbsp; Add Questions</i></a>
                    </li>


                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link active" aria-current="page" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLong">
                            <i class="bi bi-pencil-square">&nbsp;Update</i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update your question</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                            <!-- Add your scrolling content here -->

                                            <div class="container">
                                                <div class="mb-3 my-5">
                                                    <label for="questionNo" class="form-label">Question no</label>
                                                    <input type="number" class="form-control" id="questionNo"
                                                        placeholder="Enter question no to be updated" name="questionNo"
                                                        autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Enter your question</label>
                                                    <textarea class="form-control" name="question" rows="7"
                                                        style="resize: none;" placeholder="Enter question"
                                                        autocomplete="off" id="question"></textarea>

                                                    <div class="my-3">
                                                        <label for="option1" class="form-label">Enter the option
                                                            1</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option1"
                                                            placeholder="Enter option 1" autocomplete="off"
                                                            id="option1">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option2" class="form-label">Enter the option
                                                            2</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option2"
                                                            placeholder="Enter option 2" autocomplete="off"
                                                            id="option2">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option3" class="form-label">Enter the option
                                                            3</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option3"
                                                            placeholder="Enter option 3" autocomplete="off"
                                                            id="option3">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option4" class="form-label">Enter the option
                                                            4</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option4"
                                                            placeholder="Enter option 4" autocomplete="off"
                                                            id="option4">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option5" class="form-label">Enter the option
                                                            5</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option5"
                                                            placeholder="Enter option 5" autocomplete="off"
                                                            id="option5">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option6" class="form-label">Enter the option
                                                            6</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option6"
                                                            placeholder="Enter option 6" autocomplete="off"
                                                            id="option6">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option7" class="form-label">Enter the option
                                                            7</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option7"
                                                            placeholder="Enter option 7" autocomplete="off"
                                                            id="option7">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option8" class="form-label">Enter the option
                                                            8</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option8"
                                                            placeholder="Enter option 8" autocomplete="off"
                                                            id="option8">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option9" class="form-label">Enter the option
                                                            9</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option9"
                                                            placeholder="Enter option 9" autocomplete="off"
                                                            id="option9">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option10" class="form-label">Enter the option
                                                            10</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option10"
                                                            placeholder="Enter option 10" autocomplete="off"
                                                            id="option10">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option11" class="form-label">Enter the option
                                                            11</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option11"
                                                            placeholder="Enter option 11" autocomplete="off"
                                                            id="option11">
                                                    </div>
                                                    <div class="my-3">
                                                        <label for="option12" class="form-label">Enter the option
                                                            12</label>
                                                        <input class="form-control" type="text"
                                                            aria-label="readonly input example" name="option12"
                                                            placeholder="Enter option 12" autocomplete="off"
                                                            id="option12">
                                                    </div>

                                                    <div class="my-3">
                                                        <label for="time" class="form-label">Enter Date and Time</label>
                                                        <input class="form-control" type="datetime-local"
                                                            aria-label="readonly input example" name="time"
                                                            placeholder="Enter date and time for quiz"
                                                            autocomplete="off" id="time">
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="hidden" name="action" value="update">
                                            <input type="submit" class="btn btn-primary" value="Save changes"
                                                name="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>







                    <li class="nav-item">
                        <a href="" class="nav-link active" aria-current="page" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLong2">
                            <i class="bi bi-trash">&nbsp;Delete</i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong2" tabindex="-1"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete your question</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                            <!-- Add your scrolling content here -->

                                            <div class="container">
                                                <div class="mb-3 my-5">
                                                    <label for="questionNo" class="form-label">Question no</label>
                                                    <input type="number" class="form-control" id="questionNo"
                                                        placeholder="Enter question no to be deleted" name="questionNo"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="hidden" name="action" value="delete">
                                            <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="RegisteredUser.php"><i
                                class="bi bi-person-circle">&nbsp; Registered user</i></a>
                    </li>










                    <li class="nav-item">
                        <a href="" class="nav-link active" aria-current="page" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLong3">
                            <i class="bi bi-trash-fill">&nbsp;Delete answer</i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong3" tabindex="-1"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete your answer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                            <!-- Add your scrolling content here -->

                                            <div class="container">
                                                <div class="mb-3 my-5">
                                                    <label for="questionNo" class="form-label">Question no</label>
                                                    <input type="number" class="form-control" id="questionNo"
                                                        placeholder="Enter question no whose answer should be deleted"
                                                        name="questionNoForDeleteAnswer" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <input type="hidden" name="action" value="delete">
                                            <input type="submit" class="btn btn-danger" value="Delete"
                                                name="deleteAnswer">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </li>



                </ul>

                <button class="btn btn-outline-danger d-flex" type="submit" onclick='redirect()'>
                    <i class="bi bi-box-arrow-left">&nbsp;Logout</i>
                </button>
            </div>
        </div>
    </nav>
</body>
<script>

    function redirect() {

        // document.location = 'https://Olympic Best Spectaculor.000webhostapp.com/index.php';
        document.location = '../index.php';
    }
</script>

</html>