<?php
/**
 * Functions for spiral site
 **/

/**
 * Calls all needed functions and convert results in string to display.
 * @param int $num
 * @return string
 */
function spiral(int $num): string
{
    $cells = create_cells($num);
    $cells = draw_spiral($cells, $num);
    $i = 1;
    $result = "";
    foreach ($cells as $cell) {
        if ($i == 1) {
            $result .= "<wrap class='line'>";
        }
        $result .= get_html($cell);
        if ($i == $num) {
            $result .= "</wrap>";
            $i = 0;
        }
        $i++;
    }
    return $result;
}

/**
 * Algorithm to draw the spiral into the grid.
 * @param array $cells
 * @param int $num
 * @return array
 */
function draw_spiral(array $cells, int $num): array
{
    $x = 0;
    $bool_x_plus = true;
    $bool_x_minus = true;
    $y = 0;
    $bool_y_plus = true;
    //$bool_y_minus = true;     //not needed
    for ($i = 1; $i <= $num; $i++) {
        if ($bool_x_plus == true) {
            $pos = $x;
            for ($x; $x < ($pos + $i); $x++) {
                splat($cells, $x, $y);
            }
            $bool_x_plus = false;
        } elseif ($bool_y_plus == true) {
            $pos = $y;
            for ($y; $y < ($pos + $i); $y++) {
                splat($cells, $x, $y);
            }
            $bool_y_plus = false;
        } elseif ($bool_x_minus == true) {
            $pos = $x;
            for ($x; $x > ($pos - $i); $x--) {
                splat($cells, $x, $y);
            }
            $bool_x_minus = false;
        } else {
            $pos = $y;
            for ($y; $y > ($pos - $i); $y--) {
                splat($cells, $x, $y);
            }
            $bool_x_plus = true;
            $bool_y_plus = true;
            $bool_x_minus = true;
        }
    }
    return $cells;
}

/**
 * Creates a array filled with objects from class "cell" as a grid.
 * @param int $num
 * @return array
 */
function create_cells(int $num): array
{
    $x = intdiv($num, -2);
    $y = intdiv($num, 2);
    for ($i = 0; $i < ($num * $num); $i++) {
        $cells[$i] = new Cell($i + 1, $x, $y, false);
        $x++;
        if ($x >= $num / 2) {
            $y--;
            $x = intdiv($num, -2);
        }
    }
    return $cells;
}

/**
 * Searches the array for a specific cell and changes the color property of this cell.
 * @param array $cells
 * @param int $x
 * @param int $y
 */
function splat(array $cells, int $x, int $y)
{
    foreach ($cells as $cell) {
        if ($x == $cell->get_x_coord() && $y == $cell->get_y_coord()) {
            $cell->set_color("true");
        }
    }
}

class Cell
{
    private $cell_number;
    private $cell_x;
    private $cell_y;
    private $cell_color;

    function __construct($cell_number, $cell_x, $cell_y, $cell_color)
    {
        $this->cell_number = $cell_number;
        $this->cell_x = $cell_x;
        $this->cell_y = $cell_y;
        $this->cell_color = $cell_color;
    }

    public function get_number()
    {
        return $this->cell_number;
    }

    public function get_x_coord()
    {
        return $this->cell_x;
    }

    public function get_y_coord()
    {
        return $this->cell_y;
    }

    public function get_color()
    {
        return $this->cell_color;
    }

    public function set_color($cell_color)
    {
        $this->cell_color = $cell_color;
    }
}

/**
 * Generates the HTML version of a cell as paragraph. Either as normal grid cell or a member cell of the spiral.
 * @param Cell $cell
 * @return string
 */
function get_html(Cell $cell): string
{
    if ($cell->get_color() == true) {
        return "<p class='spiral'>Cell-number: " . $cell->get_number() .
            "<br>" . "X: " . $cell->get_x_coord() .
            " | " . "Y: " . $cell->get_y_coord() . "</p>";
    } else {
        return "<p class='show'>Cell-number: " . $cell->get_number() .
            "<br>" . "X: " . $cell->get_x_coord() .
            " | " . "Y: " . $cell->get_y_coord() . "</p>";
    }
}