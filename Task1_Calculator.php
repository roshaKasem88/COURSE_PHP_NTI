<?php
echo("Simple Calculator Program!!");
$first_num = 10;
$second_num = 5;
$operation="Addition";

    switch ($operation) 
    {
        case "Addition":
           $result = $first_num + $second_num;
           echo 'Result is '.$result;
            break;
        case "Subtraction":
           $result = $first_num - $second_num;
           echo 'Result is '.$result;
            break;
        case "Multiplication":
            $result = $first_num * $second_num;
            echo 'Result is '.$result;
            break;
        case "Division":
            $result = $first_num / $second_num;
            echo 'Result is '.$result;

         
}

?>