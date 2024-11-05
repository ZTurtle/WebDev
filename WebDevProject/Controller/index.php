<?php 
    include '../Model/database.php';
    include '../Model/user_db.php';
    include '../errors.php';
    include '../Model/schedule_db.php';
    
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

            // get list of recipes in meal plan scheudle 
            $todaysdate= date('Y-m-d');
            $mealplanid= get_todays_mealplanid($userID,$todaysdate);
            $recipes= get_recipes_by_mealplanid($mealplanid);
            //get total calories
            $totalcal= 0;
            foreach ($recipes as $recipe){
                $totalcal= $totalcal+ $recipe['Cal'];
            }
            

            include '../View/home.php';


            
            /* view the the recipes in $recipes for debuggin
            echo '\n';
            echo "<pre>";
            print_r($recipes);
            echo "</pre>"; */

            
            break;
        case 'filter_recipes':
                //unfinished
                $minCook = filter_input(INPUT_POST, 'minCook');
                $maxCook = filter_input(INPUT_POST, 'maxCook');
                $minCal = filter_input(INPUT_POST, 'minCal');
                $maxCal = filter_input(INPUT_POST, 'maxCal');
                $mealType = filter_input(INPUT_POST, 'mealType');
                
                echo $mealType . $minCal . $maxCal;
                filter_recipes($minCal, $maxCal, $minCook, $maxCook, $mealType);
    
                include '../View/recipePage.php';
                break;
        default:
            echo 'No case chosen';
        case 'filter_recipes':
            //unfinished

            include '../View/recipePage.php';
            break;
    }

    ?>