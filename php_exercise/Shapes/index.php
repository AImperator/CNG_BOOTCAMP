<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shapes</title>
        <meta name="description" content="Print shapes through loops">
        <link rel="stylesheet" href="main.css">
    </head>    
    <body>
        <h1>Print shapes through loops</h1>
        <form action="index.php" method="post">
        <label for="number">Number: </label>
        <input name='number' id="number" type="number">
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
        <br>
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
    </body>    
    <foot>
        <p>Thank you for using this tool!</p>
        <p><img src="./media/favicon.ico" alt="Logo ITP-W"> Created by ITP-W</p>
    </foot>    
    
</html>