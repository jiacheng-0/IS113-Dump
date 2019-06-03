<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 1;
    $lectures = [   new Lecture("L2",11,3),
                    new Lecture("L1",15,2),
                    new Lecture("L3",17,1)     ];

    require_once "test-B-common.php";

?>