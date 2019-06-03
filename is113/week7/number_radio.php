<html>
<body>
<form action="process_number.php" method="get">
    Enter a value :<br/>

    <?php

    echo "<table border='0' style='border-collapse: collapse'>";
    $padding = '';
    $checked = '';
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = $i * 10 + 1; $j <= ($i + 1) * 10; $j++) {
            if ($j < 10){
                $padding = '&nbsp;&nbsp;';
            }
            if ($j == 50){
                $checked = 'checked';
            }
            echo "<td>";
            echo "<input type='radio' name='number' value='{$j}' id='_number' $checked>";
            echo $padding . "<label for='_number' style='text-align: right'>{$j}</label>";
            echo "</td>";

            $padding = '';
            $checked = '';
        }
        echo "</tr>";
    }
    echo "<table>";

    ?>
    <br/>
    <input type="submit"/>
</form>

</body>
</html>
