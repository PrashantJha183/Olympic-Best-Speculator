<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <script src="path/to/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-n50KdWos5V9PtuRRqM+8EluxXqUZlKTBJNLrA2w9bLzhzfe+5CZo8m+2FfXCVBVO"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <title>Olympic Best Speculator</title>
    <style>
        #mode {
            cursor: pointer;

        }


        body {
            transition: background-color 0.5s;

        }

        /* .navbar-custom {
            transition: background-color 0.5s, color 0.5s;
        } */

        /* Dark mode styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
            /* color: #333; */

        }

        /* Light mode styles */
        body.light-mode {
            background-color: #fff;
            color: #333;

        }

        .navbar-custom {
            transition: background-color 0.5s, color 0.5s;
        }

        /* Dark mode navbar styles */
        body.dark-mode .navbar-custom {
            background-color: #222 !important;
            color: #fff !important;

        }

        /* Light mode navbar styles */
        body.light-mode .navbar-custom {
            background-color: #f8f9fa !important;
            color: #333 !important;

        }
    </style>
</head>

<body class="light-mode">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">Olympic Best Speculator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="LeaderboardForNoLogin.php"><i
                                class="bi bi-trophy">&nbsp;Leaderboard</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="TeamForNoLogin.php"><i
                                class="bi bi-people">&nbsp;Teams</i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Admin/AdminLogin.php"><i
                                class="bi bi-person-square">&nbsp;Admin</i></a>
                    </li>







                </ul>
            </div>
        </div>
    </nav>


</body>


</html>