<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shapes</title>
        <meta name="description" content="Check if input is a palindrome">
        <link rel="stylesheet" href="main.css">
    </head>    
    <body>
        <h1>Palindrome - Checker</h1>
        <form action="index.php" method="post">
        <label for="input">Wort eingeben: </label>
        <input name='input' id="input" type="text">
        <br>
        <button type="submit">Check it!</button>
        </form>
        <br>
        <p id='result'><?php
            require 'functions.php';
            
            try
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    if (isset($_POST['input']))
                    {
                        $input = $_POST['input'];
                    }
                    else
                    {
                        $input = "no";
                    }                    

                    if ($input != 0)
                    {
                        echo print_exe($input);
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
                echo "Nothing to show";
            }            
        ?></p>
    </body>    
    <foot>
        <p>Thank you for using this tool!</p>
        <p><img src="./media/favicon.ico" alt="Logo ITP-W"> Created by ITP-W</p>
    </foot>    
    
</html>