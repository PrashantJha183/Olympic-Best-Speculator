<?php

include('Config.php');

include('HeaderForAdmin.php');

$countQuery = "SELECT COUNT(DISTINCT `Username`) AS usernameCount FROM `user`";
$countResult = mysqli_query($conn, $countQuery);

$userCount = 0;
if ($countResult) {
    $countData = mysqli_fetch_assoc($countResult);
    $userCount = $countData['usernameCount'];

}




$Query = "SELECT COUNT(DISTINCT `Id`) AS queCount FROM `question`";
$queryResult = mysqli_query($conn, $Query);

$queryCount = 0;
if ($queryResult) {
    $countQuery = mysqli_fetch_assoc($queryResult);
    $queryCount = $countQuery['queCount'];
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
    <?php
    // $selectLeaderboardQuery = "SELECT `Username` FROM `leaderboard`;";
    // $selectLeaderboardResult = mysqli_query($conn, $selectLeaderboardQuery);
    
    // if ($selectLeaderboardResult) {
    //     while ($row = mysqli_fetch_assoc($selectLeaderboardResult)) {
    //         $username = $row['Username'];
    //         echo "<script>alert('Username: $username');</script>";
    //     }
    // }
    
    ?>
    <div class="container my-5 text-center">
        <div class="row my-4">
            <div class="col-md-auto col-sm-6 d-flex justify-content-center align-items-center mx-auto my-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <i class="bi bi-person-circle" style="font-size: 7em; height: 10em; width: 10em;"></i>

                        <h4 class="card-text">Total no of Registered user<br /><br />
                            <?php echo $userCount; ?>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-auto col-sm-6 d-flex justify-content-center align-items-center mx-auto my-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <i class="bi bi-people-fill" style="font-size: 7em; height: 10em; width: 10em;"></i>

                        <h4 class="card-text">Total no of Team<br /><br />
                            12
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-md-auto col-sm-6 d-flex justify-content-center align-items-center mx-auto my-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <i class="bi bi-question-diamond-fill" style="font-size: 7em; height: 10em; width: 10em;"></i>

                        <h4 class="card-text">Total no of question<br /><br />
                            <?php echo $queryCount; ?>
                        </h4>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center my-3">
            <h4 class="text-center"><strong>Want to attempt quiz ?<br /> Click on below
                    button</strong></h4>
            <div class="container">
                <button type="button text-center" class="btn btn-outline-primary my-3 w-50 p-2"
                    onclick="quiz()">Quiz</button>
            </div>
        </div>
    </div>
    <script>
        function quiz() {

            document.location = 'Admin.php';
        }
    </script>

</body>

</html>