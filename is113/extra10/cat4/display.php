<?php

require_once 'CatDAO.php';


$filterByStatus = "A";
if (isset($_POST['filterByStatus']) and $_POST['filterByStatus'] == "P") {
    $filterByStatus = "P";
}

$filterByGender = $_POST['filterByGender'] ?? "M";

$dao = new CatDAO();
$cats = $dao->getCatsByStatusAndGender($filterByStatus, $filterByGender);

?>
<html>
<body>

<h1>Our Cats</h1>

<table border='1' style="border-collapse: collapse">

    <tr style="background-color: lightblue">
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Status</th>
    </tr>

    <?php
    foreach ($cats as $cat) {
        // YOUR CODE GOES HERE
        $status = "Available";
        if ($cat->getStatus() == "P") {
            $status = "Pending Adoption";
        }
        echo "
    <tr>
        <td> {$cat->getName()} </td>
        <td> {$cat->getAge()} </td>
        <td> {$cat->getGender()} </td>
        <td> {$status} </td>
    </tr>
";
    }

    ?>
</table>

<br/>

<form action="display.php" method="post">

    Filter by status: <br/>
    <select name="filterByStatus">
        <option value="A">Available</option>
        <?php
        $selected = "";
        if ($filterByStatus == "P") {
            $selected = "selected";
        }
        echo "<option value=\"P\" $selected>Pending Adoption</option>";
        ?>
    </select> <br/>

    Gender: <br/>
    <select name="filterByGender">
        <option value="F">Female</option>
        <?php
        $selected = "";
        if ($filterByGender == "M") {
            $selected = "selected";
        }
        echo "<option value='M' $selected>Male</option>";
        ?>
    </select> <br/>

    <br/>

    <input type="submit" value="Filter">
</form>

</body>
</html>