<?php
/* 
    Name:  
    Email: 
*/

$people = [
    "trump" => 'Donald Trump',
    "clinton" => 'Hillary Clinton',
    "kim" => 'Kim Jong Un',
    "moon" => 'Moon Jae In',
    "putin" => 'Vladimir Putin'
];

$selected_people = [];

if (isset($_POST['submitted'])) {

    if (!isset($_POST['person'])) {
        echo "<h4>Your didn't... select anyone! Select at least 3 people</h4>";
    } elseif (count($_POST['person']) < 3) {
        echo "<h3>Select at least THREE (3) people!</h3>";
    } else {
        $selected_people = $_POST['person'];
    }
}

function getRandomImage($people): string
{
    $rand_int = rand(0, count($people) - 1);
    return $people[$rand_int];
}

//var_dump($selected_people);

?>
<!DOCTYPE html>
<html>
<body>
<form method='post' action='q3.php'>
    <table border="1">
        <tr>
            <th>Person</th>
        </tr>
        <?php

        foreach ($people as $nickName => $fullName) {
            $checked_or_not = '';
            if (in_array($nickName, $selected_people)) {
                $checked_or_not = ' checked';
            }
            echo "<tr>";
            echo "<td><input type='checkbox' name='person[]' value='$nickName' id='_$nickName' $checked_or_not/>";
            echo "<label for='_$nickName'>$fullName</label></td>";
            echo "</tr>";

        }
        ?>
        <tr>
            <td><input type="submit" name="submitted"/></td>
        </tr>
    </table>

    <?php
    if (isset($_POST['submitted']) and isset($_POST['person']) and count($_POST['person']) >= 3) {
        echo "<hr/>";
        $puzzle = [];
        echo "<table border='1'>";
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 3; $j++) {
                $random_guy = getRandomImage($selected_people);
                $puzzle[] = $random_guy;
                echo "<td><img src='$random_guy.jpg' style='width: 200px; height: auto;'/></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        if (count($puzzle) == 9) {
            if ($puzzle[0] == $puzzle[4] && $puzzle[4] == $puzzle[8]) {
                echo "<h1>Top LEFT to Bottom RIGHT Diagonal FOUND</h1>";
            }
            if ($puzzle[2] == $puzzle[4] && $puzzle[4] == $puzzle[6]) {
                echo "<h1>Top RIGHT to Bottom LEFT Diagonal FOUND</h1>";
            }

        }
    }


    ?>
</form>
</body>
</html>