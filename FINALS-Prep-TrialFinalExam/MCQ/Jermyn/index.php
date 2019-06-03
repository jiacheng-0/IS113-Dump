<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 21/4/2019
 * Time: 4:22 PM
 */


?>

<html>
<body>
<!--<form method="get" action="display.php?fruit[]=orange">-->
<!--    <label>Apple<input type="checkbox" name="fruit" value="Apple"></label>-->
<!--    <label>Banana<input type="checkbox" name="fruit" value="Banana"></label>-->
<!--    <input type="submit">-->
<!--</form>-->
<!-- display.php?fruit=Apple&fruit=Banana -->

<form method="post" action="display.php?fruit[]=orange">
    <label>Apple<input type="checkbox" name="fruit[]" value="Apple"></label>
    <label>Banana<input type="checkbox" name="fruit[]" value="Banana"></label>
    <input type="submit">
</form>
<!-- fruit[]=Apple&fruit[]=Banana -->

<form method="post" action="display.php?fruit[]=orange">
    <label>Apple<input type="checkbox" name="fruit[]" value="Apple"></label>
    <label>Banana<input type="checkbox" name="fruit[]" value="Banana"></label>
    <input type="submit">
</form>
<!-- display.php?fruit[]=orange -->

</body>
</html>
