<?php
//sessionにパラメータを格納
if (isset($_GET['page'])) {
    session_start();
    $_SESSION['page'] = $_GET['page'];

}
