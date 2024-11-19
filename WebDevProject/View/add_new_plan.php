<?php include 'pageHeader.php' ?>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="../main.css" />
</head>
<body>
<form action = "../Controller/index.php" method = "post">
<input type="hidden" name="action" value="add_plan_to_schedule">
<div class="row">
<?php foreach ($recipes as $recipe) :?>
    <div class = "column">
    <table class= "add">
                <tr>
                </tr>
                <tr class = "add">
                <td class = "add">
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
                        '<br>'.'<span class="cardLabels"> Type:</span>'. '<span class= "labelContent">'. $recipe['MealType'] .'</span>'. '<br>' .
                        '<br>'.'<span class="cardLabels"> Cook Time:</span>'. '<span class= "labelContent">' . $recipe['CookTime'] . '<br>' .
                        '<br>'.'<span class="cardLabels"> Calories:</span>'. '<span class= "labelContent">' . $recipe['Cal'] . '<br>' .'<br>'  ;
                        
                    ?>
            </td>
            </tr>
            </table>
</div>
<?php endforeach; ?>

</div>
<input type= "submit" value="Submit">
</form>
</body>
</html>