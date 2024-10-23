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

<!DOCTYPE html>
<html>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="../recipe_table.css" />
</head>
<body>
    <main>
        <h1>List of Recipes</h1>
        <div class="row">
            <?php foreach ($recipes as $recipe) :?>
                <div class="column">
                <table>
                <tr>
                <th>
                    <?php echo '<br>'. '<h3>'. $recipe['RECIPE_NAME'] . '</h3>'; ?>
                </th>
                </tr>
                <tr>
                <td>
                    <?php 
                        echo 
                        '<br>'. $recipe['RECIPE_TYPE'] . '<br>' .
                        '<br>'. '<img src = "' . $recipe['RECIPE_IMAGE'].  ' "width = "150" height="150" alt = "Recipe Image">' . '<br>' .
                        '<br>' . $recipe['RECIPE_COOK_TIME'] . '<br>' .
                        '<br>' . $recipe['RECIPE_CALORIES'] . '<br>' .
                        '<br>' . $recipe['RECIPE_SERVINGS'] . '<br>';
                    ?>
                </td>
            </tr>
            </table>
            </div>
            <?php endforeach; ?>
        </div>
            

    </main>
</body>
</html>