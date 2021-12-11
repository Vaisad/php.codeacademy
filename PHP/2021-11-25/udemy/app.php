<?php
// /Users/vaidassauklys/Desktop/Backend/PHP/2021-11-25/udemy/app.php

//---------------Associative Arrays

$number = array('Vaidas', 'Modesta', 'Vakare');

print_r($number);     //We changed the key of the value [0] => Vaidas [1] => Modesta [2] => Vakare 

echo $number[2] . '<br>';
echo $number[0] . '<br>';
echo '<br>';

$names = array('first_Name' => 'Rejus', 'last_Name' => 'Sauklys'); //Array ( [first_name] => Rejus )
// print_r($names);
echo $names['first_Name'] . ' ' . $names['last_Name'];

//----------------------------exer1
echo '<br>' . '<br>';
$number1 = 11;
$number2 = 20;
$number3 = $number1 + $number2;
echo $number3;
echo '<br>' . '<br>';

 //Regular Arrays

$arr1 = array ('Vaidas', 'Modesta');
$arr2 = ['Vaidas', 'Modesta'];
echo $arr1[1] . ' ' . $arr2[0];
echo '<br>' . '<br>';

//Associative Arrays
$arr = array ('number' => 10, 'vardas' => 'Vaidas'); 
echo $arr['number'] . ' ' .  $arr['vardas'];
echo '<br>' . '<br>';
//----------------------------------

//------------------if else statement

if (3 > 10){
    echo 'three is less than ten';
}elseif(4 > 3){
    echo 'four is more than three';
}else{
    echo 'It is not';
}

echo '<br>' . '<br>';
//----------------------------

$t = date('H');
echo '<p> The hour of the server is ' . $t . '</p>';//Parodo serverio valandas

if($t < 4){
    echo 'Have a nice day';
}elseif($t < 10){
    echo 'echo have a nice night';
}else{
    echo 'have a good night';
}
//-------------------------------
if($a > $b):
    echo $a. ' is greater than '.$b;
elseif($a == $b):
    $a. ' equal '.$b;
else:
    echo $a. 'is neither greater than or equal to' .$b;
endif;







//---------------------comparison

























