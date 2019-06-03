<?php
//$ZZZ = "Sleep";
//echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
// *** Do NOT change: start ***
// key: name of guild.  value: list of members aka heroes' name
$guilds = [
    'Black Star' => ['Jam', 'Nisa', 'Rose'],
    'Iconic' => ['Soo', 'Nisa'],
    'Crazy World' => ['Jam', 'Soo', 'Nisa'],
];


// key: member's name.  value: dictionary of member's attributes
$heroes = [
    'Jam' => ['Strength' => 4, 'Magic' => 1],
    'Nisa' => ['Strength' => 3, 'Magic' => 3],
    'Rose' => ['Strength' => 4, 'Magic' => 2],
    'Soo' => ['Strength' => 1, 'Magic' => 5],
];
// *** Do NOT change: end ***

// similar code => abstract to a function print_name_strength_magic
// accepts an array of 3 values
// returns string with 3 <td> to be echoed out my main code

function print_stars($num_stars) {
    $result = "";
    for ($i = 0; $i < $num_stars; $i++) {
        $result .= "<img src='star.jpg'/>";
    }
    return $result;
}

function generate_name_strength_magic($heroes, $hero_name)
{
    $one_hero_stats = $heroes[$hero_name];
    $strength = $one_hero_stats['Strength'];
    $magic = $one_hero_stats['Magic'];

    return "<td>$hero_name</td>
            <td>" . print_stars($strength) . "</td>
            <td>" . print_stars($magic) . "</td>";
}

// returns guild stats of format:
// total : strength, magic
function genGuildStats($heroes, $guild_heroes) {
    $total_str = 0;
    $total_mag = 0;
    foreach ($guild_heroes as $one_hero) {
        $total_str += $heroes[$one_hero]['Strength'];
        $total_mag += $heroes[$one_hero]['Magic'];
    }

    return [$total_str, $total_mag];
}

// Retrieve selected guilds
$selected_guilds = [];
if (isset($_POST['guild'])) {
    $selected_guilds = $_POST['guild'];
}
?>

<html>
<body>
<form method='post'>
    Guilds
    <?php


    foreach ($guilds as $one_guild_name => $members) {

        $desc = $one_guild_name . " (" . count($members) . ")";
        $checked_or_not = '';
        if (in_array($one_guild_name, $selected_guilds)) {
            $checked_or_not = 'checked';
        }
        echo "<label>";
        echo "<input type='checkbox' name='guild[]' value='$one_guild_name' $checked_or_not/>$desc";
        echo "</label>";
    }
    ?>
    <input type='submit' name='get'/>
</form>

<?php

//echo isset($_POST['get']) ? "TRUE" : "FALSE";
echo "<br/>";

if (isset($_POST['get'])) {
    if (isset($_POST['guild'])) {

        $selected_guilds = $_POST['guild'];
        foreach ($selected_guilds as $one_guild_name) {
            echo "$one_guild_name";
            echo "<ol>";

            $guild_members_list = $guilds[$one_guild_name];
            foreach ($guild_members_list as $one_guild_member) {
                echo "<li>$one_guild_member</li>";
            }
            echo "</ol>";
        }

//        echo "<pre>";
//        var_dump($selected_guild);
//        echo "</pre>";

        // table with 4 TH columns
        echo "<table border='2'>";
        echo "<tr><th>Guild</th><th>Hero</th><th>Strength</th><th>Magic</th></tr>";

        foreach ($selected_guilds as $one_guild_name) {
            $guild_members_list = $guilds[$one_guild_name];
            $num_guild_members = count($guild_members_list) + 1;
            // added + 1 for total stats row
            echo "<tr>";
            echo "<td rowspan='{$num_guild_members}'>$one_guild_name</td>";
            echo generate_name_strength_magic($heroes, $guild_members_list[0]);
            echo "</tr>";

            for ($i = 1; $i < count($guild_members_list); $i++) {
                echo "<tr>";
                echo generate_name_strength_magic($heroes, $guild_members_list[$i]);
                echo "</tr>";
            }
            // code here to print the total strength/magic of a guild
            $total_stats = genGuildStats($heroes, $guild_members_list);
            // [str, magic]
            echo "<tr><th>Total</th><td>{$total_stats[0]}</td><td>{$total_stats[1]}</td></tr>";
        }

        echo "</table>";

    } else {
        echo "No guild selected";
    }
}


?>


</body>
</html>