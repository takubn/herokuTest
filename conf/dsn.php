<?php

//DB接続時のdsn設定
$host = '127.0.0.1';
$dbname = 'board';
$user = 'sampleuser';
$password = '12345678';

define('DSN', "mysql:host=$host;dbname=$dbname;charset=utf8");
define('USER', $user);
define('PASSWORD', $password);
