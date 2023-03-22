<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" type="text/css" href="admin_login_style.css">
</head>
<body>
    <form action="login1.php" method="post" > 
        <h2>ADMIN LOGIN</h2>
        <?php if (isset($_GET['error'])) {?>
            <p class="error"><?php echo$_GET['error']; ?></p>
        <?php }?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <a href="signup_admin.php" class="ca">Create an account</a>
    </form>
</body>
</html>