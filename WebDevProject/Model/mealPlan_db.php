
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