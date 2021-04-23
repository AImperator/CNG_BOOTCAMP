<html lang="english">
<head>
    <meta charset="utf-8">
    <title>Spiral</title>
    <meta name="description" content="Spiral">
    <link rel="stylesheet" href="main.scss">
</head>
<body>
<h1>Spiral</h1>
<p>This site will draw a spiral. You can set the height and width by fill in a number.</p>
<div class="display">
    <?php
    require "func.php";
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["num"])) {
                $num = $_POST["num"];
            } else {
                $num = 10;
            }
            echo spiral($num);
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "<h2>welcome</h2>";
        } else {
            throw new Exception("WTF");
        }
    } catch (Exception $ex) {
        echo $ex["message"];
    }
    ?>
</div>
<div class="form">
    <form action="#" method="post">
        <label class="num_input">
            <input name="num" type="number" min="2" max="15">
        </label>
        <label class="button">
            <button type="submit">GO</button>
        </label>
    </form>
</div>
</body>
<foot>
    <p>Thank you for using this tool!</p>
    <p><img src="./media/favicon.ico" alt="Logo ITP-W"> Created by ITP-W</p>
</foot>
</html>