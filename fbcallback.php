<?php
session_start();
require_once( 'Facebook/autoload.php' );
require_once('dbhelp.php');
$fb = new Facebook\Facebook([
'app_id' => '397768601400691',
'app_secret' => '75b9049c28a5c3704436267dba13477b',
'default_graph_version' => 'v8.0',
]);
$helper = $fb->getRedirectLoginHelper();
try {
    $accessToken = $helper->getAccessToken();
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (! isset($accessToken)) {
    if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
    }
    exit;
}
// Logged in
$me = $response->getGraphUser();
$name = $me->getName();
$email = $me->getEmail();
$fbID = $me->getId();
$username = strstr($email, '@', true);
$_SESSION['position'] = 'Student';
$_SESSION['fb_access_token'] = (string) $accessToken;
//check neu facebook account da ton tai hay chua, neu chua ton tai thi them vao DB.
$sql = "SELECT * FROM users WHERE fbID =".$fbID;
$check = mysqli_query($conn, $sql);
if(mysqli_num_rows($check) == 0){
    $sql = "INSERT into users (username, email, name, position, fbID) VALUES ('$username', '$email', '$name', 'Student', '$fbID') ";
    $result = mysqli_query($conn, $sql);
}
//get UserID tu fbID.
$sql = "SELECT id FROM users WHERE fbID =".$fbID;
$resultSet = mysqli_query($conn, $sql);
$idQuery = mysqli_fetch_array($resultSet);
$_SESSION['userID'] = $idQuery['id'];
header("Location: studentView.php");
?>