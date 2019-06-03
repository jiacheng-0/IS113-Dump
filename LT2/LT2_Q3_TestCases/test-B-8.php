<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 4;
    $lectures = [   new Lecture("L1",10,5),
                    new Lecture("L2",9,2),
                    new Lecture("L3",10,3),
                    new Lecture("L4",12,3),
                    new Lecture("L5",13,4),
                    new Lecture("L6",14,2),
                    new Lecture("L7",16,2)   ];

    require_once "test-B-common.php";
?>