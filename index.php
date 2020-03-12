<?php
ob_start();

require "vendor/autoload.php";
// require "source/Config.php";

if(empty($_SESSION["userLogin"])) {    
    echo "<h1>Guest</h1>";

    $facebook = new \League\OAuth2\Client\Provider\Facebook([
    'clientId'                => FACEBOOK["app_id"],
    'clientSecret'            => FACEBOOK["app_secret"],
    'redirectUri'             => FACEBOOK["app_redirect"],
    'graphApiVersion'         => FACEBOOK["app_version"]
]);

$authUrl = $facebook->getAuthorizationUrl([
    "scope" => ["email"]
]);

echo "<a title='FB Login' href='{$authUrl}'>Facebook Login</a>";

} else {
    echo "<h1>User Name</h1>";
}

ob_end_flush();


