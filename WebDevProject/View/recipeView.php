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


    
?>


<?php include 'pageHeader.php' ?>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="../recipe_table.css" />
</head>
<body>
    <div class = "sidebar">
    <form action="." method="post" id="filter_recipes">
        <input type="hidden" name="action" value="filter_recipes">
        <ul>
        <li> <h3> Meal Type: </h3>
        <select name="mealTypeFilter" id="mealTypeFilter">
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>
        </li>
        <li><h3> Filter by Calories </h3></li>
        <li>
        <input type="Minimum" name= "MinCalories" placeholder = "Minimum">
        <a> to </a>
        <input type="Maximum" name= "MaxCalories" placeholder = "Maximum">
        <br>
        <li><h3> Filter by Cook Time </h3></li>
        <li>
        <input type="Minimum" name= "MinCookTime" placeholder = "Minimum">
        <a> to </a>
        <input type="Maximum" name= "MaxCookTime" placeholder = "Maximum">
        </li>
        <li>
        <input type="submit" value="Filter" class= "button sideBarButton">
        </li>
        </ul>

    </form>
    </div>
    <div class = "moveRight">
    <main>
        <h1>List of Recipes</h1>
        <div class="row">
            <?php foreach ($recipes as $recipe) :?>
                <div class="column">
                <table>
                <tr>
                </tr>
                <tr>
                <td>
                    <?php 
                        echo 
                        '<br>'. '<h3>'. $recipe['RECIPE_NAME'] . '</h3>'.
                        '<br>'. '<img src = "' . $recipe['RECIPE_IMAGE'].  ' "width = "150" height="150" alt = "Recipe Image">' . '<br>' .
                        '<br>'.'<span class="cardLabels"> Type:</span>'. '<span class= "labelContent">'. $recipe['RECIPE_TYPE'] .'</span>'. '<br>' .
                        '<br>'.'<span class="cardLabels"> Cook Time:</span>'. '<span class= "labelContent">' . $recipe['RECIPE_COOK_TIME'] . '<br>' .
                        '<br>'.'<span class="cardLabels"> Calories:</span>'. '<span class= "labelContent">' . $recipe['RECIPE_CALORIES'] . '<br>' .
                        '<br>' .'<span class="cardLabels"> Servings:</span>'. '<span class= "labelContent">'. $recipe['RECIPE_SERVINGS'] . '<br>'.'<br>'.
                        '<button class= "button recipeButton"> Recipe</button>'.'<br>'.'<br>' ;
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
