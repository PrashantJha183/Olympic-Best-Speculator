<?php
include('Config.php');
include('HeaderForAdmin.php');
$Success = false;
if (isset($_POST['submit'])) {
    $questionNo = $_POST['questionNo'];
    $question = $_POST['question'];
    $time = $_POST['time'];
    $options = array();

    // Collect all options from the form
    for ($i = 1; $i <= 12; $i++) {
        $option = $_POST['option' . $i];
        $options[] = mysqli_real_escape_string($conn, $option);
        // echo $options;
    }



    // Check if the question number already exists
    $checkQuery = "SELECT `Id` FROM `question` WHERE `Id` = '$questionNo'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Question no already exists');</script>";

    } else {
        // Insert the question and options into the database
        $insertQuery = "INSERT INTO `question`(`Id`, `Query`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, 
        `option9`, `option10`, `option11`, `option12`, `flag`,`Active`, `EndTime`) 
        VALUES ($questionNo,'$question','$options[0]','$options[1]','$options[2]','$options[3]','$options[4]',
        '$options[5]','$options[6]','$options[7]','$options[8]','$options[9]','$options[10]','$options[11]',0, 1, '$time')";


        $execute = mysqli_query($conn, $insertQuery);


        echo $execute;


        $Success = true;
        exit();

    }
    if ($Success) {
        echo "<script>alert('Questions and options added by the admin successfully');</script>";
        echo "<script>document.location = 'Admin.php'</script>'";
    } else {
        echo "<script>alert('Something went wrong while entering questions and options!!');</script>";
        echo "<script>document.location = 'AdminAddQuestion.php'</script>'";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
                crossorigin="anonymous"></script>
<style>
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
<title>OlympicsQuiz</title>

<body>
    <form method="post" action="AdminAddQuestion.php">
        <div class="container">
            <div class="mb-3 my-5">
                <label for="questionNo" class="form-label">Question no</label>
                <input type="number" class="form-control" id="questionNo" placeholder="Enter question no"
                    name="questionNo" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Enter your question</label>
                <textarea class="form-control" name="question" rows="7" style="resize: none;"
                    placeholder="Enter question" autocomplete="off" id="question"></textarea>

                <div class="my-3">
                    <label for="option1" class="form-label">Enter the option 1</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option1"
                        placeholder="Enter option 1" autocomplete="off" id="option1">
                </div>
                <div class="my-3">
                    <label for="option2" class="form-label">Enter the option 2</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option2"
                        placeholder="Enter option 2" autocomplete="off" id="option2">
                </div>
                <div class="my-3">
                    <label for="option3" class="form-label">Enter the option 3</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option3"
                        placeholder="Enter option 3" autocomplete="off" id="option3">
                </div>
                <div class="my-3">
                    <label for="option4" class="form-label">Enter the option 4</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option4"
                        placeholder="Enter option 4" autocomplete="off" id="option4">
                </div>
                <div class="my-3">
                    <label for="option5" class="form-label">Enter the option 5</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option5"
                        placeholder="Enter option 5" autocomplete="off" id="option5">
                </div>
                <div class="my-3">
                    <label for="option6" class="form-label">Enter the option 6</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option6"
                        placeholder="Enter option 6" autocomplete="off" id="option6">
                </div>
                <div class="my-3">
                    <label for="option7" class="form-label">Enter the option 7</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option7"
                        placeholder="Enter option 7" autocomplete="off" id="option7">
                </div>
                <div class="my-3">
                    <label for="option8" class="form-label">Enter the option 8</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option8"
                        placeholder="Enter option 8" autocomplete="off" id="option8">
                </div>
                <div class="my-3">
                    <label for="option9" class="form-label">Enter the option 9</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option9"
                        placeholder="Enter option 9" autocomplete="off" id="option9">
                </div>
                <div class="my-3">
                    <label for="option10" class="form-label">Enter the option 10</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option10"
                        placeholder="Enter option 10" autocomplete="off" id="option10">
                </div>
                <div class="my-3">
                    <label for="option11" class="form-label">Enter the option 11</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option11"
                        placeholder="Enter option 11" autocomplete="off" id="option11">
                </div>
                <div class="my-3">
                    <label for="option12" class="form-label">Enter the option 12</label>
                    <input class="form-control" type="text" aria-label="readonly input example" name="option12"
                        placeholder="Enter option 12" autocomplete="off" id="option12">
                </div>
                <div class="my-3">
                    <label for="time" class="form-label">Enter Date and Time</label>
                    <input class="form-control" type="datetime-local" aria-label="readonly input example"
                        placeholder="Enter date and time for quiz" autocomplete="off" id="time" name="time">
                </div>



            </div>
        </div>
        <input type="submit" class="btn btn-success my-4" style="display:block; margin:auto" name="submit">
    </form>
</body>

</html>