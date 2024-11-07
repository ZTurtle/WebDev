
<?php 
function get_todays_mealplanid($userid,$Date){
    //Returns: The mealpan id from Schedule table for a certain date. Will return false if no meal plan scheduled for that day.
    global $db;
    $query= 'SELECT MealPlanID FROM Schedule where UserID = :userid and MealDate= :date';
    $statement= $db->prepare($query);
    $statement->bindValue(':userid',$userid);
    $statement->bindValue(':date',$Date);
    $statement->execute();
    $mealplanid= $statement->fetch();
    
    if ($mealplanid === false){
        return false;
    }
    else {
        return $mealplanid['MealPlanID']; 
    }

    

}

function get_recipes_by_mealplanid($mealplanid): array{
    //Returns: Array of recipes in a meal plan based on the mealplanID
    //Joins the Meal_Plan_Recipes table and the Recipes table only selecting the rows of the correct $mealplanid
    global $db;
    $query= 'SELECT  * from Meal_Plan_Recipes LEFT OUTER JOIN Recipes on Meal_Plan_Recipes.RecipeID = Recipes.RecipeID where MealPlanID= :mealplanid';
    $statement= $db->prepare($query);
    $statement->bindValue(':mealplanid',$mealplanid);
    $statement->execute();
    $recipes= $statement->fetchAll();

    return $recipes;  

}

function getWeekDates($startDate) {
    //Returns: Array of dates Mon-Sun for a week given the start date.
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

    // Add each day from Monday to Sunday to the array
    for ($i = 0; $i < 7; $i++) {
        $weekDates[] = $date->format('Y-m-d');
        $date->modify('+1 day');
    }

    return $weekDates;
}