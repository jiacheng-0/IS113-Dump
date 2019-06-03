<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 3;
    $lectures = [   new Lecture("L1",9,1),
                    new Lecture("L5",10,2),
                    new Lecture("L4",10,7),
                    new Lecture("L6",12,1),
                    new Lecture("L2",14,3),
                    new Lecture("L3",16,2)     ];

    require_once "test-B-common.php";
?>