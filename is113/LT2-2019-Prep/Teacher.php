<?php
/**
 * Created by PhpStorm.
 * User: Teo Jia Cheng
 * Date: 8/4/2019
 * Time: 8:57 AM
 */

class Teacher
{
    public $age = 21;
    public $students = [];
    public $skill;

    public function __construct()
    {
        $this->skill = new Skill();
    }
}

class Skill
{
    public $name = "PHP Coding";
    public $yearExperience = 4;
}

$kyong = new Teacher();
var_dump($kyong);

$kyong->students[] = "James";
$kyong->students[] = "Jireh";
$kyong->students[] = "Jermyn";

$kyong->skill->name = "Business Analytics";
$kyong->skill->yearExperience = 10;
var_dump($kyong);


