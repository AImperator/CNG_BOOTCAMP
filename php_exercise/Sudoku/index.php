<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sudoku</title>
        <meta name="description" content="Sudoku">
        <link rel="stylesheet" href="main.css">
    </head>    
    <body>
        <h1>Sudoku</h1>
        <form action="#" method="post">
            <input name="FORM_ID" type="hidden" value="1">
        <label>Size:
        <input name="size" type="number" min="2" max="3">
        </label>
        <label>Level:
        <select name="level">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        </label>
        <button type="submit">New Game</button>
        </form>
        <h2><?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {                
                if (isset($_POST["level"]))
                {
                    $level = $_POST["level"];
                }
                else
                {
                    $level = "easy";
                }
                switch ($level)
                {
                    case "easy":
                        echo "Easy Level";
                        break;
                    case "medium":
                        echo "Medium Level";
                        break;
                    case "hard":
                        echo "Hard Level";
                        break;
                }
            }
            ?></h2>
        <br>
        <form action="#" method="post">
            <input name="FORM_ID" type="hidden" value="2">
        <div class="display">
        <?php
            require "functions.php";
            try
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["FORM_ID"] == "1")
                {
                    if (isset($_POST["size"]))
                    {
                        $size = $_POST["size"];
                    }
                    else
                    {
                        $size = 2;
                    }

                    if (isset($_POST["level"]))
                    {
                        $level = $_POST["level"];
                    }
                    else
                    {
                        $level = "easy";
                    }
                    echo draw_board($size*3, $level);
                }
                else
                {
                    echo "<p class='show'>Site loaded</p>";
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["FORM_ID"] == "2")
                {

                }
            }
            catch (Exception $ex)
            {
               echo $ex->getMessage();
            }            
        ?>
        </div>
            <button type="submit">Check</button>
        </form>
    </body>    
    <foot>
        <p>Thank you for playing this game!</p>
        <p><img src="./media/favicon.ico" alt="Logo ITP-W"> Created by ITP-W</p>
    </foot>    
    
</html>