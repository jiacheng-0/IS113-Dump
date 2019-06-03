<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 18/2/2019
 * Time: 9:01 PM
 */

?>


<html>
<body>

<form method="post">
    Number 1 : <input name='numbers[]' value='24'/> <br/>
    Number 2 : <input name='numbers[]'/> <br/>
    Number 3 : <input name='numbers[]' value='35'/> <br/>
    <input type="submit">
</form>

<?php
if (isset($_POST['numbers'])) {
//    echo $_POST['numbers'] . "<br/>";
    echo "<pre>";
    $arr = $_POST['numbers'];
    print_r($arr);
//    $_POST['numbers'][1];
    var_dump($arr);
    echo gettype($arr) . "<br/>";

    $arr = [5 => 'five', 6 => 'six'];
    print_r($arr);

    echo gettype($arr);

    echo "</pre>";


}
?>

</body>
</html>
