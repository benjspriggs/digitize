<h2>Register</h2>
<form action="loading.php" method="POST" enctype="multipart/form-data">
    <div class="field">
        <input name="username" id="username" type="text" maxlength="20" placeholder="Username" value="<?=Input::get('username')?>" required>
    </div>
    <div class="field">
        <input name="password" id="password" type="password" maxlength="40" placeholder="Password" value="<?=Input::get('password')?>" required>
    </div>
    <div class="field">
        <input name="password_again" id="password_again" type="password" maxlength="40" placeholder="Password again" value="<?=Input::get('password_again')?>" required>
    </div>
    <div class="field">
        <input name="email" id="email" type="email" maxlength="40" placeholder="Email" value="<?=Input::get('email')?>" required>
    </div>
    <div class="field">
        <input name="email_again" id="email_again" type="email" maxlength="40" placeholder="Email again" value="<?=Input::get('email_again')?>" required>
    </div>
    <label for="remember">Remember:</label>
    <input type="checkbox" name="remember" value="remember">
    <input type="submit" name="submit" value="Register">
    <input type="hidden" name="action" value="registerUser">
    <input type="hidden" name="token" value="<?=Token::csrf()?>">
</form>
<a href="index.php">Sign in</a>