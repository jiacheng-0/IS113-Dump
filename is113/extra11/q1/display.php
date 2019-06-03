<?php
require_once "common.php";
$dao = new PersonDAO();
$person_list = [];

if (!empty($_POST)) {
    $gender = $_POST["gender"];
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    $person_list = $dao->search($min_age, $max_age, $gender);
} else {
    $person_list = $dao->retrieveAll();
}
?>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<form method='POST'>
    <?php
    $m_checked = $_POST['gender'] = 'm' ? "checked" : "";
    $f_checked = $_POST['gender'] = 'f' ? "checked" : "";
    $a_checked = $_POST['gender'] = 'a' ? "checked" : "";
    $min_age = $_POST['min_age'] ?? "0";
    $max_age = $_POST['max_age'] ?? "200";

    # Enter code here


    #################

    echo "Gender: 
                    <input type='radio' name='gender' value='m' $m_checked/> Male
                    <input type='radio' name='gender' value='f' $f_checked/> Female
                    <input type='radio' name='gender' value='a' $a_checked/> Any
                    <br/>
                    Min Age: <input type='text' name='min_age' value='$min_age'/><br/>
                    Max Age: <input type='text' name='max_age' value='$max_age'/><br/>
                    <input type='submit' value='Filter'/>";
    ?>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
    </tr>
    <?php
    foreach ($person_list as $person) {
        echo "<tr>";
        echo "<td>{$person->getName()}</td>";
        echo "<td>" . strtoupper($person->getGender()) . "</td>";
        echo "<td>{$person->getAge()}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>