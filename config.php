<?php
require_once 'php-login-facebook-account/vendor/autoload.php';
if(!session_id()){
    session_start();
}
$facebook = new \Facebook\Facebook([
    'app_id'                => '397768601400691',
    'app_secret'            => '75b9049c28a5c3704436267dba13477b',
    'default_graph_version' => 'v2.10'
]);
?>