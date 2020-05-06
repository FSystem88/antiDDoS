<?php

# MySQL
$host = 'localhost';
$database = ''; 
$user = ''; 
$password = ''; 
$link = mysqli_connect($host, $user, $password, $database);
$table = 'antiddos'; //name your table ( I have for example "antiddos" )

# rus # Ограничение по количеству запросов в заданное время, после которого ip уйдет в бан
# eng # Limit on the number of requests at a certain time, after which the ip will be banned
$limit = 20;

# rus # Ограничение по времени, (за какой промежуток времени в секундах будет проверяться кол-во запросов($limit) )
# eng # Time limit
$second=60;

# rus # Создайте папку и файлы в ней куда быдут записываться логи и пропишите путь к ним
# rus # У меня к примеру папку logs и файлы get.log и post.log для записей логов GET и POST запросов соответственно.
# eng # Create a folder and files in it where logs will be recorded and write the path to them
# eng # I have for example the logs folder and the get.log and post.log files for log entries for GET and POST requests, respectively.
$f_GET = $_SERVER["DOCUMENT_ROOT"] . "/logs/get.log";
$f_POST = $_SERVER["DOCUMENT_ROOT"] . "/logs/post.log";

?>
