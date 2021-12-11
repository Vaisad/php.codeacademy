<?php
$speed = 80;
if($speed > 60){
    echo "Greicio virsijimas", '<br>';
}
?>
<?php
$name = 'Vaidas';
$age = 39;
echo " My name is $name, I am $age years oldmen.", '<br>';

?>

//-------------------------------
<?php 
echo 2 + 3, '<br>';
echo 2 - 3, '<br>';
echo 2 * 2, '<br>';
echo 2 / 2, '<br>';
echo 20 % 25, '<br>';

$num = 1000;
echo decbin($num), '<br>';
echo decoct($num), '<br>';
echo dechex($num), '<br>';
//----------------------------
$fruits = 66;
echo $fruits, '<br>';

$a = $b = $c = 3;
echo $a, $b, $c;
//---------------------------
$output = `uname`;
echo "<pre>$output</pre>";

$os_version = `uname`;
echo "<pre>$os_version</pre>";

$output = `uname`;
echo "<pre>$output</pre>";

$os = PHP_OS;
echo "<pre>$os</pre>";

$uname = php_uname();
echo "<pre>$uname</pre>";

$content = `cat /etc/os-release`;
preg_match_all('/("[^"]*")|[^"]*/i', $content, $matches);
$result = $matches[0][3];
echo "<pre>$result</pre>";

?>


<?php
//-------------------------------------

$nextSecund = 60 * 60 * 24;
echo $nextSecund, '<br>';

//-------------------------------------

$result = "Hello";

echo $result[0], '<br>';
echo $result[1], '<br>';
echo $result[4], '<br>';

//----------------------------------
 ?>
