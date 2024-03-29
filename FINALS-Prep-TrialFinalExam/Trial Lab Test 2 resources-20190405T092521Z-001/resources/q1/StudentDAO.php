<?php
    spl_autoload_register(function($class){
        require_once $class . ".php";
    });

    require_once '../database/ConnectionManager.php';
    
    class StudentDAO{
        
        # This method selects all students from the database
        # and returns them as an array of Student objects
        function getAll(){
            
            ### DO NOT MODIFY THE FOLLOWING CODE ###
            $students = [];
            
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            $sql = "SELECT * FROM student";
            ########################################

            // Add code here
            return $students;
        }

        # This method selects all students from a particular $school
        # who takes at least $min_course_count courses from the database. 
        # The students are sorted based on their ids if $sort_by_id is TRUE. 
        # Otherwise, they are sorted based on their names.
        # The method returns the sorted students as an array of Student objects.
        function getStudents($school, $min_course_count, $sort_by_id){
            
            ### DO NOT MODIFY THE FOLLOWING CODE ###
            $students = [];
            
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();

            $sort_criteria = "";
            if($sort_by_id){
                $sort_criteria = "student.id";
            }
            else{
                $sort_criteria = "student.name";
            }

            $sql = "SELECT student.id, student.name FROM student JOIN course 
                    ON student.id = course.student_id WHERE student.school = :school 
                    GROUP BY student.id HAVING count(*) >= :min_course_count 
                    ORDER BY " . $sort_criteria;
            ########################################

            // Add code here
            return $students;
        }

    }
?>