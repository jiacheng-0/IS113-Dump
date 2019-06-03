<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 2;
    $lectures = [   new Lecture("L3",14,3),
                    new Lecture("L2",10,2),
                    new Lecture("L1",10,2)     ];

    require_once "test-B-common.php";
?>