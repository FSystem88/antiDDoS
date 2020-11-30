<?php
require "data.php";
$ip=$_SERVER['REMOTE_ADDR'];
$zapros = $_SERVER['REQUEST_METHOD'];
$nowtime = date("Y-m-d H:i:s");
$oldtime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))-$second );
$url = $_SERVER['REQUEST_URI']; 
$file = $_SERVER["DOCUMENT_ROOT"] . "/.htaccess";
$f_LOG = $_SERVER["DOCUMENT_ROOT"] . "/logs/logs.log";

$result = mysqli_query($link, "INSERT INTO `antiddos` (`ip`,`time`) VALUES ('$ip','$nowtime')");
$result = mysqli_query($link, "DELETE FROM `antiddos` WHERE `time` BETWEEN '2020-01-01 00:00:00' and '{$oldtime}'");
$result = mysqli_query($link, "SELECT COUNT(*) FROM `antiddos` WHERE `ip`='$ip' and `time` BETWEEN '{$oldtime}' and '{$nowtime}'");
if ($row=mysqli_fetch_row($result)){
    $count = $row[0];
    if ((int)$count > $limit){
        $f = fopen($file, "a");
        fwrite($f, "Deny from $ip\n" );
        fclose($f);
        $result = mysqli_query($link, "DELETE FROM `antiddos` WHERE `ip`='$ip'");
    }
}

if ($zapros == "GET") { $array = json_encode($_GET); }
elseif ($zapros == "POST") { $array = json_encode($_POST); }
if (empty($array)) { $array = ""; }
$f = fopen($f_LOG, "a");
fwrite($f, "$nowtime | $zapros $ip $url $array\n" );
fclose($f);

?>
