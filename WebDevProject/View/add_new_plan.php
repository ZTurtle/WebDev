<?php include 'pageHeader.php' ?>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="../main.css" />
</head>
<body>
<form action = "../Controller/index.php" method = "post">
<input type="hidden" name="action" value="add_plan_to_schedule">

<?php foreach ($recipes as $recipe) :?>
<div class = "row">
<?php 
                        if ( strlen($recipe['RecipeName'])> 20){
                                $name = substr($recipe['RecipeName'], 0,16) . "...";
                        }
                        else{
                            $name = $recipe['RecipeName'];
                        }
                        echo 
                        //'<input type="checkbox" class ="check" name="selected[]" value="'. $recipe['RecipeID']. '">'.
                        
                        '<input type="checkbox" name="recipeIDs[]" value= "' . $recipe['RecipeID'].'">
                        <label for="vehicle1"> Select Recipe</label><br>'.
                        '<img src = "' . $recipe['ImageURL'].  ' "width = "150" height="150" alt = "Recipe Image">' .
                        '<p>'. $name . '</p>'. 
                        '<label> Type:</label>'. '<label>'. $recipe['MealType'] .'</label>' .
                        '<label> Cook Time:</label>'. '<label>' . $recipe['CookTime']  .'</label>' .
                        '<label> Calories:</label>'. '<label>' . $recipe['Cal'] .'</label>' ;
                    ?>
</div>
<?php endforeach; ?>
<input type= "submit" value="Submit">
</form>
</body>
</html>