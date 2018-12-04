<?php

// 現在時刻を取得
function getCurrentTime()
{
    date_default_timezone_set("Asia/Tokyo");
    $date = date('Y/m/d H:i:s');
    return $date;
}
