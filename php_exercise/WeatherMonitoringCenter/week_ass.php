<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Weather Monitoring Center</title>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Weather Monitoring Center<span class="sr-only">(current)</span></a>
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

                <div class="row mb-3">

                    <div class="col-12 text-center">
                        <h2 style="font-weight: bold">Welcome to our weather monitoring center</h2>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <img src="./media/clouds_panorama.jpg" class="img-fluid" alt="Responsive image">
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 text-center">
                        <h2>Here you can find the temperature values of a given time period.</h2>
                    </div>

                </div>

                <div class="row mb-2 text-center">

                    <div class="col-4">
                        <a href="wmc_ass.php" class="btn php_main btn-rounded">Last day</a>
                    </div>

                    <div class="col-4">
                        <a href="week_ass.php" class="btn php_main btn-rounded">Last week</a>
                    </div>

                    <div class="col-4">
                        <a href="year_ass.php" class="btn php_main btn-rounded">Last year</a>
                    </div>

                </div>

                <div class="row mt-5">

                    <div class="col-12 text-center">
                        <form action="week_ass.php" method="post">
                            <input name="FORM_ID" type="hidden" value="1">
                            <button type="submit">Show Data</button>
                        </form>
                        <br>
                        <p style="text-align: center;">
                            <span class="sign">&darr;</span>
                            Here are the temperatures of the last week
                            <span class="sign">&darr;</span>
                        </p>
                        <br>
                        <div class="wmc_display" style="font-weight: bold">
                            <?php
                            require "func_ass.php";
                            try {
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["FORM_ID"] == "1") {
                                    $week = load_week();
                                    echo "<pre class='wmc_show'>" . print_r($week) . "</pre>";
                                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["FORM_ID"] == "2") {
                                    $week = create_week();
                                    save_week($week);
                                    echo "<pre class='wmc_show'>" . print_r($week) . "</pre>";
                                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["FORM_ID"] == "3") {

                                    if (isset($_POST["days"]) == true) {
                                        $days = $_POST["days"];
                                    } else {
                                        throw new ErrorException($message = "No days given");
                                    }
                                    if (isset($_POST["hour"]) == true) {
                                        $hour = $_POST["hour"];
                                    } else {
                                        throw new ErrorException($message = "No hour given");
                                    }
                                    if (isset($_POST["degrees"]) == true) {
                                        $temp = $_POST["degrees"];
                                    } else {
                                        throw new ErrorException($message = "No temperature given");
                                    }
                                    $week = load_week();
                                    $week = change_temp_week($week, $days, $hour, $temp);
                                    save_week($week);
                                    echo "<pre class='wmc_show'>" . print_r($week) . "</pre>";
                                }
                            } catch (ErrorException $ee) {
                                echo "<p class='wmc_show'>" . $ee . "</p>";
                            }?>
                        </div>
                        <br>
                        <form action="week_ass.php" method="post">
                            <input name="FORM_ID" type="hidden" value="2">
                            <button type="submit">New Temperatures</button>
                        </form>
                        <br>
                        <form action="week_ass.php" method="post">
                            <input name="FORM_ID" type="hidden" value="3">
                            <label for="days">On which day you want to change?</label>
                            <select name="days">
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                            <br>
                            <label for="hour">At which hour you want to change?</label>
                            <select name="hour">
                                <option value="01 AM">01 AM</option>
                                <option value="02 AM">02 AM</option>
                                <option value="03 AM">03 AM</option>
                                <option value="04 AM">04 AM</option>
                                <option value="05 AM">05 AM</option>
                                <option value="06 AM">06 AM</option>
                                <option value="07 AM">07 AM</option>
                                <option value="08 AM">08 AM</option>
                                <option value="09 AM">09 AM</option>
                                <option value="10 AM">10 AM</option>
                                <option value="11 AM">11 AM</option>
                                <option value="12 AM">12 AM</option>
                                <option value="01 PM">01 PM</option>
                                <option value="02 PM">02 PM</option>
                                <option value="03 PM">03 PM</option>
                                <option value="04 PM">04 PM</option>
                                <option value="05 PM">05 PM</option>
                                <option value="06 PM">06 PM</option>
                                <option value="07 PM">07 PM</option>
                                <option value="08 PM">08 PM</option>
                                <option value="09 PM">09 PM</option>
                                <option value="10 PM">10 PM</option>
                                <option value="11 PM">11 PM</option>
                                <option value="12 PM">12 PM</option>
                            </select>
                            <br>
                            <label for="degrees">How much degrees was it really?</label>
                            <input name="degrees" type="number" step="0.01">
                            <br>
                            <button type="submit">Change Value</button>
                        </form>
                        <br>
                        <p style="text-align: center;">This version works with association arrays.
                            <a href="week.php">Click here to visit the integer arrays version</a>
                        </p>
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