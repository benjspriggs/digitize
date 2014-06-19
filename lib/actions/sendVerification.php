<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);

$userid = Input::get('user_id');
$salt = $STH->get('users', array('salt'), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();

$is_verified = $user->isVerified($userid);

if (!$is_verified){
    $email = Input::get('email');
    $salt = $STH->get('users', array('salt'), array('user_id' => $userid), array('user_id', '=', ':user_id'))->getResults();
    $token = Hash::encode($email, $salt[0]['salt']);
    Mail::verify($email, $token);
    echo "The e-mail has been sent to $email. Check your inbox or junk mail folder!<br>";
}
?>