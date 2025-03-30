<?php

require_once(dirname(__FILE__) . "/database.php");
 // Adjust the relative path


if (!defined('ROOT_URL')) {
    define('ROOT_URL', 'http://localhost/fmp/');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'children_db');
}
?>