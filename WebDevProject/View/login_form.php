<!DOCTYPE HTML>
<!-- Description: Login form for user 
     Version: 2024/10/31 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <form action= "." method="post">
        <input type="hidden" name="action" value= "login_attempt">
        <lable>Username</lable>
        <input type="text" name="UserName"><br><br>

        <label> Password</label>
        <input type="password" name= "Password" required>
        <input type="submit" value= "Login"> <br><br>

        <?php if ($error_message2) {
        echo '<strong style="color: red;">' . htmlspecialchars($error_message2) . '</strong><br>';  
        }
        
        ?>

    </form>
</body>
</html>