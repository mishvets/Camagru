<h1>SIGN UP</h1>
<form action = "/account/register" method="post">
    <div>
        <label>Login </label>
        <input type="text" placeholder="login" name="login" value="<?php if ($_POST) {echo $_POST['login'];}?>"/>
    </div>
    <div>
        <label>E-mail </label>
        <input type="text" placeholder="email" name="email" value="<?php if ($_POST) {echo $_POST['email'];}?>"/>
    </div>
    <div>
        <label>Password </label>
        <input type="password" placeholder="password" name="password"/>
    </div>
    <div>
        <label>Password Confirmation</label>
        <input type="password" placeholder="password" name="password_c"/>
    </div>
    <p><button type="submit">Sign Up</button></p>
</form>
