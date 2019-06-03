<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 12/2/2019
 * Time: 2:05 PM
 */

include 'Cat.php';

//$cat1 = new Cat();
//$cat1->gender = 'Lesbian';
//echo "<pre>";
//var_dump($cat1);
//echo "</pre>";

$cat1 = new Cat("James LOOI", 'GAY TRANNY', 69);
$cat2 = new Cat("Jormas", 'Faggyboii');
$cat3 = new Cat("Kyong", 'Female Communist');

$cat_list = [
    $cat1,
    $cat2,
    $cat3,
    new Cat("I am number Four", 'M', 44)];
?>

<html>

<body>
<!--<div>-->
<!---->
<!--</div>-->
<pre>
<table border="1" style="border-collapse: collapse" align="centre" bgcolor="#ffe6e6">
    <?php
    $count = 1;
    foreach ($cat_list as $s) {
        echo "<tr><th colspan='2' bgcolor='#ff3333'>Cat $count </th></tr>";
        $count++;
        echo "<tr><td>Name :</td><td>{$s->getName()}</td></tr>";
        echo "<tr><td>Gender :</td><td>{$s->getGender()}</td></tr>";
        echo "<tr><td>Age :</td><td>{$s->getAge()}</td></tr>";
    }
    ?>
</table>
</pre>
</body>
</html>