<?php
    spl_autoload_register(
        function($class){
            require_once "../classes/$class.php";
        }
    );

    $max_rooms_answer = 1;
    $lectures = [   new Lecture("L2",10,3),
                    new Lecture("L1",14,3)     ];
    
    require_once "test-B-common.php";
?>