<?php

if (!file_exists('madeline.php')) { copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', 'MASTER');
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();

if(isset($_GET['user'])){
try {
$k = $_GET['user'];
$MadelineProto->channels->joinChannel(['channel' => $k, ]);
    $chat =  $MadelineProto->getpwrchat($_GET['user']);
$MadelineProto->echo (json_encode($chat, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
$MadelineProto->channels->leaveChannel(['channel' => $k, ]);
} catch (Exception $e) {
    print_r($e);
}

}