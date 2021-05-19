<?php
//Functions
/**
 *Switch that catches jquery call and initiate php functions.
 * @param string a
 * @param string b
 * @return string
 */
switch ($_POST["a"])
{
    case "create_playground":
        create_playground($_POST["b"]);
        break;
    case "create_debug":
        create_debug_playground($_POST["b"]);
        break;
    default:
        break;
}
/**
 *This is the main function, that calls a necessary functions to create the playground.
 * @param string $n
 * @echo string
 */
function create_playground(string $n)
{
    $size = 0;
    switch ($n){
        case "small":
            $size = 12;
            break;
        case "medium":
            $size = 18;
            break;
        case "large":
            $size = 24;
            break;
    }
    $playground_code = create_floor($size);
    $playground_code = build_walls($playground_code, $size);
    echo convert_to_html($playground_code, $size);
}

/**
 * Creates the playground and fills it with floor tiles.
 * @param int $size
 * @return array
 */
function create_floor(int $size): array
{
    $playground = [];
    $counter = 0;
    for ($rows = 1; $rows <= $size; $rows++) {
        for ($cols = 1; $cols <= $size; $cols++) {
            $i = $cols . "_" . $rows;
            $playground[$counter] = new Part_of_playground($i, $cols, $rows, "floor");
            $counter++;
        }
    }
    return $playground;
}
/**
 * Builds walls on the floored playground.
 * @param array $playground
 * @param int $size
 * @return array
 */
function build_walls(array $playground, int $size): array
{
    //Build the fix outer walls
    foreach ($playground as $outer_wall) {
        if ($outer_wall->get_x() == 1 || $outer_wall->get_y() == 1){
            $outer_wall->set_kind("wall");
        }
        if ($outer_wall->get_x() == $size || $outer_wall->get_y() == $size){
            $outer_wall->set_kind("wall");
        }
    }

    //Build random maze walls
    $chamber_store = [];
    $vertical_block = [];
    $horizontal_block = [];
    $chamber_store[] = new Chamber(2, $size - 1, 2, $size - 1);
    $vertical_block[] = array(1, 2, $size, $size - 1);
    $horizontal_block[] = array(1, 2, $size, $size - 1);
    foreach ($chamber_store as $chamber){
        $left_x = $chamber->get_left_x();
        $right_x = $chamber->get_right_x();
        $top_y = $chamber->get_top_y();
        $bottom_y = $chamber->get_bottom_y();
        //Vertical wall
        try {
            do{
                $vertical_wall = random_int($left_x +1, $right_x -1);
            }while (in_array($vertical_wall, $vertical_block) == true);
            $vertical_door = random_int($top_y + 1, $bottom_y - 1);
            $horizontal_block[] = $vertical_door;
            foreach ($playground as $wall) {
                if  ($wall->get_x() == $vertical_wall && in_array($wall->get_y(), $horizontal_block) == false)
                {
                    $wall->set_kind("wall");
                }
            }
        } catch (Exception $e) {
            echo "vertical", $e->getMessage();
        }
        //Horizontal wall
        try {
            do{
                $horizontal_wall = random_int($top_y +1, $bottom_y -1);
            }while (in_array($horizontal_wall, $horizontal_block) == true);
            $horizontal_door = random_int($left_x + 1, $vertical_wall - 1);
            $vertical_block[] = $horizontal_door;
            foreach ($playground as $wall) {
                if  ($wall->get_y() == $horizontal_wall && $wall->get_x() <= $vertical_wall && in_array($wall->get_x(), $vertical_block) == false)
                {
                    $wall->set_kind("wall");
                }
            }
        } catch (Exception $e) {
            echo "horizontal", $e->getMessage();
        }
        //Register new chambers
        //upper left
        if ($vertical_wall - $left_x >= 2 && $horizontal_wall - $top_y >= 2){
            $chamber_store[] = new Chamber($left_x + 1, $vertical_wall - 1, $top_y + 1, $horizontal_wall - 1);
        }
        //lower left
        if ($vertical_wall - $left_x >= 2 && $bottom_y - $horizontal_wall >= 2){
            $chamber_store[] = new Chamber($left_x + 1, $vertical_wall - 1, $horizontal_wall + 1, $bottom_y - 1);
        }
        //right
        if ($right_x - $vertical_wall >= 2 && $bottom_y - $top_y >= 2){
            $chamber_store[] = new Chamber($vertical_wall + 1, $right_x - 1, $top_y + 1, $bottom_y - 1);
        }
    }

    //Set the fix start and finish
    foreach ($playground as $st_fin) {
        //Fix Finish
        if  ($st_fin->get_x() == 2 && $st_fin->get_y() == 1)
        {
            $st_fin->set_kind("start_finish");
        }
        //Fix Start
        if  ($st_fin->get_x() == $size - 1 && $st_fin->get_y() == $size)
        {
            $st_fin->set_kind("start_finish");
        }
    }

    //Set the fix player start position
    foreach ($playground as $player) {
        if  ($player->get_x() == $size - 1 && $player->get_y() == $size)
        {
            $player->set_kind("player");
        }
    }

    return $playground;
}
/**
 * Converting php code to html.
 * @param array $code
 * @param int $size
 * @return string
 */
