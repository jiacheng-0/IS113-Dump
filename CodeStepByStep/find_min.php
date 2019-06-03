<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 30/1/2019
 * Time: 2:42 PM
 */

function find_min($nums)
{
    $smallest = $nums[0];
    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] < $smallest) {
            $smallest = $nums[$i];
        }
    }
    return $smallest;
}

$nums = [-1, 3, 12, 15, -4, 1, -12, 1, 8];
echo find_min($nums);


