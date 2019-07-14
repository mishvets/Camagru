<h1>SIGN UP</h1>
<form name="ajax_form">
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
        <input type="password" placeholder="password confirm" name="password_c"/>
    </div>
    <p><button type="submit" id="btn" name = "enter">Sign Up</button></p>
<!--    <button onclick = "post_query('test', 'login', 'login.email.password.password_c')">Sign Up</button>-->
</form>
