<?php 
    include 'pageHeader.php';
    ?>

<!DOCTYPE HTML>
<!-- Description: Home page four user
Version: 2024/11/4 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    
</head>

<body>
    <h1> Recipe Form </h1>
    <br>    
    <form action = "." method = "post" id = "submit_recipe" enctype="multipart/form-data">
        <input type="hidden" name = "action" value = "submit_recipe">
        
        <label for="RecipeName"> Recipe Name:</label>
        <input type="text" id="RecipeName" name="RecipeName"><br><br>
        <label for= "mealType"> Meal Type:</label>
        <select name="mealType" id="mealType">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>
        <br><br>
        <label for="CookTime"> Cook Time:</label>
        <input type="text" id="CookTime" name="CookTime"><br><br>
        <label for="Cal"> Calories:</label>
        <input type="text" id="Cal" name="Cal"><br><br>
        <label for="URL"> URL:</label>
        <input type="text" id="URL" name="URL"><br><br>
        <label for = "file"> Image: </label>
        <input type="file" name="file1" id = "file1" accept="image/*">
        <br><br>
        <input type = "submit" value = "submit">
        
</form>
</body>
</html>     