<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <h1>Weekly Meals</h1>
    <!-- buttons to view next week and this week-->
    <form action= "."method="post">
        <input type= "hidden" name= "action" value= "weekly_schedule">
        <input type = "hidden" name= week_date value= "<?php echo date('Y-m-d', strtotime('+7 days'))?>">
        <button type = "submit" > Next Week</button>
    </form>

    <form action= "." method="post">
        <input type= "hidden" name= "action" value= "weekly_schedule">
        <input type = "hidden" name= week_date value= "<?php echo date('Y-m-d')?>">
        <button type = "submit" > This Week</button>
    </form>

    <!-- Schedule Presentation-->
    <?php foreach ($week as $day): //for each day of the week ?>
        <div class="box">
            <h2> <?php echo $day->format('l'); echo ' ('.$day->format('m-d-Y').')'?> </h2>

            <?php $recipes= get_mealplan_by_date($day,$_SESSION['userID']); 
            if ($recipes == false){ ?>
                <p> No meal planned this day </p>
            <?php } else{ ?>
            <table>
                <tr>
                    <th>Meal</th>
                    <th>Type</th>
                    <th>Cal</th>
                    <th></th>
                </tr>
                <?php
                    foreach ($recipes as $recipe): ?>
                    <tr>
                            <td><?php echo $recipe['RecipeName'];?> </td>
                            <td> <?php echo $recipe['MealType'];?></td>
                            <td> <?php echo $recipe['Cal'];?></td>
                            <td><a href="<?php echo $recipe['URL']?>" target="_blank"> <!--Come back to fix coloing -->
                                <i class="fas fa-link"></i> </a> </td>
                    </tr>
                    <?php endforeach;?>
            </table> <br>
            <p> Total Cal = <?php echo get_mealplan_calories($recipes);?></p>
            <?php }?>

                
            
        </div>
    <?php endforeach;?>
    <br><br><br>
</body>