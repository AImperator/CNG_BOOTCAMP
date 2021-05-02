<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Calculator</title>
        <!-- MDB icon -->
        <link rel="icon" href="../../img/favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="../../css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body class="php_background">
    <!--Start of Site-->

    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light php_main">

            <!--Additional Container-->
            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="../php_home.html" style="font-weight: bold">PHP</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">
                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../php_home.html">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Calculator<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Chess_Board/chessboard.php">Chessboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Palindrome/palindrome.php">Palindrome</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../WeatherMonitoringCenter/wmc.php">Weather Monitoring Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Shapes/shapes.php">Shapes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Spiral/spiral.php">Spiral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Sudoku/sudoku.php">Sudoku</a>
                        </li>
                    </ul>
                    <!-- Links -->
                </div>
                <!-- Collapsible content -->

            </div>
            <!--Additional Container-->

        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
        <!--Main container-->
        <div class="container">

            <!--Grid row-->
            <div class="row mb-3">

                <!--Grid column-->
                <div class="col-12 text-center">
                    <h2 style="font-weight: bold">Calculator</h2>
                </div>

            </div>

            <!--Grid row-->
            <div class="row mb-2">

                <!--Grid column-->
                <div class="col-12 max_size text-center">
                    <form action="#" method="post">
                    <label for="no1">Number 1: </label>
                    <input name="no1" id="no1" type="number">
                    <br>
                    <label for="type">Calculation type: </label>
                    <select name="type" id="type">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                    <br>
                    <label for="no2">Number 2: </label>
                    <input name="no2" id="no2" type="number">
                    <br>
                    <button type="submit">CALCULATE</button>
                    </form>
                    <br>
                    <label for="result">Result: </label>
                    <p class="font-weight-bold" id="result"><?php
                        require 'functions.php';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                            if (isset($_POST['no1']))
                            {
                                $first_number = $_POST["no1"];
                            }
                            else
                            {
                                $first_number = 0;
                            }

                            if (isset($_POST['type']))
                            {
                                $type = $_POST["type"];
                            }
                            else
                            {
                                $type = "+";
                            }

                            if (isset($_POST['no2']))
                            {
                            $second_number = $_POST["no2"];
                            }
                            else
                            {
                                $second_number = 0;
                            }

                            echo check_input($first_number, $second_number, $type);
                        }

                    ?></p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!--Main container-->
    </main>
    <!--Main layout-->

    <!-- Footer -->
    <footer class="page-footer font-small php_main pt-4 mt-4 text-center">
        <div class="container" style="color: black">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6">

                    <!-- Content -->
                    <h5 class="text-uppercase">PHP exercises</h5>
                    <p>Demonstration-Site of my solutions to the given PHP exercises</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-6">

                    <!-- Links -->
                    <h5 class="text-uppercase">Base-menu</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="../../index.html" style="color: black; border: black;">Topic-Menu</a>
                        </li>
                        <li>
                            <a href="https://github.com/AImperator/CNG_BOOTCAMP.git" style="color: black; border: black;"><i class="fab fa-github"></i> GitHub</a>
                        </li>
                        <li>
                            <a href="../../impressum.html" style="color: black; border: black;">Impressum</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>

        <!-- Info -->
        <div class="footer-copyright py-3">made by ITP-Wendisch</div>
        <!-- Info -->

    </footer>
    <!-- Footer -->

    <!--End of Site-->

    <!-- jQuery -->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../js/mdb.min.js"></script>
    <!-- site specific scripts -->
    <script></script>
    </body>
</html>