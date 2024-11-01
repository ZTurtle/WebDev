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
        <lable>User Name</lable>
        <input type="text" name="UserName">

        <label> Password</label>
        <input type="password" name= "Password" required>
        <input type="submit" value= "Login">

    </form>
</body>
</html>