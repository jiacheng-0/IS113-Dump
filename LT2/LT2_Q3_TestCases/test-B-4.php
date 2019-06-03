<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 2;
    $lectures = [   new Lecture("L2",11,2),
                    new Lecture("L1",14,4),
                    new Lecture("L4",13,2),
                    new Lecture("L3",11,3)     ];

    require_once "test-B-common.php";
?>