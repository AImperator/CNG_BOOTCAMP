<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Shapes</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="../Taschenrechner/calculator.php">Calculator</a>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Shapes<span class="sr-only">(current)</span></a>
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

            <div class="row text-center">

                <div class="col-12">
                    <h2 style="font-weight: bold">Print shapes through loops</h2>
                </div>

            </div>

            <div class="row text-center">

                <div class="col-12">
                    <form action="shapes.php" method="post">
                    <label for="number">Number: </label>
                    <input name='number' id="number" type="number" value="0" min="0" max="10">
                    <p>Note that the Number indicates how tall the shape should be.</p>
                    <br>
                    <label for="type">Shape type: </label>
                    <select name='type' id="type">
                        <option value="triangle">Triangle</option>
                        <option value="pyramid">Pyramid</option>
                        <option value="diamond">Diamond</option>
                    </select>
                    <label for="stars">Show stars</label>
                    <input name='stars' id="stars" type="checkbox">
                    <br>
                    <button type="submit">START</button>
                    </form>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-5">
                    <h2><?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                            if (isset($_POST['type']))
                            {
                                $type = $_POST['type'];
                            }
                            else
                            {
                                $type = "pyr";
                            }

                            if (isset($_POST['stars']))
                            {
                                $s = $_POST['stars'];
                            }
                            else
                            {
                                $s = false;
                            }

                            switch ($type)
                            {
                                case "tria":
                                    if ($s == true)
                                    {
                                        echo "Star - Triangle";
                                    }
                                    else
                                    {
                                        echo "Number - Triangle";
                                    }
                                    break;
                                case "pyr":
                                    if ($s == true)
                                    {
                                        echo "Star - Pyramid";
                                    }
                                    else
                                    {
                                        echo "Number - Pyramid";
                                    }
                                    break;
                                case "dia":
                                    if ($s == true)
                                    {
                                        echo "Star - Diamond";
                                    }
                                    else
                                    {
                                        echo "Number - Diamond";
                                    }
                                    break;
                            }
                        }
                        ?></h2>
                    <br>
                    <?php
                    require 'functions.php';
                    try
                    {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                            if (isset($_POST['number']))
                            {
                                $n = $_POST['number'];
                            }
                            else
                            {
                                $n = 0;
                            }

                            if (isset($_POST['type']))
                            {
                                $t = $_POST['type'];
                            }
                            else
                            {
                                $t = "triangle";
                            }

                            if (isset($_POST['stars']))
                            {
                                $s = $_POST['stars'];
                            }
                            else
                            {
                                $s = false;
                            }

                            if ($n != 0)
                            {
                                echo print_exe($n, $t, $s);
                            }
                            else
                            {
                                throw new ErrorException();
                            }
                        }
                        else
                        {
                            echo "<p id='result'>Site loaded</p>";
                        }
                    }
                    catch (ErrorException $ee)
                    {
                        echo $ee->getMessage(); echo "<p id='result'>Nothing to show</p>";
                    }
                    ?>
                </div>

            </div>

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

    <!-- End of Site -->

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