<?php
$botToken = "";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, True);

$config = [
    'mysql_host' => '',
    'mysql_user' => '',
    'mysql_password' => '',
    'mysql_db' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password'],
    $config['mysql_db']
);

$mysqli->query("set names utf8mb4_general_ci");

$text = $update['message']['text'];
$chatId = $update['message']['chat']['id'];
$userId = $update['message']['from']['id'];
$increment = 1;

$adminId = array(
   32752003,
);

function sendMessage($chatId, $text) {
    $url = $GLOBALS[website]."/sendMessage?chat_id=$chatId&parse_mode=HTML&text=".urlencode($text);
    file_get_contents($url);
}

include "assets/cashflow.php";
include "assets/colleagues.php";
include "assets/foods.php";
include "assets/help.php";
include "assets/invoices.php";
include "assets/payday.php";
include "assets/statistic.php";
?>
