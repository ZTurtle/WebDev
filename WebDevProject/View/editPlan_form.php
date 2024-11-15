<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <form action="." method="post">
        <input type="hidden" name="mealplanid" value="<?php echo $mealplanid; ?>">
        <input type="hidden" name="action" value="save_plan_edits">
        <!-- choose recipes to remove -->
        <h3>Select the recipe(s) you would like to remove from the meal plan:</h3>
        <table>
            <tr>
                <th>Select</th>
                <th>Recipe Name</th>
                <th>Type</th>
            </tr>
            <tbody>
            <?php

            foreach ($recipes as $recipe) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="remove_recipes[]" value="' . $recipe['RecipeID'] . '"></td>';
                echo '<td>' . $recipe['RecipeName'] . '</td>';
                echo '<td>' . $recipe['MealType'] . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

    <!-- choose recipes to add -->
        <h3>Select the recipe(s) you would like to add to the meal plan:</h3>
        <select name="add_recipes[]" multiple size="7"> <!-- Use "multiple" for multi-select -->
            <?php foreach ($allRecipes as $recipe): ?>
                <option value="<?php echo $recipe['RecipeID']; ?>"><?php echo htmlspecialchars($recipe['RecipeName'].' - '.htmlspecialchars($recipe['MealType'])); ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <button type="submit" >Save Changes</button>
    </form>
</body>
