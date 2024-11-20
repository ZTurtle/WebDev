
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<html>
    <body>
        <h2>Recipes in this meal plan:</h2>
        <table>
            <tr>
                <th>Meal</th>
                <th>Type</th>
                <th>Cal</th>
                <th></th>
            </tr>
            <?php foreach ($recipes as $recipe): ?>
            <tr>
                    <td><?php echo $recipe['RecipeName'];?> </td>
                    <td> <?php echo $recipe['MealType'];?></td>
                    <td> <?php echo $recipe['Cal'];?></td>
                    <td><a href="<?php echo $recipe['URL']?>" target="_blank"> <!--Come back to fix coloing -->
                        <i class="fas fa-link"></i> </a> </td>

            </tr>
            <?php endforeach;?>
        </table> 
    </body>
    <h2>What date(s) would you like to use this plan for?</h2>
    
</html>