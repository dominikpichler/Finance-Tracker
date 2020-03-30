<?php


$db['db_host'] = '127.0.0.1';
$db['db_user'] = 'root';
$db['db_password'] = 'Dominik1#';
$db['db'] = 'klickbar';


foreach ($db as $key => $value){

    define(strtoupper($key),$value);


}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB);




?>