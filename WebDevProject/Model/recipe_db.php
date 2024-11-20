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
    $query = "UPDATE recipes
    SET
    UserID = :UserID, ";

    if($CookTime != ""){
        $query .= 'CookTime = :CookTime, ';
    }
    if($Cal != ""){
        $query .= 'Cal = :Cal, ';
    }
    if($mealType != ""){
        $query .= 'MealType = :MealType, ';
    }
    if($URL != ""){
        $query .= 'URL = :URL, ';
    }
    if($Name != ""){
        $query .= 'RecipeName = :RecipeName, ';
    }
    if($filePath != "../Model/images/"){
        $query .= 'ImageURL = :ImageURL, ';
    }
    $query = rtrim($query, ", ");
    $query .= " WHERE RecipeID = :RecipeID";
    echo $query;
    /*$query = 'UPDATE recipes
    SET
    UserID = :UserID,
    RecipeName = :RecipeName,
    MealType = :MealType,
    CookTime = :CookTime,
    Cal = :Cal,
    URL = :URL,
    ImageURL = :ImageURL
    WHERE RecipeID = :RecipeID';*/

    $statement = $db->prepare($query);

    $statement->bindValue(':UserID',$UserID );
    if($Name != ""){
    $statement->bindValue(':RecipeName', $Name);
    }
    if($mealType != ""){
    $statement->bindValue(':MealType', $mealType);
    }
    if($CookTime != ""){
    $statement->bindValue(':CookTime', $CookTime);
    }
    if($Cal != ""){ 
    $statement->bindValue(':Cal', $Cal);
    }
    if($URL != ""){
    $statement->bindValue(':URL', $URL);
    }
    if($filePath != "../Model/images/"){
    $statement->bindValue(':ImageURL', $filePath);
    }
    $statement->bindValue(':RecipeID',$RecipeID );
    $statement->execute();
    $statement->closeCursor();
    return;

}

function get_all_recipes($userID){
    //Returns: array of all recipes a user has 
    // Parameters: $userID: User's ID number 
    global $db;
    $query= 'select * from Recipes where UserID= :userID ORDER BY FIELD(MealType, "Breakfast", "Lunch", "Dinner")';
    $stmt= $db->prepare($query);
    $stmt->bindValue(':userID',$userID);
    $stmt->execute();

    $allRecipes= $stmt->fetchAll();
    $stmt->closeCursor();

    return ($allRecipes);

}

function remove_recipes_from_meal_plan($selectedRecipes, $mealplanid) {
    // Removes selected recipes from a meal plan
    global $db;
    foreach ($selectedRecipes as $RecipeID) {
        $query = 'DELETE FROM Meal_Plan_Recipes WHERE MealPlanID = :mealplanid AND RecipeID = :RecipeID';
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':RecipeID', $RecipeID);
        $stmt->bindValue(':mealplanid', $mealplanid);
        $stmt->execute();
        
       /*For debuggiing
         if ($stmt->execute()) {
            echo 'Recipe successfully removed';
        } else {
            echo 'Removal unsuccessful';
        } */
    }
}
function add_recipes_to_meal_plan( $selectedRecipes, $mealplanid){
    //Adds recipes to a mealplan 
    global $db;
    foreach ($selectedRecipes as $RecipeID) {
        $query = 'INSERT INTO Meal_Plan_Recipes(MealPlanID, RecipeID) VALUE (:mealplanid, :RecipeID)';
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':RecipeID', $RecipeID);
        $stmt->bindValue(':mealplanid', $mealplanid);
        //$stmt->execute();

        if ($stmt->execute()) {
            echo 'Recipe successfully added';
        } else {
            echo 'failed to add recipes';
        }
    }

}


?>