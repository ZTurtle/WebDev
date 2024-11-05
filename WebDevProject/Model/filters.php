<?php
function filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType){
    global $db;
    $query = 'SELECT *
    FROM Recipes
    WHERE Cal BETWEEN :minCal AND :maxCal 
    AND MealType = :mealType 
    AND CookTime BETWEEN :minCook AND :maxCook ';

    $statement = $db->prepare($query);
    $statement->bindValue(':minCal', $minCal);
    $statement->bindValue(':maxCal', $maxCal);
    $statement->bindValue(':mealType', $mealType);
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
?>