function convert_to_html(array $code, int $size): string
{
    $counter = 0;
    $playground = "";
    for ($rows = 1; $rows <= $size; $rows++) {
        $playground .= "<div class='row text-center'><div class='col-12'>";
        for ($cols = 1; $cols <= $size; $cols++) {
            $playground .= "<div id='" . $code[$counter]->get_id() . "' class='" . $code[$counter]->get_kind() . "'><p class='playground_part'>" . $code[$counter]->get_id() . "</p></div> ";
            $counter++;
        }
        $playground .= "</div></div>";
    }
    return $playground;
}



//Debug specific functions
/**
 *This is the DEBUG main function, that calls a necessary functions to create the playground.
 * @param string $n
 * @echo string
 */
function create_debug_playground($size){
    $playground_code = create_floor($size);
    $playground_code = build_debug_walls($playground_code, $size);
    echo convert_to_html($playground_code, $size);
}

/**
 * Builds fix walls to debug on the floored playground.
 * @param array $playground
 * @param int $size
 * @return array
 */
function build_debug_walls(array $playground, int $size): array
{
    //Build the fix outer walls
    foreach ($playground as $outer_wall) {
        if ($outer_wall->get_x() == 1 || $outer_wall->get_y() == 1){
            $outer_wall->set_kind("wall");
        }
        if ($outer_wall->get_x() == $size || $outer_wall->get_y() == $size){
            $outer_wall->set_kind("wall");
        }
    }

    //Build fix maze walls
    foreach ($playground as $maze_wall) {
        if ($maze_wall->get_x() == 6 || $maze_wall->get_y() == 6){
            $maze_wall->set_kind("wall");
        }
        if ($maze_wall->get_x() == 12 || $maze_wall->get_y() == 12){
            $maze_wall->set_kind("wall");
        }
    }

    //Set the fix doors
    foreach ($playground as $door) {
        if (($door->get_x() == 6 || $door->get_x() == 12) && ($door->get_y() == 3 || $door->get_y() == 9 || $door->get_y() == 15))
            $door->set_kind("floor");
        if (($door->get_y() == 6 || $door->get_y() == 12) && ($door->get_x() == 3 || $door->get_x() == 9 || $door->get_x() == 15))
            $door->set_kind("floor");
    }

    //Set the fix start and finish
    foreach ($playground as $st_fin) {
        //Fix Finish
        if  ($st_fin->get_x() == 2 && $st_fin->get_y() == 1)
        {
            $st_fin->set_kind("start_finish");
        }
        //Fix Start
        if  ($st_fin->get_x() == $size - 1 && $st_fin->get_y() == $size)
        {
            $st_fin->set_kind("start_finish");
        }
    }

    //Set the fix player start position
    foreach ($playground as $player) {
        if  ($player->get_x() == $size - 1 && $player->get_y() == $size)
        {
            $player->set_kind("player");
        }
    }

    return $playground;
}



//Classes
/**
 * Class Part_of_playground.
 */
class Part_of_playground{
    private $id;
    private $pos_x;
    private $pos_y;
    private $kind;
    function __construct($i, $x, $y, $k){
        $this->id = $i;
        $this->pos_x = $x;
        $this->pos_y = $y;
        $this->kind = $k;
    }
    public function get_id():string{
        return $this->id;
    }
    public function get_x():int{
        return $this->pos_x;
    }
    public function get_y():int{
        return $this->pos_y;
    }
    public function get_kind():string{
        return $this->kind;
    }
    public function set_kind($k){
        $this->kind = $k;
    }
}
/**
 * Class chamber.
 */
class Chamber{
    private $left_x;
    private $right_x;
    private $top_y;
    private $bottom_y;
    function __construct($l_x, $r_x, $t_y, $b_y){
        $this->left_x = $l_x;
        $this->right_x = $r_x;
        $this->top_y = $t_y;
        $this->bottom_y = $b_y;
    }
    public function get_left_x():int{
        return $this->left_x;
    }
    public function get_right_x():int{
        return $this->right_x;
    }
    public function get_top_y():int{
        return $this->top_y;
    }
    public function get_bottom_y():int{
        return $this->bottom_y;
    }
}
