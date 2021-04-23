<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>JavaScript</title>
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
<body>
<!-- Start of Site -->

<div class="js_background min-vh-100">

    <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark js_main">

            <!--Additional Container-->
            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="js_home.html">JavaScript</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="js_home.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lightbulp.html">Lightbulp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="balloons.html">Balloons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rps.html">Rock Paper Scissors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="todolist.html">To Do List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="flashcards.html">Flashcards</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Calculator
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                    <!-- Links -->
                </div>
                <!-- Collapsible content -->

            </div>
            <!--Additional Container-->

        </nav>
        <!--/.Navbar-->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
        <!--Main container-->
        <div class="container">

            <!--Grid row-->
            <div class="row text-center">

                <!--Grid column-->
                <div class="col-lg-12 mt-2">

                    <h2 style="font-weight: bold">Chess Board for Tablets</h2>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row justify-content-center text-center">

                <!--Grid column-->
                <div class="col-12 mt-2">

                    <div id='board'>
                        <?php
                        require 'functions.php';
                        echo print_board();
                        ?>
                    </div>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!--Main container-->
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="fixed-bottom">
        <!-- Footer -->
        <footer class="page-footer font-small js_main pt-4 mt-4 text-center">

            <!-- Footer Links -->
            <div class="container">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h5 class="text-uppercase">JavaScript exercises</h5>
                        <p>Demonstration-Site of my solutions to the given JavaScript exercises</p>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">Base-menu</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="../../index.html">Topic-Menu</a>
                            </li>
                            <li>
                                <a href="../../impressum.html">Impressum</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Info -->
            <div class="footer-copyright py-3">made by ITP-Wendisch</div>
            <!-- Info -->

        </footer>
        <!-- Footer -->
    </footer>
    <!--Footer-->

</div>

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