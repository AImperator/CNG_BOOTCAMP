<?php

/**
*This function prints the chess board in html format for the css to manage.
*@return string
*/
function print_board() :string
{
    $b_tile= "<div class=b_tile></div>";
    $w_tile= "<div class=w_tile></div>";
    $board= "";
    for($i=0;$i<=3;$i++)
    {
        for($bs=0;$bs<=3;$bs++)
        {
            $board.=$b_tile.$w_tile;
        }
        $board.="<br>";
        for($ws=0;$ws<=3;$ws++)
        {
            $board.=$w_tile.$b_tile;
        }
        $board.="<br>";
    }
    return $board;
}


