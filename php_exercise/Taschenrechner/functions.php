<?php

/**
*This function checks if the second number is a 0 and if the calculation type
* is division. If so it shows that a division through zero is not allowed.
* If the requested calculation is valid it executes the calculation and returns 
* it´s value.
*@param float $first_number
*@param float $second_number
*@param string $method
*@return float
*@throws Exception if a division by zero is requested
*/
function check_input(float $first_number, float $second_number, string $method)
{        
    try
    {
        if ($second_number == 0 && $method == "/")
        {
            throw new DivisionByZeroError();
        }
        else
        {
            return run_calculation($first_number, $second_number, $method);
        }
    }
    catch (DivisionByZeroError $ex)
    {
        echo "Do not divide by zero!";
    }
}

/**
*This function executes the requested calculation
*@param float $first_number
*@param float $second_number
*@param string $method
*@return float
*/
function run_calculation(float $first_number, float $second_number, string $method): float
{
    if ($method == "+")
    {
        $result = $first_number + $second_number;
    }
    else if ($method == "-")
    {
        $result = $first_number - $second_number;
    }
    else if ($method == "*")
    {
        $result = $first_number * $second_number;
    }
    else if ($method == "/")
    {
        $result = $first_number / $second_number;
    }
    return $result;
}
