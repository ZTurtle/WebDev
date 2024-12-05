<?php 
    include 'pageHeader.php';
    ?>

<!DOCTYPE HTML>
<!-- Description: Home page four user
Version: 2024/11/4 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href= "../recipe_table.css">
    
</head>

<body>
    <br>   
    <div class = "split right">
    <div class = "centered">
        <h1> Previous Recipe </h1>
        
                    <?php 
                        if ( strlen($recipe['RecipeName'])> 20){
                                $name = substr($recipe['RecipeName'], 0,16) . "...";
                        }
                        else{
                            $name = $recipe['RecipeName'];
                        }
                        echo 
                        '<h3>'. $name . '</h3>'. 
                        //'<input type="checkbox" class ="check" name="selected[]" value="'. $recipe['RecipeID']. '">'.
                        '<br>'. '<img src = "' . $recipe['ImageURL'].  ' "width = "150" height="150" alt = "Recipe Image">' . '<br>' .
                        '<br>'.'<span class="cardLabels"> Type:</span>'. '<span class= "labelContent">'. $recipe['MealType'] .'</span>'. '<br>' .
                        '<br>'.'<span class="cardLabels"> Cook Time:</span>'. '<span class= "labelContent">' . $recipe['CookTime'] . '<br>' .
                        '<br>'.'<span class="cardLabels"> Calories:</span>'. '<span class= "labelContent">' . $recipe['Cal'] . '<br>' .'<br>' .
                        '<br>' .'<br>' ;
                    ?>
    </div>
    </div>

    <div class = "split left">
    <div class = "centered">

        <h1> New Recipe </h1>
    <form action = "." method = "post" id = "submit_recipe" enctype="multipart/form-data">
        <input type="hidden" name = "action" value = "submit_edit_recipe">
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
        <input type = "hidden" name = "RecipeID" value = " <?php echo $recipe['RecipeID']?> ">
        <br><br>
        <input type = "submit" value = "submit">
        
</form>
                    </div>
                    </div>
</body>
</html>     