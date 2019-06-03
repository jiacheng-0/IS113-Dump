<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Week 3 - helloworld.html</title>
</head>
<!--<body style="background-image: url(images/FOsweechoon.jpg);opacity: 40%">-->
<body>
<h1>Hello World!</h1>

<hr>

<!---->
<!--My friend. What is 2 ** 3 ** 2?-->
<!--<br>-->
<!--Is it 8 ** 2 == 64;-->
<!--<br>-->
<!--or 2 ** 9 == 512;-->
<!--<br>-->
<!---->
<!---->
<!--<hr>-->
<!--Answer is-->
<!---->
<?php
//echo 2 ** 3 ** 2
//?>

<!--<hr>-->
<?php
//$fullname = "James Looi";
//$drink = "beer";
//$num = 12;
//echo "My fulllllllllllll name is <b>" . $fullname . "</b><br>";
//echo "
//First
//Second
//Third
//";
//echo "<hr>";
//echo "$fullname dranks $num cans of $drink last night.<br>";
//
//$arr = ['apple', 'orange', 'pear'];
//echo '$arr is : ';
//print_r($arr);
//
//$arr = array('Jini', 'love', 'James', 'XoXoX');
//
//echo '<br/>';
//print_r($arr);
//echo '<br/>';
//var_dump($arr);
//
//echo "<hr/>";
//echo "this is a foreach loop <br/>";
//foreach ($arr as $one_fruit){
//    echo $one_fruit . "<br/>";
//}
//echo "<hr/>";
//echo 'this is a for ($i = 1) loop<br>';
//for($i = 0; $i < count($arr); $i++){
//    echo $i .'. ' . $arr[$i] . "<br/>";
//}

$arr = array('Jini', 'love', 'James', 'xoxo xoxo');
//echo '<ol>';
//echo '<li>' . implode( '</li><li>', $arr) . '</li>';
//echo "</ol>\n";
//
//$arr = array('Jini', 'love', 'James', 'XoXoX');
//echo "\n<ol> \n";
//foreach ($arr as $fruit){
//    echo "\t<li>$fruit</li>\n";
//}
//echo "</ol>\n";

//for ($i = 0; $i < count($arr);$i++){
//    echo $i + 1 . ". $arr[$i]<br/>";
//}
//echo 'new stuff -> {$arr[$i-1]}<br/>';
//for ($i = 1; $i <= count($arr);$i++){
////    echo "$i. " .$arr[$i-1] ."<br/>";
//    echo "$i. {$arr[$i-1]} <br/>";
//}
//echo "<hr>";
//array_push($arr,'Kyong', 'Yeow Leong' );
//for ($i = 0; $i < count($arr);$i++){
//    echo $i + 1 . ". $arr[$i]<br/>";
//}
//
//echo '<pre>';
//print_r($arr);
//echo '</pre>';

// associative array
$dict = [
        'James' => 'Normal',
        'Jini' => 'Prettz',
        'Shazli' => 'Abang SACHOKESZZ'
];
echo '<ul>';
foreach ($dict as $key=> $value){
    echo "<li>$key is : $value</li>";
}
echo '</ul>';

$animals = ['cat', 'dog'];
print_r($animals); echo "<br/>";
array_push($animals, 'squidward');
print_r($animals);

echo "<hr/>";
$key = 'Jini';
echo $dict[$key];

$dict['Jia Cheng'] =  'Sibei handsome';
echo "<hr/>";
echo "<pre>";
print_r($dict);
echo "</pre>";

$age1 = 17;
$age2 = 55;

$school1 = "SMU";
$school2 = "NTU";

if ($age1 < 20 || $age2 > 50){
    echo "You are very young but go study";
} else {
    echo "you suck balls";
}

?>

<!--<pre>-->
<!--    <code>for i in range()</code>-->
<!--    Pre renders whatever I type here-->
<!--    whatever format-->
<!--I use-->
<!--    changes the font to Consolas-->
<!--</pre>-->


</body>
</html>