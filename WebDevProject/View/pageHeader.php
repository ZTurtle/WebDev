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
    <form action = "../Controller/index.php" method = "post" value = "recipe_view">
    <input type = "hidden" name= "action" value = "recipe_view">
    <button type = "submit" class= "button headerButton">My Recipes</button>
    </form>
    </div>

    <div class = "headerColumn">
    <form action = "." method = "post" value = "recipe_view">
    <input type = "hidden" name= "action" value = "recipe_view">
    <button class= "button headerButton" > Weekly Schedule</button>
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
