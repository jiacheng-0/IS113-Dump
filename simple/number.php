<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="process_number.php" method="post">

    Enter a value :
    <select name="number">
        <?php
        for ($i = 1; $i <= 10; $i++){
            echo "<option>$i</option>";
        }
        ?>
    </select>
<!--    <input name="number"/>-->

    <input type="submit"/>
</form>

</body>
</html>