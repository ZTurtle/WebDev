<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <br><br>
    <form action= "." method="post">
        <input type= "hidden" name= "action" value="newPlanForm">
        <button type = "submit" > Add New Meal Plan</button>
    </form>
    <?php foreach ($MealPlanIDs as $PlanID){?>
    <div class="box">
        
        <table class="custom-table">
            <tr>
                <th> Recipe </th>
                <th>Type</th>
                
            </tr>
            <?php $mealPlanRecipes= get_recipes_by_mealplanid($PlanID['MealPlanID']);
            foreach ($mealPlanRecipes as $recipe) { ?>
            <tr>
                <td><?php echo $recipe['RecipeName'];?></td>
                <td><?php echo $recipe['MealType'];?></td>
            </tr>
            <?php }?>
        </table>
        <p> Total Cal = <?php echo get_mealplan_calories($mealPlanRecipes);?></p>
        <!-- Delete,Edit and Use Meal Plans Buttons  -->
        <form action= "." method="post">
            <input type= "hidden" name= "action" value="delete_plan">
            <input type="hidden" name="mealplanid" value=" <?php echo $PlanID['MealPlanID']?>">
            <button type = "submit" > Delete </button>
        </form>
        <form action= "." method="post">
            <input type= "hidden" name= "action" value="use_plan">
            <input type="hidden" name="mealplanid" value=" <?php echo $PlanID['MealPlanID']?>">
            <button type = "submit" > Use Meal Plan</button>
        </form>
        <form action= "." method="post">
            <input type= "hidden" name= "action" value="edit_plan">
            <input type="hidden" name="mealplanid" value=" <?php echo $PlanID['MealPlanID']?>">
            <button type = "submit" > Edit </button>
        </form>

    </div>
    <?php }?>
</body>