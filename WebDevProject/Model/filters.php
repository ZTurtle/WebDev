<?php
function filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType){
    $query = 'SELECT *
    FROM Recipes
    WHERE Cal BETWEEN :minCal AND :maxCal 
    AND MealType = :mealType 
    AND CookTime BETWEEN :minCook AND :maxCook ';

    $statement = $db->prepare($query);
    $statement->bindValue(':minCal', $minCal);
    $statement->bindValue(':maxCal', $maxCal);
    $statement->bindValue(':MealType', $mealType);
    $statement->bindValue(':minCook', $minCook);
    $statement->bindValue(':maxCook', $maxCook);
    $statement->execute();
    $Meals = $statement->fetchAll();
    $statement->closeCursor();
    return $Meals;
}
?>