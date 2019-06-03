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
            "Room-1" => [
                new Lecture("L10", 9, 1),
//                new Lecture("L1", 10, 1),
                new Lecture("L9", 11, 3),
                new Lecture("L8", 14, 3)],

            "Room-2" => [
                new Lecture("L6", 13, 1),
                new Lecture("L7", 9, 3),
                new Lecture("L5", 15, 1)
            ],

            "Room-3" => [
                new Lecture("L2", 11, 1),
                new Lecture("L1", 9, 1),
                new Lecture("L3", 13, 1),
                new Lecture("L4", 15, 1)
            ],
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
//else {
//    header("Location: ./");
//}
#########################################################

# Part A (Display the schedule): ENTER CODE HERE == 
function display_schedule($schedule)
{
    $room_allocation = $schedule->getRoomAllocation();
    $roomList = array_keys($room_allocation);
//    var_dump($roomList);
    echo "<table border='1'>";
    echo "  <tr>
                <th></th>";

    foreach ($roomList as $one_room) {
        echo "<th>$one_room</th>";
    }
    echo "</tr>";

//    echo "<pre>";
//    print_r($schedule);

//    var_dump($room_allocation);
//    var_dump(array_keys($room_allocation));

    // we need to sort the $room_allocation assoc array before moving on
    // need to sort by room and time
    // [room, time] => Lecture;

//    $allLectures = [];
//    var_dump($allLectures);

    $cell_to_skip = [
//        assign roomlist to cell_to_skip array
//        'Room-1' => 0,
//        'Room-2' => 0,
//        'Room-3' => 0
    ];
//    var_dump($cell_to_skip);

    foreach ($roomList as $one_room) {
        // assign value 0
        $cell_to_skip[$one_room] = 0;
    }
//    var_dump($cell_to_skip);

    for ($i = 9; $i <= 17; $i++) {
        if ($i < 10) {
            $i = "0" . $i;
        }
        $timing = $i . "-" . ($i + 1);
//        echo "<tr><th>$timing</th><td>		</td><td>		</td><td>		</td></tr>";
        echo "<tr>
                <th>$timing</th>";
        foreach ($roomList as $room) {
            if ($cell_to_skip[$room] >= 1) {
                $cell_to_skip[$room] -= 1;
//                var_dump($cell_to_skip);
                continue;
            }

            $td_to_print = "<td></td>";
            foreach ($room_allocation[$room] as $oneLecture) {
                if ($oneLecture->getStartTime() == $i) {
//                    var_dump($oneLecture);
                    $level = $oneLecture->getId();
                    $duration = $oneLecture->getDuration();

                    if ($duration >= 2) {
                        $cell_to_skip[$room] += $duration - 1;
//                        var_dump($cell_to_skip);
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
# helper function check_room_valid($one_lecture, $room_alloc)
function check_room_valid($target_lecture, $room_alloc)
{

    // check which room is available
    // return Room-1, Room-2, Room-3, Room-4 etc.
    // or return false
//    $empty_timeslots = [];
//    for ($i = 9; $i <= 17; $i++) {
//        $empty_timeslots[$i] = false;
//    }
    $targetStartTime = $target_lecture->getStartTime();
    $targetDuration = $target_lecture->getDuration();
    $targetEndTime = $targetStartTime + $targetDuration;
    foreach ($room_alloc as $one_room_id => $list_of_lectures) {
        //check which time has been taken
        $timeslots_taken = [
//          9 => false
//          10
//          11...
        ];
        for ($i = 9; $i <= 17; $i++) {
            $timeslots_taken[$i] = false;
        }
        foreach ($list_of_lectures as $oneLecture) {
            $startTime = $oneLecture->getStartTime();
//            $level = $oneLecture->getId();
            $duration = $oneLecture->getDuration();
            for ($s = $startTime; $s < ($startTime + $duration); $s++) {
                $timeslots_taken[$s] = true;
            }
        }

        // check if $one_lecture can be assigned to this $one_room_id
        $valid = true; // assume u can
        // find any slot that is taken
        for ($t = $targetStartTime; $t < $targetEndTime; $t++) {
            if ($timeslots_taken[$t] == true) {
                $valid = false;
                break;
            }
        }
        if ($valid == true) {
            return $one_room_id;
        }
    }

    return false;
}

# test #1 no overlap
# test #2 overlap

// this functions sorts the array of objects
function cmp($a, $b)
{
    $aID = substr($a->getId(), 1);
    $bID = substr($b->getId(), 1);
    if ($aID == $bID) {
        return 0;
    }
    return $aID < $bID ? -1 : 1;
}

function create_schedule($lectures)
{
    // $lectures array
    // room => [array of lecture objects]

    $room_allocation = [
//        example data:
//        "Room-1" => [
//            new Lecture("L10", 9, 1),
//            new Lecture("L9", 11, 3),
//            new Lecture("L8", 14, 3)
//        ],
    ];
//    var_dump($lectures);
//    unset($lectures[0]);
//    var_dump($lectures);

//    while (count($lectures) > 0) {
//        unset($lectures[count($lectures) - 1]);
//        echo "<hr/>";
//        var_dump($lectures);
//    }
//    exit();


    if (count($lectures) == 0) {
        return $room_allocation;
    }
//    var_dump(array_slice($lectures, 5));
    usort($lectures, 'cmp');
//    var_dump($lectures);

    $numOfRooms = 0;
    // tracks how many rooms inside
    while (count($lectures) > 0) {

        // each while loop will assign a lecture inside
        // while loop stops when there is no more
        // lectures to assign inside
        if ($numOfRooms == 0) {
            //add a new room
            $room_name = "Room-" . ++$numOfRooms;
            $room_allocation[$room_name] = [];
        }
        $lastLecture = $lectures[count($lectures) - 1];
//        var_dump($lastLecture);
        $room_to_allocate = check_room_valid($lastLecture, $room_allocation);
//        var_dump($room_to_allocate);
        if ($room_to_allocate == false) {
            $room_to_allocate = "Room-" . ++$numOfRooms;
        }
        $room_allocation[$room_to_allocate][] = $lastLecture;

        unset($lectures[count($lectures) - 1]);
//        echo "<hr/>";
//        display_schedule(new Schedule($room_allocation));
//        var_dump($room_allocation);
    }

    return new Schedule($room_allocation);
}


?>