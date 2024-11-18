
<?php

function get_all_mealplanids ($userID){
    // returns: Array of all meal plan ids a user has from the Meal_Plans table
    // input: user $userID: The user's ID

    global $db;
    $query= 'SELECT  MealPlanID from Meal_Plans where UserID= :userID';
    $stmt= $db->prepare($query);
    $stmt->bindValue(':userID',$userID);
    $stmt->execute();
    $MealPlanIDs= $stmt->fetchAll();
    $stmt->closeCursor();
    return ($MealPlanIDs);


}

function delete_meal_plan($mealplanid){
    //Adds recipes to a mealplan 
    global $db;
    $query = 'DELETE 
    FROM meal_plans
    WHERE MealPlanID = :mealplanid';
    $statement = $db->prepare($query);
    $statement->bindValue(':mealplanid',$mealplanid);
    $statement->execute();
    $statement->closeCursor();
    return;

}
function add_meal_plan($mealplanid, $recipes, $userID){
    global $db;
    //for all the recipes selected in the add for add each to the newly created mealplan
    $query = 'INSERT INTO meal_plans
        (MealPlanID, UserID)
        VALUES
        (:MealPlanID, :UserID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':MealPlanID',$mealplanid);
    $statement->bindValue(':UserID', $userID);
    $statement->execute();
    $statement->closeCursor();
    //may not need mealplanID if autoincre
    
    foreach($recipes as $recipe):
        $query = 'INSERT INTO meal_plan_recipes
        (MealPlanID, RecipeID)
        VALUES
        (:MealPlanID, :RecipeID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':MealPlanID',$mealplanid);
        $statement->bindValue(':RecipeID', $recipe);
        $statement->execute();
        $statement->closeCursor();
    endforeach;
    return;
}

function get_next_meal_plan(){
    global $db;
    $query = 'SELECT MAX(MealPlanID) FROM meal_plans';
    $statement = $db->prepare($query);
    $statement->execute();
    $mealplanid = $statement->fetchColumn();
    $statement->closeCursor();
    if(empty($mealplanid)){
        return 1;
    }
    else{
    return $mealplanid + 1;
}
}
?>