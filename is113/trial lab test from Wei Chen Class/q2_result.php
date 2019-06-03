<!--
Name:  Teo Jia Cheng
Email: jcteo.2018
-->

<html>
<head>
    <title>q2_result</title>
</head>
<body>
<h1>Compute Bus Fare</h1>

<?php
//    if (isset($_POST['distance'])){
//
//    } else {}
if (!is_numeric($_POST['distance'])) {

    echo "Distance is not numeric!";
} elseif ($_POST['distance'] <= 0) {

    echo "Distance must be more than zero!";
} else {

    $distance = $_POST['distance'];
    $age_group = $_POST['age_group'];
    $time_peak = $_POST['time_peak'];
    $ntuc = $_POST['ntuc'] ?? "No";

    $cost_per_km = 0.15;
    if ($age_group == "Children") {
        $cost_per_km = 0.05;
    } else if ($age_group == "Senior") {
        $cost_per_km = 0.01;
    }



    $discount = $time_peak == "Non-Peak" ? 0.25 : 0.00;
    if ($ntuc == "YES") {
        $discount += 0.05;
    }

    $bus_fare = $distance * $cost_per_km * (1 - $discount);

    ?>
    <table border="1">
        <tr>
            <td>
                Distance (in km)
            </td>
            <td>
                <?= $distance ?>
            </td>
        </tr>
        <tr>
            <td>
                Age group
            </td>
            <td>
                <?= $age_group ?>
            </td>
        </tr>
        <tr>
            <td>
                Time
            </td>
            <td>
                <?= $time_peak ?>
            </td>
        </tr>
        <tr>
            <td>
                NTUC card?
            </td>
            <td>
                <?= $ntuc ?>
            </td>
        </tr>

        <tr>
            <td>
                Cost per km
            </td>
            <td>
                <?= "$" . $cost_per_km ?>
            </td>
        </tr>
        <tr>
            <td>
                Discount
            </td>
            <td>
                <?= $discount * 100 . "%"?>
            </td>
        </tr>


        <tr>
            <td>
                Bus fare
            </td>
            <td>
                <?= "$" . $bus_fare ?>
            </td>
        </tr>

    </table>
    <?php
}
?>


</body>
</html>