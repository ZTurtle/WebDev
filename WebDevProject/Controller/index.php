<?php 
    include '../Model/database.php';
    include '../Model/user_db.php';
    include '../errors.php';
    include '../Model/schedule_db.php';
    include '../Model/filters.php';
    include '../Model/newRecipe_db.php';

    session_start();
    
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    
    }
    //for debugging 
    echo 'current action: '. $action;

    switch ($action){
        case 'register':
            $error_message1= '';
            include '../View/register_form.php';
            
        
            break; 
        
        case 'login': //work in progress...
            $error_message2='';
            include '../View/login_form.php';
            break;
        case 'register_attempt':
            //get inputs from register_form.php
            $fname= filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);
            $lname= filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);
            $username= filter_input(INPUT_POST,'UserName',FILTER_SANITIZE_STRING);
            $password= filter_input(INPUT_POST,'Password',FILTER_SANITIZE_STRING);
            $confirm_password= filter_input(INPUT_POST, 'Confirm_Password',FILTER_SANITIZE_STRING);

            if (validate_username($UserName)){//if valid username entered
                if ($password === $confirm_password){ //check password match 
                    add_user($username,$password,$fname,$lname);
                    $user= get_user_by_username($username);
                    //add values to session cookie
                    $_SESSION['userID'] = $user['UserID'];
                    $_SESSION['username'] = $user['Username'];
                    $_SESSION['fname'] = $user['FName'];
                    header('Location: .?action=home');
    
                } else {//invalid username
                    $error_message1= $messages['password_mismatch'];
                    include '../View/register_form.php';
                }
                
            
            } else{ //invalid username was entered
                $error_message1= $messages['user_taken'];
                include '../View/register_form.php';

            }
            break;

        
        case 'login_attempt': 
            $username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'Password');

            if ($username && $password) { //validate user info
                $user= get_user_by_username($username);
                if (!validate_username($username) && password_verify($password, $user['Password'])){
                        //add values to session cookie
                        $_SESSION['userID'] = $user['UserID'];
                        $_SESSION['username'] = $user['Username'];
                        $_SESSION['fname'] = $user['FName'];
                        
                        header('Location: .?action=home');

                }else {
                    $error_message2= $messages['invalid_login'];
                    include '../View/login_form.php';
                    }
                
            } else {
                $error_message2= $messages['incomplete_login'];
                include '../View/login_form.php';
            }

            break;
        case 'home': 
            $fname= $_SESSION['fname'];
            $userID= $_SESSION['userID'];

            // get today's list of recipes in meal plan scheudle 
            $todaysdate= new DateTime();
            $recipes= get_mealplan_by_date($todaysdate,$userID);
            
            $mealplanid= get_mealplanid($userID,$todaysdate);
            
            /* IGNORE
            if ($mealplanid != false){ 
                $recipes= get_recipes_by_mealplanid($mealplanid);
                //get total calories
                $totalcal= 0;
                foreach ($recipes as $recipe){
                    $totalcal= $totalcal+ $recipe['Cal'];
                }

            } */
            
            
            
            include '../View/pageHeader.php';
            include '../View/home.php';
            
            /* view the recipes in $recipes for debugging
            echo '\n';
            echo "<pre>";
            print_r($recipes);
            echo "</pre>"; */

            
            break;
        case 'weekly_schedule':
            //Get the dates of days of the week
            $date= filter_input(INPUT_POST, 'week_date');
            $week= getWeekDates($date);
            print_r($week);
            //for each date present the the recipes 



            include '../View/pageHeader.php';
            include '../View/schedule.php';
            break;
    
        case 'filter_recipes':
                //unfinished
                $minCook = filter_input(INPUT_POST, 'minCook');
                $maxCook = filter_input(INPUT_POST, 'maxCook');
                $minCal = filter_input(INPUT_POST, 'minCal');
                $maxCal = filter_input(INPUT_POST, 'maxCal');
                $mealType = filter_input(INPUT_POST, 'mealType');
                
                $recipes = filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType);
    
                include '../View/recipeView.php';
                break;


        case 'recipe_view':
            $recipes = all_recipes();
            include '../View/recipeView.php';
            break;

        case 'add_recipe':
            include '../View/add_recipe.php';
            break;
        case 'submit_recipe':
            $CookTime = filter_input(INPUT_POST, 'CookTime');
            $Cal = filter_input(INPUT_POST, 'Cal');
            $mealType = filter_input(INPUT_POST, 'mealType');
            $URL = filter_input(INPUT_POST, 'URL');
            $Name = filter_input(INPUT_POST, 'RecipeName');
            
            $imageFolder = "../Model/images/";
            $filePath = $imageFolder . basename($_FILES["file1"]["name"]);
            if(is_uploaded_file($_FILES["file1"]["tmp_name"])){
                echo "file uploaded";
                if(move_uploaded_file($_FILES["file1"]["tmp_name"], $filePath)){
                    echo "file moved";
                }
                else{
                    echo "error moving file";
                }
            }
            else {
                echo "error no file uploaded";
            }
            //echo "$CookTime, $Cal, $mealType, $URL, $Name, $filePath";
            new_recipe($_SESSION['userID'],$CookTime, $Cal, $mealType, $URL, $Name, $filePath);
            header('Location: .?action=recipe_view');

            break;
        case 'delete_recipe':
            $RecipeID = filter_input(INPUT_POST, 'RecipeID');
            delete_recipe($RecipeID);
            header('Location: .?action=recipe_view');
            break;

        default:
            echo 'No case chosen';
        

    }

    ?>