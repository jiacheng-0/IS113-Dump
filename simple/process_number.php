<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 29/1/2019
 * Time: 11:19 AM
 */

//if (isset($_POST["number"])){
//    $number = $_POST["number"];
//} else {
//    $number = 5;
//}
//$default = 5;

$number = $_POST["number"] ?? 5;

?>

<html>
<body>

You have entered <?= $number ?>.<br/>
Random number is
<?php
$comp_num = rand(1, 10);
echo $comp_num;
?>.
<br>

<?php
if ($number < $comp_num){
    echo "Result: Smaller <br/>";
} elseif ($number == $comp_num){
    echo "Result: Tie <br/>";
} else {
    echo "Result: Bigger <br/>";
}
?>

</body>
</html>



'1' === 1 //false
'1' == 1 //true