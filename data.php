<?php
# MySQL
$host = '';
$database = ''; 
$user = ''; 
$password = ''; 
$link = mysqli_connect($host, $user, $password, $database);

# Ограничение по количеству запросов в заданное время, после которого ip уйдет в бан
$limit = 60;

# Ограничение по времени, (за какой промежуток времени в секундах будет проверяться кол-во запросов($limit) )
$second=60;
?>
