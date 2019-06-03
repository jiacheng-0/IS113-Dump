<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 28/1/2019
 * Time: 11:45 AM
 */


$this_var_is_set = "set";

echo isset($this_var_is_set); echo "<br/>";
// 1
echo var_dump(isset($this_var_is_set)); echo "<br/>";
// bool(true)

$this_var_is_set = null;
echo var_dump(isset($this_var_is_set)); echo "<br/>";
// bool (false)

