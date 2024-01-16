<?php
session_start();
$save = $_SESSION['ulogin'];

include('Config.php');

include('HeaderForUser.php');
// $save = $_SESSION['ulogin'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympic Best Speculator</title>
    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            color: #000;

        }


        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            color: #000;

            overflow: hidden;

        }
    </style>
</head>

<body>
    <!-- <div class="container"> -->
    <h1 class="text-center my-5">WELCOME
        <?php if ($save) {
            echo $save;
        } else {
            "";
        } ?> TO Olympic Best Speculator
    </h1>
    <!-- </div> -->
    <div class="container d-flex justify-content-center align-items-center">


        <div class="row justify-content-center">

            <div id="carouselExampleInterval" class="carousel slide my-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="Images/Amrutlal Maganlal Shah Parivaar.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src='Images/Bhogilal Manilal Shah.png' class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Dahyalal Walchand Shah.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Anuben PrakashKumar shah.jpeg" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Darshan Ankit & Rehang.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Devchand Jethalal Sanghvi Parivaar.png"
                            class="d-block mx-auto my-auto img-fluid" alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Gandhi Parivaar.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Matushri Madhukantaben Kantilal Vora.png"
                            class="d-block mx-auto my-auto img-fluid" alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Sacheta Parivaar.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Shardaben Ramanlal shah (Chetanaben Lalitkumar Shah).png"
                            class="d-block mx-auto my-auto img-fluid" alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/subhashbhai ramanlal shah.png" class="d-block mx-auto my-auto img-fluid"
                            alt="No images to show">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="Images/Swargiya Jitendra Ramanlal Gandhi.png"
                            class="d-block mx-auto my-auto img-fluid" alt="No images to show">
                    </div>
                </div>
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
            </div>

        </div>
        <!-- <button type="button" class="btn btn-outline-warning">Warning</button> -->
    </div>
    <div class="text-center my-3">
        <h4 class="text-center"><strong>Want to attempt quiz ?<br /> Click on below
                button</strong></h4>
        <div class="container">
            <button type="button text-center" class="btn btn-outline-primary my-3 w-50 p-2"
                onclick="quiz()">Quiz</button>
        </div>
    </div>
    <script>
        function quiz() {

            document.location = 'Quiz.php';
        }
    </script>

</body>


</html>