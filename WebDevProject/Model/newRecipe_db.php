<?php
function new_recipe($ID, $CookTime, $Cal, $mealType, $URL, $Name, $filePath){
    global $db;
    $query = 'INSERT INTO recipes
    (UserID, RecipeName, MealType, CookTime, Cal, URL, IMAGEURL)
    VALUES
    (:UserID, :RecipeName, :mealType, :CookTime, :Cal, :URL, :ImageURL)';
    $statement = $db->prepare($query);
    $statement->bindValue(':UserID',$ID );
    $statement->bindValue(':RecipeName', $Name);
    $statement->bindValue(':mealType', $mealType);
    $statement->bindValue(':CookTime', $CookTime);
    $statement->bindValue(':Cal', $Cal);
    $statement->bindValue(':URL', $URL);
    $statement->bindValue(':ImageURL', $filePath);
    $statement->execute();
    $statement->closeCursor();
    return;
}

function delete_recipe($RecipeID){
    global $db;
    $query = 'DELETE 
    FROM recipes
    WHERE RecipeID = :RecipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':RecipeID',$RecipeID );
    $statement->execute();
    $statement->closeCursor();
    return;
}
function edit_recipe($UserID,$CookTime, $Cal, $mealType, $URL, $Name, $filePath, $RecipeID){
    global $db;
    $query = 'UPDATE recipes
    SET
    UserID = :UserID,
    RecipeName = :RecipeName,
    MealType = :MealType,
    CookTime = :CookTime,
    Cal = :Cal,
    URL = :URL,
    ImageURL = :ImageURL
    WHERE RecipeID = :RecipeID';

    $statement = $db->prepare($query);
    $statement->bindValue(':UserID',$UserID );
    $statement->bindValue(':RecipeName', $Name);
    $statement->bindValue(':MealType', $mealType);
    $statement->bindValue(':CookTime', $CookTime);
    $statement->bindValue(':Cal', $Cal);
    $statement->bindValue(':URL', $URL);
    $statement->bindValue(':ImageURL', $filePath);
    $statement->bindValue(':RecipeID',$RecipeID );
    $statement->execute();
    $statement->closeCursor();
    return;

}
?>