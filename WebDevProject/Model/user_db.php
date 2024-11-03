<?php

function get_user_by_username($username){//gets users info from User table
    global $db;
    $query= "SELECT * FROM Users WHERE UserName= :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $user= $statement->fetch();
    $statement->closeCursor();

    return $user;

}

function validate_username($username){ //implemented for registration, but is also used for login. Just take the opposite of the return value
    global $db ;
    $query= 'SELECT * FROM Users WHERE UserName = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();

    if ($statement->fetch()){
        $statement->closeCursor();
        return false; // Username already exists, so it's not valid for registration
    }  else{
        $statement->closeCursor();
        return true;
    }
}

function get_password($username){
    global $db;
    $query= 'SELECT * from Users where UserName = :username';
    $statement= $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $password= $statement->fetch();
    $statement->closeCursor();
    return $password;
}

function add_user($username, $password, $fname,$lname,){
    global $db;
    $password2= password_hash($password, PASSWORD_BCRYPT);
    $query= 'INSERT INTO Users(UserName, Password, Fname, Lname) VALUES (:username,:password2,:fname, :lname)';
    $statement= $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password2',$password2);
    $statement->bindValue('fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->execute();
}

function get_userID($username){
    global $db;
    $query='SELECT UserID FROM Users WHERE UserName =:username';
    $statement= $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $userID= $statement->fetch();
    return $userID['UserID'];
}