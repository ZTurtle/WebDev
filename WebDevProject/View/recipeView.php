<?php 
/*$dsn = 'mysql:host=localhost; dbname=payroll';
$username = 'employee_manager';
$password = 'pa55word';

try {
$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
$error_message = $e->getMessage();
echo '<p>An error occurred while connecting to
the database: $error_message </p>';
}*/
/*
$recipes = [
    $recipe1 =[
        "RECIPE_NAME" => "Braised Beef",
        "RECIPE_TYPE" => "Breakfast",
        "RECIPE_COOK_TIME" => "2 hours",
        "RECIPE_CALORIES" => "640",
        "RECIPE_SERVINGS" => "8",
    "RECIPE_IMAGE" => "./Songs_in_the_key_of_life.jpg",],
        $recipe3 =[
            "RECIPE_NAME" => "Braised Beef",
            "RECIPE_TYPE" => "Breakfast",
            "RECIPE_COOK_TIME" => "2 hours",
            "RECIPE_CALORIES" => "640",
            "RECIPE_SERVINGS" => "8",
        "RECIPE_IMAGE" => "./SabaBLP.jpg",],
    $recipe2 =[
        "RECIPE_NAME" => "Braised Beef",
        "RECIPE_TYPE" => "Breakfast",
        "RECIPE_COOK_TIME" => "2 hours",
        "RECIPE_CALORIES" => "640",
        "RECIPE_SERVINGS" => "8",
        "RECIPE_IMAGE" => "./candydrip.jpg",]

];
*/


?>


<?php include 'pageHeader.php' ?>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="../recipe_table.css" />
</head>
<body>
    <div class = "sidebar">
    <form action="../Controller/index.php" method="post" id="filter_recipes">
        <input type="hidden" name="action" value="filter_recipes">
        <ul>
        <li> <h3> Meal Type: </h3>
        <select name="mealType" id="mealType">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>
        </li>
        <li><h3> Filter by Calories </h3></li>
        <li>
        <input type="text" name= "minCal" placeholder = "Minimum">
        <a> to </a>
        <input type="text" name= "maxCal" placeholder = "Maximum">
        <br>
        <li><h3> Filter by Cook Time </h3></li>
        <li>
        <input type="text" name= "minCook" placeholder = "Minimum">
        <a> to </a>
        <input type="text" name= "maxCook" placeholder = "Maximum">
        </li>
        <li>
        <input type="submit" value="Filter" class= "button sideBarButton">
        </li>
        <li>
            <form action="../Controller/index.php" method="post" id="add_recipe">
            <input type="hidden" name="action" value="add_recipe">
            <input type= "submit" value = "Add Recipe" class = "button sideBarButton" >    
        </form>
        </li>
        </ul>

    </form>
    </div>
    <div class = "moveRight">
    <main>
        <div class="row">
            <?php foreach ($recipes as $recipe) :?>
                <div class="column">
                <table>
                <tr>
                </tr>
                <tr>
                <td>
                    <?php 
                        if ( strlen($recipe['RecipeName'])> 20){
                                $name = substr($recipe['RecipeName'], 0,16) . "...";
                        }
                        else{
                            $name = $recipe['RecipeName'];
                        }
                        echo 
                        '<br>'. '<h3>'. $name . '</h3>'. 
                        //'<input type="checkbox" class ="check" name="selected[]" value="'. $recipe['RecipeID']. '">'.
                        '<form action = "../Controller/index.php" method = "post">'.
                        '<br>'. '<img src = "' . $recipe['ImageURL'].  ' "width = "150" height="150" alt = "Recipe Image">' . '<br>' .
                        '<input type="hidden" name="RecipeID" value="'. $recipe['RecipeID']. '">'.
                        '<br>'.'<span class="cardLabels"> Type:</span>'. '<span class= "labelContent">'. $recipe['MealType'] .'</span>'. '<br>' .
                        '<br>'.'<span class="cardLabels"> Cook Time:</span>'. '<span class= "labelContent">' . $recipe['CookTime'] . '<br>' .
                        '<br>'.'<span class="cardLabels"> Calories:</span>'. '<span class= "labelContent">' . $recipe['Cal'] . '<br>' .'<br>' .
                        '<a class= "button recipeButton" href="'. $recipe['URL']. '">&#x1F517</a>'.
                        '<button type = "submit" name = "action" value = "delete_recipe" class= "button deleteButton"> Delete</button>'. '<br>'. '<br>'.
                        '<button type = "submit" name = "action" value = "edit_recipe" class= "button editButton"> &#9998</button>' .
                        '<br>' .'<br>'. '</form>' ;
                    ?>
                </td>
            </tr>
            </table>
            </div>
            <?php endforeach; ?>
        </div>
            

    </main>
            </div>
</body>
</html>
