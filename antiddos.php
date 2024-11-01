<?php
// Исключенные IP, которые не будут проверяться на частоту запросов
$excluded_ips = ['127.0.0.1', 'localhost'];

// Пути к файлам 
$LogPath = './.logs/log.txt'; // для логов, создать
$htaccessPath = './.htaccess'; // корневой .htaccess

// Параметры лимита
$limit = 1;        // Разрешённое количество запросов
$time_limit = 1;   // Время в секундах для проверки частоты запросов

$ip = $_SERVER['REMOTE_ADDR'];

if (in_array($ip, $excluded_ips)) {
	return;
}

$db = new mysqli('localhost', 'username', 'password', 'database'); // ЗАПОЛНИТЬ 
if ($db->connect_error) {
	die("Ошибка подключения к базе данных: " . $db->connect_error);
}

$current_time = time();

$request_type = $_SERVER['REQUEST_METHOD'];
$request_data = json_encode($_REQUEST);
$log_entry = date("Y-m-d H:i:s") . " | Тип: $request_type | IP: $ip | Данные: $request_data\n";
file_put_contents($LogPath, $log_entry, FILE_APPEND);

$time_window_start = $current_time - $time_limit;
$stmt = $db->prepare("DELETE FROM antiddos WHERE time < ?");
$stmt->bind_param("i", $time_window_start);
$stmt->execute();
$stmt->close();

$stmt = $db->prepare("SELECT COUNT(*) FROM antiddos WHERE ip = ? AND time >= ?");
$stmt->bind_param("si", $ip, $time_window_start);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($request_count);
$stmt->fetch();

if ($request_count >= $limit) {
	$block_entry = "Deny from $ip\n";
	file_put_contents($htaccessPath, $block_entry, FILE_APPEND | LOCK_EX);
	die("Ваш IP был заблокирован из-за слишком частых запросов.");
}

$stmt = $db->prepare("INSERT INTO antiddos (ip, time) VALUES (?, ?)");
$stmt->bind_param("si", $ip, $current_time);
$stmt->execute();
$stmt->close();
$db->close();
