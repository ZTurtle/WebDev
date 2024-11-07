<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../header.css" />
</head>
<body>
<div class= "headerRow">
    <div class = "headerColumn">
        <form action = "." method = "post" value = "recipe_view">
            <input type = "hidden" name= "action" value = "recipe_view">
        <button type = "submit" class= "button headerButton">My Recipes</button>
        </form>
    </div>
    <div class = "headerColumn">
        <form action = "." method = "post">
            <input type = "hidden" name= "action" value = "weekly_schedule1">
            <input type = "hidden" name= week_date value= <?php date('Y-m-d')?>>
            <button type = "submit" class= "button headerButton">Weekly Schedule</button>
            
        </form>
    </div>
    <div class = "headerColumn">
    <button class= "button headerButton"> Saved Meal Plans</button>
    </div>
</div>
</table>

</body>
