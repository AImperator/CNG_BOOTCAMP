<?php

/**
*This function starts the necessary functions to print the correct shape.
*It also converts the arrays given from the functions to a html-paragraph string.
*@param int $n
*@param string $t
*@param bool $s
*@return string
*/
function print_exe(int $n, string $t, bool $s) :string
{
    switch ($t)
    {
        case "triangle":
            $print = print_triangle($n, $s);
            $result ="<p>".implode("<br>", $print)."</p>";
            break;
        case "pyramid":
            $print = print_pyramid($n, $s);
            $result = "<p style='text-align: center'>".implode("<br>", $print)."</p>";
            break;
        case "diamond":
            $print = print_diamond($n, $s);
            $result = "<p style='text-align: center'>".implode("<br>", $print)."</p>";
            break;
    }
    return $result;
}



/**
* Print ascending numbers from one up to the input number in shape of a triangle.
* If the bool is true it prints stars insted of numbers.
* @parm int $n
* @parm bool $s
* @return array
*/
function print_triangle(int $n, bool $s) : array
{
    $line = "";
    switch ($s)
    {
        case false:
            for($i=1; $i <= $n; $i++)
            {
                $line .= "$i ";
                $all_lines[$i-1] = $line;
            }
            break;
        case true:
            for($i=1; $i <= $n; $i++)
            {
                $line .= "*";
                $all_lines[$i-1] = $line;
            }
            break;
    }    
    return $all_lines;
}



/**
* Uses the print_triangle-triangle and mirrors it to get the shape of a pyramid.
* If the bool is true it prints stars insted of numbers.
* @parm int $n
* @parm bool $s
* @return array
*/
function print_pyramid(int $n, bool $s) : array
{
    $triangle = print_triangle($n, $s);
    $line = "";
    $counter_part[] = "";
    switch ($s)
    {
        case false:
            for($i = 1; $i <= $n-1; $i++)
            {
                $line = "$i ".$line;
                $counter_part[$i] = $line;
            }
            break;
        case true:
            for($i = 1; $i <= $n-1; $i++)
            {
                $line = "*".$line;
                $counter_part[$i] = $line;
            }
            break;
    }
    for($i = 0; $i < $n; $i++)
    {
        $all_lines[$i] = $triangle[$i].$counter_part[$i];
    }
    return $all_lines;
}



/**
* Uses the print_pyramid-pyramid and mirrors it to get the shape of a diamond.
* If the bool is true it prints stars insted of numbers.
* @parm int $n
* @parm bool $s
* @return array
*/
function print_diamond(int $n, bool $s) : array
{
    $pyramid = print_pyramid($n, $s);
    $reverse_pyramid = array_reverse($pyramid);
    for($i = 1; $i < $n; $i++)
        {
            $pyramid[] = $reverse_pyramid[$i];
        }
    return $pyramid;
}


