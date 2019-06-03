<?php


// this will autoload the class that we need in our code
spl_autoload_register(function ($class) {

    // we are assuming that it is in the same directory as this file
    // otherwise we have to do
    // $path = 'path/to/' . $class . ".php"    
    $path = $class . ".php";
    require $path;

});


class CourseDAO
{
    public $courses;

    function __construct()
    {
        $this->courses = [new Course("Apple LEE", "IDIS001", "Analytical Skills", "TUE", "1330", 1),
            new Course("Apple LEE", "IS112", "Data Management", "TUE", "830", 2),
            new Course("Apple LEE", "IS113", "Web Application Development", "THU", "1530", 2),
            new Course("Apple LEE", "WRIT001", "Programme in Writing and Reasoning", "MON", "1000", 1),
            new Course("Apple LEE", "WRIT001", "Programme in Writing and Reasoning", "WED", "1000", 1),
            new Course("Bruce LOH", "OBHR001", "Leadership and Team Building", "WED", "1200", 2),
            new Course("Bruce LOH", "IS112", "Data Management", "TUE", "830", 2),
            new Course("Bruce LOH", "IS113", "Web Application Development", "THU", "1530", 2),
            new Course("Bruce LOH", "WRIT001", "Programme in Writing and Reasoning", "FRI", "1000", 1),
            new Course("Bruce LOH", "WRIT001", "Programme in Writing and Reasoning", "WED", "1000", 1),
            new Course("Colin TEO", "CS110", "Great Ideas in Computer Science", "TUE", "830", 2),
            new Course("Colin TEO", "CS111", "Programming Methodology", "TUE", "1200", 2),
            new Course("Colin TEO", "CS112", "Database Systems", "THU", "1530", 2),
            new Course("Colin TEO", "CS113", "Object Oriented Programming", "MON", "830", 2)
        ];
    }

    # This method  retrieves all student names
    function retrieveNames()
    {
        $result = [];
        foreach ($this->courses as $course) {
            if (!in_array($course->studentName, $result)) {
                // Function in_array checks if the first argument is in the second argument (which is an array)
                $result[] = $course->studentName;
            }
        }
        return $result;
    }

    # This method retrieves all courses for a particular student
    function retrieveCourses($student_name)
    {
        $result = [];
        foreach ($this->courses as $course) {
            if ($course->studentName == $student_name) {
                $result[] = $course;
            }
        }
        return $result;
    }
}

?>