<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$id = Session::get('uid');
$check = $user->isLoggedIn($id);
if ($check >= 2){
    echo "Welcome <a href=\"profile.php?username=" . Session::get('username') . "\">". Session::get('username') ."</a><br>";
    echo "<a href=\"loading.php?user_id=". $id ."&action=logOut&exittoken=". Token::exittoken() ."\">Log out</a>";
}
?>