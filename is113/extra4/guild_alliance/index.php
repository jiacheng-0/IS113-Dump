<?php

// *** Do NOT change: start ***
// key: name of alliance.  value: list of member guilds' name
$alliances = [
  'All Stars' => ['Black Star'],
  'Iconic' => ['Voice', 'Rapper', 'Serious'],
  'Duel' => ['Ak Family', 'Ukulele'],
];

// key: name of guild.  value: list of members aka heroes' name
$guilds = [
  'Serious' => ['Yun', '15 cm'],
  'Ukulele' => ['Terry', 'Lee Chi'],
  'Rapper' => ['Rain', 'Bob'],
  'Ak Family' => ['Ak Hyuk', 'Ak Hyun', 'Ak Pa', 'Ak Ma'],
  'Voice' => ['June', 'Chan', 'Dong'],
  'Black Star' => ['Jam', 'Ni Sa', 'Rose', 'Soo Ya'],
];

// key: member's name.  value: dictionary of member's attributes
$heroes = [
  'Chan' => ['Strength' => 2, 'Magic' => 4],
  'June' => ['Strength' => 5, 'Magic' => 0],
  'Ak Hyun' => ['Strength' => 1, 'Magic' => 5],
  'Terry' => ['Strength' => 3, 'Magic' => 5],
  'Rain' => ['Strength' => 2, 'Magic' => 4],
  'Ak Pa' => ['Strength' => 3, 'Magic' => 5],
  'Bob' => ['Strength' => 5, 'Magic' => 2],
  '15 cm' => ['Strength' => 2, 'Magic' => 3],
  'Lee Chi' => ['Strength' => 4, 'Magic' => 4],
  'Jam' => ['Strength' => 4, 'Magic' => 1],
  'Ak Ma' => ['Strength' => 5, 'Magic' => 5],
  'Ni Sa' => ['Strength' => 3, 'Magic' => 3],
  'Rose' => ['Strength' => 4, 'Magic' => 2],
  'Soo Ya' => ['Strength' => 1, 'Magic' => 5],
  'Dong' => ['Strength' => 3, 'Magic' => 1],
  'Ak Hyuk' => ['Strength' => 2, 'Magic' => 4],
  'Yun' => ['Strength' => 3, 'Magic' => 3],
];
// *** Do NOT change: end ***

function count_all_members_in_alliance($alliances, $guilds, $alliance_to_search)
{
  $count = 0;
  foreach ($alliances[$alliance_to_search] as $one_guild_members_arr) {
    $count += count($guilds[$one_guild_members_arr]);
  }
  return $count;
}

//echo count_all_members_in_alliance($alliances, $guilds, "All Stars") . "<br/>";
// 4
//echo count_all_members_in_alliance($alliances, $guilds, "Iconic") . "<br/>";
// 7
//echo count_all_members_in_alliance($alliances, $guilds, "Duel") . "<br/>";
// 6
function count_all_members_in_guild($guilds, $guild_to_search)
{
  return count($guilds[$guild_to_search]);
}

?>

<html>
<body>
<form method='post'>
  Alliances

  <?php

  // Retrieve selected guilds
  $selected_alliance = [];
  if (isset($_POST['selected_alliance'])) {
    $selected_alliance = $_POST['selected_alliance'];
  }

  foreach ($alliances as $one_alliance => $guild_names_arr) {

//        $desc = $one_alliance . " (" . count($guild_names_arr) . ")";
    $desc = $one_alliance;
    $checked_or_not = '';
    if (in_array($one_alliance, $selected_alliance)) {
      $checked_or_not = 'checked';
    }
    echo "<label>";
    echo "<input type='checkbox' name=\"selected_alliance[]\" value='$one_alliance' $checked_or_not/>$desc";
    echo "</label>";
  }
  ?>

  <input type='submit' name='btnGet' value='Get'/>
</form>

<?php

if ($selected_alliance == []) {
  echo "
    <p>No alliance selected</p>";
}

?>

<table border='1'>
  <tr>
    <th> Alliance</th>
    <th> Guild</th>
    <th> Hero</th>
    <th> Strength</th>
    <th> Magic</th>
  </tr>
  <?php
  foreach ($selected_alliance as $one_alliance) {

    $guild_list = $alliances[$one_alliance];
    $one_guild = $guild_list[0];
    $guild_member_names_arr = $guilds[$one_guild];
    // one alliance has at least one guild.
    // handle first member
    $rows_to_span = count_all_members_in_alliance($alliances, $guilds, $one_alliance);
    // need to count all the members in the alliance;
    echo "<tr>";
    echo "<td rowspan='$rows_to_span'>$one_alliance</th>";
    $rows_to_span = count_all_members_in_guild($guilds, $one_guild);
    echo "<td rowspan='$rows_to_span'>" . $one_guild . "</td>";
    echo "<td>$guild_member_names_arr[0]</td>";
    $stats = $heroes[$guild_member_names_arr[0]];
    $strength = $stats['Strength'];
    $magic = $stats['Magic'];
    echo "<td>$strength</td>";
    echo "<td>$magic</td>";
    echo "</tr>";

    // loop from index 1
    for ($i = 1; $i < count($guild_member_names_arr); $i++) {
      echo "<tr>";
      echo "<td>$guild_member_names_arr[$i]</td>";
      $stats = $heroes[$guild_member_names_arr[$i]];
      $strength = $stats['Strength'];
      $magic = $stats['Magic'];
      echo "<td>$strength</td>";
      echo "<td>$magic</td>";
      echo "</tr>";
    }


    for ($i = 1; $i < count($guild_list); $i++) {
      echo "<tr><td>" . $guild_list[$i] . "</td>";
      echo "<td>$guild_member_names_arr[$i]</td>";
      $stats = $heroes[$guild_member_names_arr[$i]];
      $strength = $stats['Strength'];
      $magic = $stats['Magic'];
      echo "<td>$strength</td>";
      echo "<td>$magic</td>";
      echo "</tr>";

      $one_guild = $guild_list[$i];
      $guild_member_names_arr = $guilds[$one_guild];
      // loop from index 1
      for ($i = 1; $i < count($guild_member_names_arr); $i++) {
        echo "<tr>";
        echo "<td>$guild_member_names_arr[$i]</td>";
        $stats = $heroes[$guild_member_names_arr[$i]];
        $strength = $stats['Strength'];
        $magic = $stats['Magic'];
        echo "<td>$strength</td>";
        echo "<td>$magic</td>";
        echo "</tr>";
      }
    }


  }
  ?>
</table>


</body>
</html>