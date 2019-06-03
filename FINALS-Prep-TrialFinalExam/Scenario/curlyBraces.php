<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 22/4/2019
 * Time: 7:15 PM
 */

define('KANGJINSUX', "he really does");

echo 'KANGJINSUX : ' . KANGJINSUX;

class Student
{
    private $name;
    private $score;

    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    public function getScore()
    {
        return $this->score;
    }
}

//$labTestScores = ["Ram" => 19.5, "James" => 15];

//echo "<pre>";
//print_r($labTestScores);
//echo "</pre>";

//echo "$labTestScores[Ram]" . "<br/>"; // 19.5

//echo "{$labTestScores['Ram']}" . "<br/>";
// use of undefined constant Ram - assumed 'Ram' (this will throw an Error in a future version of PHP)
// still prints 19.5

//echo "{$labTestScores['Ram']}" . "<br/>"; // 19.5

$scores = [new Student("Ram", 19.5), new Student("Kang Jin", 16.0)];

echo "<hr/>";
echo "{$scores[1]->getName()}<br/>";
echo "{$scores[1]->getScore()}<br/>";

$_SESSION['sherry'] = 'pretty';
$sherry = "sherry";
echo "1 " . $_SESSION['sherry'] . "<br/>";
echo "2 $_SESSION[sherry]<br/>";
echo "3 {$_SESSION['sherry']}<br/>";
echo "4 $_SESSION[$sherry] love KJ<br/>";