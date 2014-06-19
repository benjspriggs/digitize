<?php
$STH = new StatementHandler($PDO);
$user = new User($STH);
$id = Session::get('uid');
$validate = new Validate($STH);

$items = array('username' => array('required' => TRUE, 'exists' => 'users'));
if (Input::get('username')){
    $username = Input::get('username');
}
$source = array('username' => $username);
$validate->check($source, $items);
if($validate->passed()){
    if (Session::exists('uid')){
        $is_accepted = $user->isAccepted($id);
        $is_verified = $user->isVerified($id);
    }
    
    echo "Welcome to $username's profile page.<br>";
    if ($is_accepted){
        if (!$is_verified){
            $res = $STH->get('users', array('email'), array('user_id' => $id), array('user_id', '=', ':user_id'))->getResults();
            $email = $res[0]['email'];
            echo "<a href=\"loading.php?action=sendVerification&user_id=$id&email=$email&token=". Token::csrf() ."\">Send another verification email</a>";
        }
    } else {
        echo "Your user ID #$id has been blacklisted.<br>";
    }
} else {
    echo "User $username does not exist in our records, sorry.<br>";
}

?>