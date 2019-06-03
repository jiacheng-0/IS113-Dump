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
        foreach ($vegTypeArr as $name_of_veg => $type_of_veg){
            if ($type_of_veg == "leafy"){
                echo "<option value='$name_of_veg'>$name_of_veg</option>";
            }
        }
        ?>
    </select>
    <input type='submit'/>
</form>
</body>
</html>