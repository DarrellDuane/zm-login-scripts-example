<?php

$secretKey="change_to_another_secret_key";     // your secret key as configured in ZoneMinder
$userName="zm_user_name";                      // your ZoneMinder username
$passwordHash="get_password_hash_from_mysql_database_for_this_user";  // obtain from MySQL
$domain="your_zone_minder_servername.com/zm";   // domain and location on server of ZoneMinder

// Calculate date information (needs to be within 2 hours)
$hour = date('G');   
$dayOfTheMonth = date('j' );  
$month = date('n') - 1;
$year = date('Y') - 1900;

$authKey= $secretKey . $userName . $passwordHash . $hour . $dayOfTheMonth . $month . $year;

// echo $authKey;   // uncomment for debugging

$authHash = md5($authKey);

$baseURL='http://' . $domain . '/index.php?view=montagereview&auth=';      // configure view as needed

$authURL= $baseURL . $authHash;

// echo $authURL   // uncomment for debugging

// now redirect to your zoneminder installation for autologin

header('Location: ' . $authURL);

exit;

?>