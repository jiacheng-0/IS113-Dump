<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 3;
    $lectures = [   new Lecture("L2",11,2),
                    new Lecture("L1",14,4),
                    new Lecture("L4",13,2),
                    new Lecture("L3",11,3), 
                    new Lecture("L5",12,4)     ];

    require_once "test-B-common.php";
?>