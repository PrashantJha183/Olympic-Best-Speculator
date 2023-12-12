<?php
include('Config.php');
include('HeaderForAdmin.php');

// Check if the search form is submitted
if (isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    // Query to search for the specific username, position, or points
    $selectLeaderboardQuery = "SELECT * FROM (
        SELECT
            `Username`,
            MAX(`Points`) AS `MaxPoints`,
            DENSE_RANK() OVER (ORDER BY MAX(`Points`) DESC) AS `Rank`
        FROM
            `leaderboard`
        GROUP BY
            `Username`
    ) AS UserRank
    WHERE 
        `Username` LIKE '%$searchTerm%'
        OR `Rank` = '$searchTerm'
        OR `MaxPoints` = '$searchTerm'
    ORDER BY
        `MaxPoints` DESC;";
} else {
    // Default query to fetch all leaderboard data and calculate rank
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
}

$selectLeaderboardResult = mysqli_query($conn, $selectLeaderboardQuery);

?>

<div class="container my-5 py-5">

    <!-- Search form -->
    <form method="post" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by Username, Rank, or Points" name="searchTerm"
                autocomplete="off">&nbsp;&nbsp;
            <button type="submit" class="btn btn-outline-primary rounded" name="search">Search</button>
        </div>
    </form>

    <!-- Display leaderboard data -->
    <?php
    if ($selectLeaderboardResult) {
        if (mysqli_num_rows($selectLeaderboardResult) > 0) {
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr class="table-success">
                            <th class="text-center">
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
            <?php
        } else {
            echo "<p class='text-center'>No results found.</p>";
        }
    } else {
        echo "<p class='text-center'>Error fetching leaderboard data: " . mysqli_error($conn) . "</p>";
    }
    ?>
</div>