<!DOCTYPE HTML>
<!-- Description: Home page four user
     Version: 2024/11/4 -->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">    
</head>

<body>

    <h2>Welcome, <?php echo $fname;?> </h2>
    <div class="box">
        <h2> Today's Meals</h2>
        <?php if (!empty($recipes)){}?>  
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
                    <td><a href="http://example.com/recipe" target="_blank"> <!--Come back to fix coloing -->
                        <i class="fas fa-link"></i> </a> </td>

            </tr>
            <?php endforeach;?>
        </table> 
        <p> Total Cal: <?php echo $totalcal ?></p>
    </div>

</body>
