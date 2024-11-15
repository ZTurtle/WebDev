
<?php 
function get_mealplanid($userid,$Date){
    //Returns: The a singular mealpan id from Schedule table for a certain date. Will return false if no meal plan scheduled for that day.
    //Input: $userid: user's id, $Date: DateTime Object 
    global $db;
    $date= $Date->format('Y-m-d');
    $query= 'SELECT MealPlanID FROM Schedule where UserID = :userid and MealDate= :date';
    $statement= $db->prepare($query);
    $statement->bindValue(':userid',$userid);
    $statement->bindValue(':date',$date);
    $statement->execute();
    $mealplanid= $statement->fetch();
    
    if ($mealplanid === false){
        return false;
    }
    else {
        return $mealplanid['MealPlanID']; 
    }

    

}

function get_recipes_by_mealplanid($mealplanid){
    //Returns: Array of recipes in a meal plan based on the mealplanID
    //Joins the Meal_Plan_Recipes table and the Recipes table only selecting the rows of the correct $mealplanid
    global $db;
    $query= 'SELECT * from Meal_Plan_Recipes LEFT OUTER JOIN Recipes on Meal_Plan_Recipes.RecipeID = Recipes.RecipeID where MealPlanID= :mealplanid';
    $statement= $db->prepare($query);
    $statement->bindValue(':mealplanid',$mealplanid);
    $statement->execute();
    $recipes= $statement->fetchAll();

    $statement->closeCursor();
    return $recipes;
    // return $recipes;  

}

function getWeekDates($startDate) {
    //Returns: Array of dates Mon-Sun for a week given the start date. The dates are all DateTime Objects.
    //Parameters:  $startDate= string 

    // Convert $startDate to a DateTime object
     $date = new DateTime($startDate);
    
    // Find the day of the week for $startDate (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
    $dayOfWeek = $date->format('w');
    
    // Calculate the offset to the most recent Monday
    $daysToMonday = ($dayOfWeek + 6) % 7 * -1;
    
    // Adjust $date to the Monday of the current week
    $date->modify("$daysToMonday days");

    // Create an array to hold the week's dates
    $weekDates = [];

    // Add each day from Monday to Sunday to the array as DateTime objects
    for ($i = 0; $i < 7; $i++) {
        $weekDates[] = clone $date; // Store the DateTime object (use clone to avoid modification)
        $date->modify('+1 day');
    }

    return $weekDates;
}

function get_mealplan_by_date($date,$userid){
    //Returns: Array of all scheduled recipes in a meal plan based on a date. If no recipes scheduled, return false.
    //Input: $date= DateTimeObject

    $mealplanid= get_mealplanid($userid,$date);
            
    if ($mealplanid != false){ 
        $recipes= get_recipes_by_mealplanid($mealplanid);
        return($recipes);
    }
    else {
        return false;
    }

}

function get_mealplan_calories($recipes){
    //Returns: Sum of calories found in meals 
    //Input: $recipes= array of recipes given
    $totalcal= 0;
    foreach ($recipes as $recipe){
        $totalcal= $totalcal+ $recipe['Cal'];
    }

    return $totalcal;
}

function clear_schedule($scheduleDate){
    global $db;
    $query= 'Delete From Schedule where MealDate = :scheduleDate';
    $statement= $db->prepare($query);
    $statement->bindValue(':scheduleDate',$scheduleDate);
    $statement->execute();
    
}