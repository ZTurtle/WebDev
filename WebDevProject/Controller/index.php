<?php 
    include '../Model/database.php';
    include '../Model/user_db.php';
    include '../errors.php';
    include '../Model/schedule_db.php';
    include '../Model/filters.php';
    include '../Model/recipe_db.php';
    include '../Model/mealPlan_db.php';
    

    session_start();
    
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    
    }
    //for debugging 

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
        case 'log_out':
            session_unset();
            session_destroy();
            header('Location: ..');
            break;

        case 'home': 
            $fname= $_SESSION['fname'];
            $userID= $_SESSION['userID'];

            // get today's list of recipes in meal plan scheudle 
            $todaysdate= new DateTime();
            $recipes= get_mealplan_by_date($todaysdate,$userID);
            
            $mealplanid= get_mealplanid($userID,$todaysdate);
            
            
            
            include '../View/pageHeader.php';
            include '../View/home.php';
            
            /* view the recipes in $recipes for debugging
            echo '\n';
            echo "<pre>";
            print_r($recipes);
            echo "</pre>"; */

            
            break;
        case 'weekly_schedule':
            //Get the days of the week (DateTime Objecy) in a single array.
            $dateString = filter_input(INPUT_POST, 'week_date', FILTER_SANITIZE_STRING);
            if (!$dateString){
                $dateString = filter_input(INPUT_GET, 'week_date', FILTER_SANITIZE_STRING); 
            }

            $week= getWeekDates($dateString); 

            

            include '../View/pageHeader.php';
            include '../View/schedule.php';
            break;

        case 'clear_schedule':
            $scheduleDateString = filter_input(INPUT_POST,'schedule_date',FILTER_SANITIZE_STRING);
            clear_schedule($scheduleDateString);
            
            header("Location: ?action=weekly_schedule&week_date=$scheduleDateString");
            break;
    
        case 'filter_recipes':
                //unfinished
                $minCook = filter_input(INPUT_POST, 'minCook');
                $maxCook = filter_input(INPUT_POST, 'maxCook');
                $minCal = filter_input(INPUT_POST, 'minCal');
                $maxCal = filter_input(INPUT_POST, 'maxCal');
                $mealType = filter_input(INPUT_POST, 'mealType');
                $search = filter_input(INPUT_POST, 'search');
                $recipes = filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType, $search);

                include '../View/recipeView.php';
                break;


        case 'recipe_view':
            $recipes = get_all_recipes($_SESSION['userID']);
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
        case 'edit_recipe':
            $RecipeID = filter_input(INPUT_POST, 'RecipeID');
            $recipe = get_recipe($RecipeID);
            include '../View/edit_recipe.php';
            break;

        case 'submit_edit_recipe':
            $RecipeID = filter_input(INPUT_POST, 'RecipeID');
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
            echo $filePath;
            edit_recipe($_SESSION['userID'],$CookTime, $Cal, $mealType, $URL, $Name, $filePath, $RecipeID);
            header('Location: .?action=recipe_view');
            break;
        

        case 'saved_plans':
            $userID= $_SESSION['userID'];
            $MealPlanIDs= get_all_mealplanids($userID);

            include '../View/pageHeader.php';
            include("../View/saved_plans.php");
            break;

        case 'delete_plan':
            //delete plan from MealPlan recipe using the meal plan ID (sent) and user ID
            $mealplanid= filter_input(INPUT_POST,'mealplanid',FILTER_VALIDATE_INT);
            $userID= $_SESSION['userID'];
            delete_meal_plan($mealplanid);
            header('Location: .?action=saved_plans');
            break;

        case 'use_plan':
            //add selected plan to schedule
            $mealplanid= filter_input(INPUT_POST,'mealplanid',FILTER_VALIDATE_INT);
            $recipes= get_recipes_by_mealplanid($mealplanid);
            $twoWeekDates= getDatesForTwoWeeks();
        

            include('../View/usePlan_form.php');
            break;
        case 'add_plan_to_schedule':
            $planDates= filter_input(INPUT_POST, 'selected_dates', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
            $mealplanid= filter_input(INPUT_POST,'mealplanid',FILTER_VALIDATE_INT);
            $userID= $_SESSION['userID'];
            var_dump($planDates);// string of dates 

            foreach ($planDates as $date) {
                add_plans_to_schedule($userID,$mealplanid,$date);
            }
            
            header('Location: .?action=saved_plans');

            break;

        case 'edit_plan':
            $mealplanid= filter_input(INPUT_POST,'mealplanid',FILTER_VALIDATE_INT);
            $recipes= get_recipes_by_mealplanid($mealplanid);
            $allRecipes= get_all_recipes($_SESSION['userID']);

            include('../View/editPlan_form.php');

            break;
        case 'save_plan_edits':
            $mealplanid= filter_input(INPUT_POST,'mealplanid',FILTER_VALIDATE_INT);
            $recipesToRemove= filter_input(INPUT_POST, 'remove_recipes', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
            $recipesToAdd= filter_input(INPUT_POST, 'add_recipes', FILTER_DEFAULT, FILTER_FORCE_ARRAY);

            // print_r($recipesToAdd);
            // print_r($recipesToRemove);
            echo 'if stmt next <br>';
            if (!empty($recipesToRemove)){
                echo 'removing';
                remove_recipes_from_meal_plan($recipesToRemove,$mealplanid);
            }
            if(!empty($recipesToAdd)){
                add_recipes_to_meal_plan($recipesToAdd,$mealplanid);
            }

            header('Location: .?action=saved_plans');
            break;

        case 'create_new_plan':
            //adding after creation form
            $userID= $_SESSION['userID'];
            $SelectedRecipes= filter_input(INPUT_POST,'recipeIDs',FILTER_DEFAULT,FILTER_FORCE_ARRAY);
            $mealplanid = get_next_meal_plan();
            add_meal_plan($mealplanid, $SelectedRecipes, $userID);
            echo '<pre>';
            print_r($SelectedRecipes);
            echo '</pre>';
            header('Location: .?action=saved_plans');
            break; 
        
        case 'newPlanForm':
            $recipes = get_all_recipes($_SESSION['userID']);
            include '../View/create_new_plan.php';
            break;
        default:
        echo 'No case chosen';

        

    }

    ?>