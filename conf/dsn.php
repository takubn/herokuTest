<?php

//DB接続時のdsn設定
$host = 'us-cdbr-iron-east-01.cleardb.net';
$dbname = 'heroku_b24bf788d9d54e3;charset=utf8';
$user = 'b35095427bfc9e';
$password = '5efb2b8e';

//テスト
define('DSN', "mysql:host=$host;dbname=$dbname;charset=utf8");
define('USER', $user);
define('PASSWORD', $password);
