<?php
function filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType, $search){
    global $db;
    // if no string entered make infinity (or close)
    if ($minCal == ""){
        $minCal = 0;
    }
    if ($minCook == ""){
        $minCook = 0;
    }
    if ($maxCal == ""){
        $maxCal = 99999;
    }
    if ($maxCook == ""){
        $maxCook = 99999;
    }
    if ($search == ""){
    if ($mealType == "All"){
        $query = 'SELECT *
        FROM Recipes
        WHERE Cal BETWEEN :minCal AND :maxCal 
        AND CookTime BETWEEN :minCook AND :maxCook ';
        $statement = $db->prepare($query);
    }
    else{
        $query = 'SELECT *
        FROM Recipes
        WHERE Cal BETWEEN :minCal AND :maxCal 
        AND MealType = :mealType 
        AND CookTime BETWEEN :minCook AND :maxCook ';
        $statement = $db->prepare($query);
        $statement->bindValue(':mealType', $mealType);
    }
}
else{
    $search = "%$search%";
    if ($mealType == "All"){
        $query = 'SELECT *
        FROM Recipes
        WHERE RecipeName LIKE :search AND Cal BETWEEN :minCal AND :maxCal 
        AND CookTime BETWEEN :minCook AND :maxCook';
        $statement = $db->prepare($query);
    }
    else{
        $query = 'SELECT *
        FROM Recipes
        WHERE RecipeName LIKE :search AND Cal BETWEEN :minCal AND :maxCal 
        AND MealType = :mealType 
        AND CookTime BETWEEN :minCook AND :maxCook ';
        $statement = $db->prepare($query);
        $statement->bindValue(':mealType', $mealType);
}
$statement->bindValue(':search', $search);
}
    $statement->bindValue(':minCal', $minCal);
    $statement->bindValue(':maxCal', $maxCal);
    $statement->bindValue(':minCook', $minCook);
    $statement->bindValue(':maxCook', $maxCook);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function all_recipes(){
    global $db;
    $query = 'SELECT * 
    FROM Recipes';

    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}
function get_recipe($RecipeID){
    global $db;
    $query = 'SELECT * 
    FROM Recipes
    WHERE RecipeID = :RecipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':RecipeID',$RecipeID );
    $statement->execute();
    $recipe = $statement->fetchAll();
    $statement->closeCursor();
    $recipe = $recipe[0];
    return $recipe;
}
?>