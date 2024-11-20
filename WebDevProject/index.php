<?php 
 include "Model/database.php";
?>

<!DOCTYPE HTML>
<!-- Description: Landing page for users login/register 
     Name: Ama Ebong
     Version: 2024/09/08 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1>My Meal Planner</h1>
    <main>
        <div class="box"> 
            <form action="Controller/index.php" method="post">
                <input type="hidden" name="action" value="login">
                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="login">
                </div>
            </form>
            <form action="Controller/index.php" method="post">
                <input type="hidden" name="action" value="register">
                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="register">
                </div>
            </form>
        </div>
    </main>
    <?php include 'View/footer.php'; ?>
</body>

</html>

