<?php
require "data.php";
$ip=$_SERVER['REMOTE_ADDR'];
$nowtime = date("Y-m-d H:i:s");
$oldtime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))-$second );
$url = $_SERVER['REQUEST_URI']; 
$file = $_SERVER["DOCUMENT_ROOT"] . "/.htaccess";
$result = mysqli_query($link, "INSERT INTO `$table` (`ip`,`time`) VALUES ('$ip','$nowtime')");
$result = mysqli_query($link, "DELETE FROM `$table` WHERE `time` BETWEEN '2020-01-01 00:00:00' and '$oldtime'");
$result = mysqli_query($link, "SELECT COUNT(*) FROM `$table` WHERE `ip`='$ip' and `time` BETWEEN '$oldtime' and '$nowtime'");
if ($row=mysqli_fetch_row($result)){
    $count = $row[0];
    if ((int)$count > $limit){
        $f = fopen($file, "a");
        fwrite($f, "Deny from $ip\n" );
        fclose($f);
        $result = mysqli_query($link, "DELETE FROM `$table` WHERE `ip`='$ip'");
    }
}
if (!empty($_GET)) {
    $array = json_encode($_GET);
    $f = fopen($f_GET, "a");
    fwrite($f, "$nowtime | $ip $array $url\n" );
    fclose($f);
}
if (!empty($_POST)) {
    $array = json_encode($_POST);
    $f = fopen($f_POST, "a");
    fwrite($f, "$nowtime | $ip $array $url\n" );
    fclose($f);
}
?>
