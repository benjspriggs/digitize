<?php
//The form has been submitted properly
//Validate the input
$STH = new StatementHandler($PDO);
$validate = new Validate($STH);
$username = Input::get('username');
$password = Input::get('password');
$pass_again = Input::get('password_again');
$email = Input::get('email');
$email_again = Input::get('email_again');
$source = array('username' => $username,
                'password' => $password,
                'password_again' => $pass_again,
                'email' => $email,
                'email_again' => $email_again);
$items = array('username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20),
                'password' => array(
                    'required' => true,
                    'min' => 6,
                    'max' => 40),
                'password_again' => array(
                    'required' => true,
                    'min' => 6,
                    'max' => 20,
                    'matches' => 'password'),
                'email' => array(
                    'required' => true,
                    'min' => 5),
                'email_again' => array(
                    'required' => true,
                    'min' => 5,
                    'matches' => 'email'));
$validate->check($source, $items);
if ($validate->passed()){
    if (Input::exists('remember')){
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }
    //The user has supplied legit data
    //Register them!
    $user = new User($STH);
    $user->registerUser($username, $password, $email, $remember);
    $user->getErrors();
} else {
    echo 'Validation failed for the following reasongs: <br>';
    $validate->errors();
}
?>