<h1>LOG IN</h1>
<form>
    <div>
        <label>Login </label>
        <input type="text" placeholder="login" name="login" value="<?php if ($_POST) {echo $_POST['login'];}?>"/>
    </div>
    <div>
        <label>Password </label>
        <input type="password" placeholder="password" name="password"/>
    </div>
    <p><button type="submit" name="submit" value="OK">REGISTER</button>
</p>
</form>
