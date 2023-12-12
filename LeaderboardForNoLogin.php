<?php
include('Config.php');
include('Header.php');

$selectLeaderboardQuery = "SELECT
`Username`,
MAX(`Points`) AS `MaxPoints`,
DENSE_RANK() OVER (ORDER BY MAX(`Points`) DESC) AS `Rank`
FROM
`leaderboard`
GROUP BY
`Username`
ORDER BY
`MaxPoints` DESC;";
$selectLeaderboardResult = mysqli_query($conn, $selectLeaderboardQuery);

if ($selectLeaderboardResult) {
    // Fetch and display the leaderboard data
    ?>
    <div class="container my-5 py-5">

    <div class="table-responsive">
            <table class="table table-bordered -dark table-striped">
                <thead class="thead-dark">
                    <tr class="table-success">
                        <th class=" text-center">
                            <h3>Position</h3>
                        </th>
                        <th class="text-center">
                            <h3>Username</h3>
                        </th>
                        <th class="text-center">
                            <h3>Points</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($selectLeaderboardResult)) {
                        $name = $row['Username'];
                        $maxPoints = $row['MaxPoints'];
                        $rank = $row['Rank'];

                        echo "<tr class='text-center'><td>" . $rank . "</td><td>" . $name . "</td><td> " . $maxPoints . "</td></tr>";
                    }


                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php



} else {
    echo "Error fetching leaderboard data: " . mysqli_error($conn);
}


?>