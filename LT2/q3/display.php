<?php

/*
    Name: Teo Jia Cheng

    Email: jcteo.2018@sis.smu.edu.sg
*/

############  DO NOT CHANGE THIS CODE ################
spl_autoload_register(
    function ($class) {
        require_once "classes/$class.php";
    }
);

$dao = new LectureDAO();
if (isset($_POST['operation'])) {
    echo "<img src='images/sis.png'>";
    $operation = $_POST['operation'];
    if ($operation === 'Show Sample Schedule') {
        echo "  <br/>
                <h1>Sample Schedule</h1>";
        $room_allocation = [
            "Room-1" => [new Lecture("L10", 9, 1), new Lecture("L9", 11, 3), new Lecture("L8", 14, 3)],
            "Room-2" => [new Lecture("L6", 13, 1), new Lecture("L7", 9, 3), new Lecture("L5", 15, 1)],
            "Room-3" => [new Lecture("L2", 11, 1), new Lecture("L1", 9, 1), new Lecture("L3", 13, 1), new Lecture("L4", 15, 1)],
        ];
        $sample_schedule = new Schedule($room_allocation);
        display_schedule($sample_schedule);
    } elseif ($operation === 'Show Schedule for a Date') {
        $date = $_POST['date'];
        $lectures = $dao->getLectures($date);
        if ($lectures == null) {
            echo "  <br/>
                    <h1>No schedule for $date</h1>";
        } else {
            echo "  <br/>
                    <h1>Schedule for $date</h1>";
            $schedule = create_schedule($lectures);
            display_schedule($schedule);
        }
    }
}
#########################################################

# Part A (Display the schedule): ENTER CODE HERE == 
function display_schedule($schedule)
{
    echo "<table border='1'>";
    echo "<tr><th></th><th>Room-1</th><th>Room-2</th><th>Room-3</th></tr>";
//    echo "<pre>";
    $room_allocation = $schedule->getRoomAllocation();
//    var_dump($room_allocation);
//    var_dump(array_keys($room_allocation));

    // we need to sort the $room_allocation assoc array before moving on
    // need to sort by room and time
    // [room, time] => Lecture;

//    $allLectures = [];
//    var_dump($allLectures);

    $roomList = array_keys($room_allocation);

//    var_dump($roomList);
    $cell_to_skip = [
        'Room-1' => 0,
        'Room-2' => 0,
        'Room-3' => 0
    ];
    for ($i = 9; $i <= 17; $i++) {
        if ($i < 10) {
            $i = "0" . $i;
        }
        $timing = $i . "-" . ($i + 1);
//        echo "<tr><th>$timing</th><td>		</td><td>		</td><td>		</td></tr>";
        echo "<tr><th>$timing</th>";
        foreach ($roomList as $room) {
            if ($cell_to_skip[$room] >= 1) {
                $cell_to_skip[$room] -= 1;
                continue;
            }
            $duration = 1;
            $td_to_print = "<td></td>";
            foreach ($room_allocation[$room] as $oneLecture) {
                if ($oneLecture->getStartTime() == $i) {
//                    var_dump($oneLecture);
                    $level = $oneLecture->getId();
                    $duration = $oneLecture->getDuration();
                    if ($duration >= 2) {
                        $cell_to_skip[$room] += $duration - 1;
                    }
                    $td_to_print = "<td rowspan='$duration'>$level</td>";
                }
            }
            echo $td_to_print;
        }
        echo "</tr>";
    }
    echo "</table>";
}

# ====

# Part B (Put lectures into a schedule): ENTER CODE HERE == 
function create_schedule($lectures)
{
    // room => [array of lecture objects]
    $room_allocation = [
        'Room-1' => [],
        'Room-2' => [],
        'Room-3' => []
    ];
    $roomList = [
        'Room-1',
        'Room-2',
        'Room-3'
    ];
//    var_dump($lectures);
    $index = 0;
    for ($i = 9; $i <= 17; $i++) {
        foreach ($roomList as $room) {
            if ($lectures[$index]->getStartTime() == $i) {
                $room_allocation[$room] = $lectures[$index];
                $index++;
            }
        }
    }
//    var_dump($room_allocation);
    return new Schedule($room_allocation);
}

# ====
?>