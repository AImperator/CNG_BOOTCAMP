<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Taschenrechner</title>
        <meta name="description" content="Mein erster Taschenrechner als Webapp.">
        <link rel="stylesheet" href="main.css">
    </head>    
    <body>
        <h1>Taschenrechner 1.0</h1>
        <form action="./index.php" method="post">
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
        <p id="result"><?php            
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
        <p>Thank you for using this tool!</p>
    </body>    
    <foot>
        <p><img src="./media/favicon.ico" alt="Logo ITP-W"> Created by ITP-W</p>
    </foot>    
    
</html>