<?php
/**
 * functions for Sudoku game
 */

/**
 * This function executes all other functions till a valid game is created. Probably for ever.
 * @param int $size
 * @param string $level
 * @return string
 */
function draw_board(int $size, string $level): string
{
    do {
        $grid = create_grid($size);
        $grid = set_difficulty($grid, $size, $level);
        $board = fill_grid($grid, $size);
        if (validate($board) == true) {
            $result = convert($board);
        }
    } while (validate($board) == false);
    return $result;
}


/**
 * @param int $size
 * @return array
 */
function create_grid(int $size): array
{
    $cell = ["number", "value", "solution", "right", "x", "y"];
    $n = 1;
    for ($i = $size; $i > 0; $i--) {
        for ($c = 1; $c <= $size; $c++) {
            $cell["number"] = $n;
            $cell["value"] = null;
            $cell["solution"] = 0;
            $cell["x"] = $c;
            $cell["y"] = $i;
            $grid[] = $cell;
            $n++;
        }
    }
    return $grid;
}


/**
 * @param array $board
 * @param int $size
 * @param string $level
 * @return array
 */
function set_difficulty(array $board, int $size, string $level) :array
{
    switch ($level) {
        case "easy":
            $static = $size * 4;
            break;
        case "medium":
            $static = $size * 2;
            break;
        case "hard":
            $static = $size;
            break;
    }
    $rand_number = rand(1, $size * $size);
    $rand_value = rand(1, 9);
    for ($i = 1; $i <= $static; $i++) {
        foreach ($board as $cell) {
            if ($board["number"] = $rand_number) {
                $board["value"] = "value='" . $rand_value . "' readonly";
            }
        }
    }
    return $board;
}


/**
 * @param array $board
 * @param int $size
 * @return array
 */
function fill_grid(array $board, int $size): array
{
    $finish = false;
    $row = $size;
    $col = 0;
    do {
        foreach ($board as $number) {
            if ($board["x"] = $row && $board["y"] = $col) {
                if ($board["solution"] != 0) {
                    $col++;
                }
            }
        }
        for ($num = 1; $num < 10; $num++) {
            if (isSafe($board, $size, $row, $col, $num) == true) {
                foreach ($board as $number) {
                    if ($board["x"] = $row && $board["y"] = $col) {
                        $board["solution"] = $num;
                    }
                }
            }
        }
        foreach ($board as $cell) {
            if ($board["x"] = $row && $board["y"] = $col) {
                $board["solution"] = 0;
            }
        }

        if ($row = 0 && $col = $size) {
            $finish = true;
        }
        if ($col = $size) {
            $row--;
            $col = 0;
        }
    } while ($finish == false);
    return $board;
}


/**
 * @param array $board
 * @param int $size
 * @param int $row
 * @param int $col
 * @param int $num
 * @return bool
 */
function isSafe(array $board, int $size, int $row, int $col, int $num) :bool
{
    for ($similar_row = 0; $similar_row <= $size; $similar_row++) {
        foreach ($board as $number) {
            if ($board["x"] = $row && $board["y"] = $similar_row) {
                if ($board["solution"] = $num) {
                    return false;
                }
            }
        }
    }
    for ($similar_col = 0; $similar_col <= $size; $similar_col++) {
        foreach ($board as $number) {
            if ($board["x"] = $similar_col && $board["y"] = $col) {
                if ($board["solution"] = $num) {
                    return false;
                }
            }
        }
    }
    $start_row = $row - $row % 3;
    $start_col = $col - $col % 3;
    for ($i = 1; $i <= 3; $i++) {
        for ($c = 1; $c <= 3; $c++) {
            foreach ($board as $number) {
                if ($board["x"] = $i + $start_row && $board["y"] = $c + $start_col) {
                    if ($board["solution"] = $num) {
                        return false;
                    }
                }
            }
        }
    }
    return true;
}


/**
 * @param array $board
 * @return bool
 */
function validate(array $board): bool
{
    foreach ($board as $number) {
        if ($board[$number]["solution"] == 0 || $board[$number]["solution"] == null) {
            return false;
        }
    }
    return true;
}


/**
 * @param array $board
 * @return string
 */
function convert(array $board): string
{
    $string = "";
    foreach ($board as $cell) {
        $string .= "<input name='Cell " . $board[$cell] . "' type='number'" . $board["value"] . " " . $board["right"] . ">";
    }
    return $string;
}

/*
 * echo "<pre>". print_r($_POST["test"], true)."</pre>";
 *<input name="test[0][0]" type="number" value="<?php echo $_POST["test"][0][0] ?? '' ?>">
 *<input name="test[0][1]" type="number" value="8" readonly>
 *<input name="test[1][0]" type="number">
*/
