<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../header.css" />
</head>
<body>
<div class= "headerRow">
    <div class = "headerColumn">
    <form action = "." method = "post" value = "home">
    <input type = "hidden" name= "action" value = "home">
    <button type = "submit" class= "button headerButton">Home</button>
    </form>
    </div>

    <div class = "headerColumn">
    <form action = "." method = "post" value = "recipe_view">
    <input type = "hidden" name= "action" value = "recipe_view">
    <button type = "submit" class= "button headerButton">My Recipes</button>
    </form>
    </div>

    <div class = "headerColumn">
        
        <form action = "." method = "post">
            <input type = "hidden" name= "action" value = "weekly_schedule">
            <input type = "hidden" name= "week_date" value= "<?php echo date('Y-m-d')?>">
            <button type = "submit" class= "button headerButton">Weekly Schedule</button>
            
        </form>
    </div>

    <div class = "headerColumn">
    <form action = "." method = "post" value = "recipe_view">
    <input type = "hidden" name= "action" value = "recipe_view">
    <button class= "button headerButton"> Saved Meal Plans</button>
    </form>
    </div>

</div>
</table>

</body>
