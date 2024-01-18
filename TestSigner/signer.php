<?php
$ipa = htmlspecialchars($_POST['ipa']);
$p12 = htmlspecialchars($_POST['p12']);
$profile = htmlspecialchars($_POST['mobileprovision']);
$password = htmlspecialchars($_POST['pass']);

$url = $_GET['file'];
$split = explode('/', $url);
if(count($split) != 1)
    $id = $split[4];
else
    $id = $url;

$response = json_decode(file_get_contents('ipa=' . $id .'&p12=' . $p12 . '&mobileprovision=' . $profile . '&password=' . $password), true);
if($response['status'])
    header('Location: ' . $response['url']);
else
    echo 'Signing Failed';