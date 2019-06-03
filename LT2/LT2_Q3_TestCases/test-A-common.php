<?php
    $test_schedule = new Schedule($room_allocation);
    display_schedule($test_schedule);

    echo "<h4>
            This test case passes if the above tables are identical or fails otherwise. 
            Rooms may be shown in a different order, e.g., Room 4 (if exists) maybe shown before Room 1.
        </h4>";
?>