<!DOCTYPE HTML>
<!-- Description: Register form for user 
     Version: 2024/10/31-->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <form action= "." method="post">
        <input type="hidden" name="action" value= "register_attempt">
        <label>First Name: </label>
        <input type="text" name=" fname"> <br><br>

        <lable>Last Name: </lable>
        <input type="text" name="lname"><br><br>

        <lable>Username: </lable>
        <input type="text" name="UserName"><br><br>

        <label> Password: </label>
        <input type="password" name= "Password" required><br><br>
        
        <label>Confirm Password: </label>
        <input type= "password" name= "Confirm_Password"><br><br>

        <?php if ($error_message1) {
        echo '<strong style="color: red;">' . htmlspecialchars($error_message1) . '</strong><br>';  
        }
        
        ?>

        <input type="submit" value= "Register">


    </form>
</body>
</html>