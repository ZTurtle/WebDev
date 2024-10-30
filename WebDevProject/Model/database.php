
<?php 
$dsn= 'mysql:host=localhost;dbname=Meal_Planner';
$username= 'mp_user';
$password= 'pa55word';


try{
    $db= new PDO($dsn, $username, $password);
    echo "Connected Succesfully";

}
catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage(); 

}
?>
