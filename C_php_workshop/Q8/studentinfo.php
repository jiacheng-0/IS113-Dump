<?php

class Student
{
    public $name;
    public $age;
    public $hobbies;

    function __construct($age, $name, $hobbies)
    {
        $this->age = $age;
        $this->name = $name;
        $this->hobbies = $hobbies;
    }
}

$s1 = new Student(24, "Bobby", ['Coding', 'Eating', 'Sleeping'])

?>

<html>
<body>
<table border=2>
    <tr>
        <th>
            Head
        </th>
        <td>
            <?php echo $s1->name ?>
        </td>
    </tr>
    <tr>
        <th>
            Age
        </th>
        <td>
            <?php echo $s1->age ?>
        </td>
    </tr>
    <tr>
        <th>
            Hobbies
        </th>
        <td>
            <ul>
                <?php
                foreach ($s1->hobbies as $one_hobby) {
                    echo "<li>$one_hobby</li>";
                }
                ?>
            </ul>

        </td>
    </tr>
</table>
</body>
</html>