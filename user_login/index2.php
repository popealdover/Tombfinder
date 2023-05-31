<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>USER LOGIN</title>
    <h1 class = "text-dark">TOMB FINDER: AN INTEGRATED INFORMATION MANAGEMENT AND TRACING SYSTEM FOR MEMORIAL PARK WITH GEOMAPPING</h1>
    <link rel="stylesheet" type="text/css" href="style1.css" >
</head>
<body style="background:url(./img/loginbg.jpg);
    background-position: center;
    background-size: cover;">
    
    
    <form action="login.php" method="post" id ="log"> 
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) {?>
            <p class="error"><?php echo$_GET['error']; ?></p>
        <?php }?>
      
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <a href="signup.php" class="ca">Create an account</a>
    </form>
</body>
</html>