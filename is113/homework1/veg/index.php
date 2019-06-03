<?php
// key: vegetable,  value: type
$vegTypeArr = [
    'asparagus' => 'stem',
    'cabbage' => 'leafy',
    'celery' => 'stem',
    'lettuce' => 'leafy',
    'potato' => 'root',
    'spinach' => 'leafy',
    'yam' => 'root',
];
?>

<html>
<body>
<form action='process.php'>
    Leafy Vegetable
    <select name="vegetable">
        <?php
        foreach ($vegTypeArr as $veg => $vegType){
            if ($vegType == 'leafy') {
                echo "<option>$veg</option>";
            }
        }
        ?>
    </select>
    <input type='submit'/>
</form>
</body>
</html>