<!DOCTYPE html>
<html>
<body>
<form>
    <?php
    $numUsers = 2;

    //write your codes here, change the value of the $numUsers to test

    $numUsers = 4;

    for ($i = 1; $i <= $numUsers; $i++) {
        echo "<b><u>User " . $i . "</b></u><br>";
        echo "Name : <input type='text' size=30 value='<Please enter name for User " . $i . ">'>";
        echo "<br>";
        echo "Password : <input type='password' size=12 maxlength=12><br>";

        if ($i % 2 === 0) {
            echo "Age : <input type='text' size=3 ><br>";
        }
        echo "<br>";
    }
    ?>
</form>
</body>
</html>