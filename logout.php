<?php
session_start();
require 'db.php';
require 'remember_me.php';

$rememberMeToken = $rememberMe->getRememberMeToken();
if ($rememberMeToken) {
    $rememberMe->deleteToken($rememberMeToken);
    $rememberMe->clearRememberMeCookie();
}

if (isset($_SESSION['admin_id'])) {
    $rememberMe->deleteAllTokensForAdmin($_SESSION['admin_id']);
}

$_SESSION = [];
session_destroy();

header("Location: index.php");
exit();
?>
