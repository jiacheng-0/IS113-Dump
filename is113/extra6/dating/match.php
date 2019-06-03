<?php

require_once 'PersonDAO.php';
// By importing this file, we can create a DAO object.
// DAO object's $people is an Array of Person objects.
$dao = new PersonDAO();


// YOUR CODE GOES HERE

if (isset($_POST['category']) and isset($_POST['gender'])) {

    $category = $_POST['category'];
    $gender = $_POST['gender'];
    $category_value = $_POST['category_value'];
    $operator = $_POST['operator'];

    $matches = [];
    if ($category == 'age' and $operator == '>') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getAge() > $category_value) {
                $matches[] = $person;
            }
        }
    } elseif ($category == 'age' and $operator == '<') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getAge() < $category_value) {
                $matches[] = $person;
            }
        }
    } elseif ($category == 'height' and $operator == '>') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getHeight() > $category_value) {
                $matches[] = $person;
            }
        }
    } elseif ($category == 'height' and $operator == '<') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getHeight() < $category_value) {
                $matches[] = $person;
            }
        }
    } elseif ($category == 'weight' and $operator == '>') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getWeight() > $category_value) {
                $matches[] = $person;
            }
        }
    } elseif ($category == 'weight' and $operator == '<') {
        foreach ($dao->getPeopleByGender($gender) as $person) {
            if ($person->getWeight() < $category_value) {
                $matches[] = $person;
            }
        }
    }
}

?>
<html>
<head>
    <title>Dating - Find Me Matches</title>
</head>
<body>
<h3>Find Me Matches</h3>

<form action='match.php' method='POST'>

    Gender:
    <input type='radio' name='gender' value='M' checked> Male
    <input type='radio' name='gender' value='F'> Female
    <br>

    <select name='category'>
        <option value='age'> Age</option>
        <option value='height'> Height</option>
        <option value='weight'> Weight</option>
    </select>

    <select name='operator'>
        <option value='>'>Greater Than</option>
        <option value='<'>Less Than</option>
    </select>
    <input type='number' name='category_value' required>

    <br>
    <input type='submit' name='match_button' value='Find Matching Profiles'>
</form>

<!-- Display Matches if found -->

<?php

// YOUR CODE GOES HERE
if (sizeof($matches) > 0) {

    $size = sizeof($matches);
    echo "<table border='1'>";
    echo "<tr><th colspan='" . $size . "'>Matches ($size)</th></tr>";

    echo "<tr>";
    foreach ($matches as $person) {
        echo "<td>";
        echo "<table border='1'>";
        echo "<tr><td colspan='2'><img src='images/" . $person->getImage() . "' height='160'/></td></tr>";
        echo "<tr><td>fullname</td><td>" . $person->getFullname() . "</td></tr>";
        echo "<tr><td>gender</td><td>" . $person->getGender() . "</td></tr>";
        echo "<tr><td>age</td><td>" . $person->getAge() . "</td></tr>";
        echo "<tr><td>weight</td><td>" . $person->getWeight() . "</td></tr>";
        echo "<tr><td>height</td><td>" . $person->getHeight() . "</td></tr>";
        echo "</table>";
        echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
}

?>
</body>
</html>