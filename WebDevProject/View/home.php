<!DOCTYPE HTML>
<!-- Description: Home page four user
     Version: 2024/11/4 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>    
</head>
<main>
<body>

    <h2 class="Welcome">Welcome, <?php echo $fname;?> </h2>
    <div class="box">
        <h2> Today's Meals</h2>
        <?php if ($recipes == false){?>
            <p> No meal planned for today</p>
        <?php } else{ ?>
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
                    <span class="iconify" data-icon="twemoji:link" data-inline="true"></span> </a> </td>

            </tr>
            <?php endforeach;?>
        </table> 
        <p> Total Cal = <?php echo get_mealplan_calories($recipes);?></p>
        <?php }?>
    </div>

</body>
</main>
</html>
