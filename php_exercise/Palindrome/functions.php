<?php

/**
*This function checks if the entered input is a palindrome.
*@param string $input
*@return string
*/
function print_exe(string $input) :string
{
    $converted = str_split($input);
    $rev_converted = array_reverse($converted);
    $n = count($converted);
    for ($i = 0; $i <= ($n-1); $i++)
    {
        if ($converted[$i] == $rev_converted[$i])
        {
            $result = 'Yes, "'.$input.'" is a palindrome';
        }
        else
        {
            $result = 'No, "'.$input.'" isn´t a palindrome';
            break;
        }
    }
    return $result;
}


