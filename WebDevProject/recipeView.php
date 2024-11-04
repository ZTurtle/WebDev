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
        <ul>
        <li><a href='#' class = "button sideBarButton"> test </a></li>
        <li><a href='#' class = "button sideBarButton"> test </a></li>
        <li><a href='#' class = "button sideBarButton"> test </a></li>
</ul>
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