<?php
include('Config.php');
include('HeaderForAdmin.php');

$user = "SELECT `Username`,`Name` from `user`";
$userResult = mysqli_query($conn, $user);

if ($userResult) {
    // Fetch and display the leaderboard data
    ?>
    <div class="container my-5 py-5">

        <div class="table-responsive">
            <table class="table table-bordered -dark table-striped">
                <thead class="thead-dark">
                    <tr class="table-primary">
                        <th class=" text-center">
                            <h3>No</h3>
                        </th>
                        <th class="text-center">
                            <h3>Name</h3>
                        </th>
                        <th class="text-center">
                            <h3>Username</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($userResult)) {
                        $name = $row['Name'];
                        $userName = $row['Username'];


                        echo "<tr class='text-center'><td>" . $counter . "</td><td>" . $name . "</td><td> " . $userName . "</td></tr>";
                        $counter++;
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