<?php

//First Task
function print_nextChar($letter)
{
$next_letter=++$letter;
if (strlen($next_letter) >= 1) 
{ 
    $next_letter = $next_letter[0];
    echo $next_letter;

}}

//we send the letter as a parameter to the function
print_nextChar('b');

echo '<br> <br><br><br><br><br><br><br>';

//Second Task
$students=[
    ['name'=>'Root','age'=>20],
    ['name'=>'Root2','age'=>25,'gpa'=>3.4],
    ['name'=>'Root3','age'=>30]
];

foreach ($students as $nested)
{

    foreach ($nested as $students) {

        echo $students. ' ';
    }

    echo '<br>';
}

?>