<?php 
    include '../Model/database.php';
    include '../Model/user_db.php';
    include '../errors.php';
    
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
                    $userID= get_userID($username);
                    $_SESSION['USERID']= $userID; //save USERID  to session cookie
                    header('Location: .?action=homepage');
    
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
            $username = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'Password');

            if ($username && $password) { //validate user info
                $user= get_user_by_username($username);
                if (!validate_username($username) && password_verify($password, $user['Password'])){
                    
                        $_SESSION['userID'] = $user['UserID'];
                        $_SESSION['username'] = $user['UserName'];
                        // echo'username valid';
                        // echo $_SESSION['userID'], $_SESSION['username'];
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
            

            include '../View/home.php';
            break;

        default:
            echo 'No case chosen';
        case 'filter_recipes':
            //unfinished

            include '../View/recipePage.php'
            break;
    }

    ?>