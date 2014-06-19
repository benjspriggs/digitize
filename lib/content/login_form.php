<h2>Sign In</h2>
<form action="loading.php" method="POST" enctype="multipart/form-data">
    <div class="field">
        <input name="username" id="username" type="text" maxlength="20" placeholder="Username" value="<?=Input::get('username')?>" required>
    </div>
    <div class="field">
        <input name="password" id="password" type="password" maxlength="40" placeholder="Password" value="<?=Input::get('password')?>" required>
    </div>
    <label for="remember">Remember:</label>
    <input type="checkbox" name="remember" value="remember">
    <input type="submit" name="submit" value="Log In">
    <input type="hidden" name="action" value="logIn">
    <input type="hidden" name="token" value="<?=Token::csrf();?>">
</form>
<a href="register.php">Register</a>