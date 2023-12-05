<?php
include('Config.php');
include('HeaderForUser.php');

$selectLeaderboardQuery = "SELECT `Username`, MAX(`Points`) AS `MaxPoints` FROM `leaderboard` GROUP BY `Username` ORDER BY `MaxPoints` DESC";
$selectLeaderboardResult = mysqli_query($conn, $selectLeaderboardQuery);

if ($selectLeaderboardResult) {
    // Fetch and display the leaderboard data
    while ($row = mysqli_fetch_assoc($selectLeaderboardResult)) {
        $name = $row['Username'];
        $points = $row['MaxPoints'];

        echo "<div class='text-center'>Name: $name, Points: $points<br></div>";
    }


} else {
    echo "Error fetching leaderboard data: " . mysqli_error($conn);
}


?>