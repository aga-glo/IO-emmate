<?php

session_start();

require_once('connect.php');

$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0)
{
    echo "Error: ".$connection->connect_errno;

    print_r($connection);
}
else
{
    print_r($_POST);


    $login = $_POST['username'];
    $password = $_POST['password'];
    
    
    $sql= "SELECT * FROM user WHERE name='$login' AND password='$password'";


   
    //if (!$mysqli -> query("INSERT INTO Persons (FirstName) VALUES ('Glenn')")) {
    //echo("Error description: " . $mysqli -> error); kom do delete
    ///}


    $result = @$connection->query($sql);

    if (!$result) {
        echo("Error description: " . $connection->error);
        exit;
    } 

    if ($result = @$connection->query($sql)){
        $how_many_users = $result->num_rows;
        if($how_many_users>0){

            $wiersz = $result->fetch_assoc();
            $user = $wiersz['user'];
            

            $userId = $wiersz['id'];
            

            $_SESSION['userId'] = $userId;
            

            $result->free_result();

            header('Location: welcomePage.php');


            }else{
                header('Location: logAgain.html');
            }
        }
    

    $connection->close();
}


?>
