<h1>LOG IN</h1>
<form action = "/account/login" method="post">
    <div>
        <label>Login </label>
        <input type="text" placeholder="login" name="login" value="<?php if ($_POST) {echo $_POST['login'];}?>"/>
    </div>
    <div>
        <label>Password </label>
        <input type="password" placeholder="password" name="password"/>
    </div>
    <p>
    <button type="submit" name="enter" value="OK">REGISTER</button>
    </p>
</form>
