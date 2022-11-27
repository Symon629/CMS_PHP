<?php

$db['db_host'] = "127.0.0.1:3308";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";
// $localvar = 'You access local Var using $ and constants using just the variable name \r\n';
// echo $localvar;

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($connection){
    echo"Connection went through";
}

?>
