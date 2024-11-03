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
            include '../View/login_form.php';
            break;
        case 'register_attempt':
            //get inputs from register_form.php
            $fname= filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);
            $lname= filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);
            $UserName= filter_input(INPUT_POST,'UserName',FILTER_SANITIZE_STRING);
            $Password= filter_input(INPUT_POST,'Password',FILTER_SANITIZE_STRING);
            $Confirm_Password= filter_input(INPUT_POST, 'Confirm_Password',FILTER_SANITIZE_STRING);

            if (validate_username($UserName)){//if valid username entered
                if ($Password === $Confirm_Password){
                    add_user($UserName,$Password,$fname,$lname);
                    $userID= get_userID($UserName);
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

        
        case 'login_attempt': //work in progress...
            $username = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'Password');

            if ($username && $password) { //save user info to session
                $user = get_user_by_username($username);
                if ($user && password_verify($password, $user['Password'])) {
                    $_SESSION['UserID'] = $user['User_ID'];
                    $_SESSION['UserName'] = $user['User_Name'];
                    echo'username valid';
                } else {
                    echo "Invalid username or password.";
                }
            } else {
                echo "Please enter both username and password.";
            }
            break;
        case 'homepage': 
            

            include '../View/home.php';
            break;

        default:
            echo 'No case chosen';

    }

    ?>