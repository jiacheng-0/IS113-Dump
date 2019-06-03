<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 22/1/2019
 * Time: 10:53 AM
 */


$celebrities = [ “Justin”, “Taylor”, “Kanye”, “Kim” ];
echo "FOR LOOP<br/>";
for($i = 0; $i < count($celebrities); $i++){
    echo "$i" + 1 . '. ' . "$celebrities[$i]<br/>";
}


function do_cat($code){
    echo "my favourite module is " . $code . "<br/>";
}

do_cat("IS442 OOP");

echo "yoyo <br/>";
define("VALUE1", 'value1');
define("VALUE2", 24);

echo "echo : " . VALUE1 . ' ' . VALUE2 . '<br/>';

define("lowercase_value", 24);

echo "echo : " . lowercase_value ;
echo "<br/>";

//Change of value
//define("lowercase_value", 30);
// Error message : Notice: Constant lowercase_value already defined
//echo "echo : " . lowercase_value;

echo "<br/>";

echo 'this for ($i = 1; $i <= 5; i++){} chunk will loop 5 times <br/>';
for ($i = 1; $i <= 5; $i++){
    echo $i . "<br/>";
}

?>

<html>
<head>
    <title>Week 3 - In-Class Exercises</title>
</head>

<body>

    <h1>IS113 - Week 3 - In-Class Exercises</h1>

    <hr>

    <!-- Links to Exercises -->
    <ol>

        <li>
            <a href='links.html'>Hyperlinks</a>
        </li>

        <li>
            <a href='tables.html'>Tables</a>
        </li>

        <li>
            <a href='php_primer.php'>Basic PHP</a>
        </li>

        <li>
            <a href='form.html'>Form</a>
        </li>

        <li>
            <a href='form2.html'>Form</a> (using HTML5)
        </li>

    </ol>

</body>

</html>