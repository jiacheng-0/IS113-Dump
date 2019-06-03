<?php
/* 
    Name:  
    Email: 
*/

function generateRandomSets($quantity)
{
    $num_numbers = 3; // generate 3 random integers
    $result = [];
    /*
     $result is an Array of Arrays.
     A sample $result array looks like this
     with parameter $quantity of 3 (user input):

     [
         [1, 5, 3],
         [2, 0, 9],
         [4, 8, 4]
     ]
    */

    // Part A
    // YOUR CODE GOES HERE

    for ($i = 0; $i < $quantity; $i++) {
        $curr_arr = [];
        for ($j = 0; $j < $num_numbers; $j++) {
            $rand_number = random_int(1, 9);
            $curr_arr[] = $rand_number;
        }
        $result[] = $curr_arr;
    }

    return $result;
}

function calculate($random_sets, $lucky_number)
{
    $result = [];
    $num_numbers = 3; // each set consists of 3 randomly generated integers

    /*
     $results is an Array.
     A sample $result array looks like this
     (given that $random_sets contain 4 sets of numbers)

     [
         0,
         1,
         0,
         2
     ]

     It means:
        - First number set had zero match.
        - Second number set had ONE match.
        - Third number set had zero match.
        - Fourth number set had TWO matches.

    */

    // Part B
    // YOUR CODE GOES HERE
    foreach ($random_sets as $one_set) {
        $count = 0;
        foreach ($one_set as $value){
            if ($value == $lucky_number){
                $count++;
            }
        }
        $result[] = $count;
    }

    return $result;
}

// Form Processing
// YOUR CODE GOES HERE
$quantity = $_POST['quantity'];
$lucky_number = $_POST['lucky_number'];
$bet_amount = $_POST['bet_amount'];
//echo "<pre>";
echo "<h1>Lucky Number: " . $lucky_number . "</h1>";
echo "<h1>Bet Amount : " . $bet_amount . "</h1>";
//print_r(generateRandomSets($quantity));
//echo "</pre>";

// Generate # of sets (each set contains 3 numbers)
$random_sets = generateRandomSets($quantity); // DO NOT MODIFY THIS LINE

// Check if lucky number is found
$result = calculate($random_sets, $lucky_number); // DO NOT MODIFY THIS LINE

?>
<!DOCTYPE html>
<html>
<body>
<?php
echo "<table border='1'>";
echo "<tr><th>Number Set</th><th>Number of Matches</th><th>Winning Amount</th></tr>";
$total_winning_amt = 0;
for ($i = 0; $i < count($result); $i++){
    echo "<tr>";
    echo "<td>" . implode(", ", $random_sets[$i]) . "</td>";
    echo "<td>" . $result[$i] . "</td>";
    $winning_amt = $result[$i] * $bet_amount;
    $total_winning_amt += $winning_amt;
    echo "<td>" . $winning_amt . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
