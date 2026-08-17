
<!-- 
 1. isset($var):
 - Checks if a variable is declared AND its value is NOT null.
 - Returns true if the variable exists and has any value (even empty string "" or 0).
 - Returns false if the variable does not exist or is set to null.

 2. empty($var):
 - Checks if a variable does not exist OR its value is considered "empty".
 - Values considered empty: "", 0, 0.0, "0", null, false, array().
 - Returns true if variable is empty or doesn't exist.
 - Returns false if variable exists and contains a non-empty value.
 -->


<?php
$name = "";
var_dump(isset($name)); 
var_dump(empty($name)); 

$age = 0;
var_dump(isset($age));  
var_dump(empty($age)); 

$status = null;
var_dump(isset($status)); 
var_dump(empty($status)); 