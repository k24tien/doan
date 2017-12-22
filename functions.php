<?php
include_once '/config/config.php';

//$cursor = $collection->find();
function addUser($conn,$user,$password,$fullname){
	$fQuery = array('username' => $user);
    $queryDbFind = $conn->findOne($fQuery);
    if(empty($queryDbFind)){
        $roles = array("read" => 1, "update" => 1, "delete" => 1);
        $document = array( "username" => $user, "pwd" => $password, "name" => $fullname, "roles" => $roles);
        $conn->insert($document);
        echo ' <div class="alert alert-success">';
        echo '<strong>Success!</strong> Create new user <strong>'.$user.'</strong> successfully!';
        
    }
    else{
        echo ' <div class="alert alert-danger">';
        echo '<strong>Failed!</strong> User <strong>'.$user.'</strong> existed!';
    }
        
}
function checkLogin($conn,$user,$pwd){
    $fQuery = array("username" => $user, "pwd" => $pwd);
    
    $queryDbFind = $conn->findOne($fQuery);
    //print_r($fQuery);
    
    if($queryDbFind){
        header('Location: newpost.php');
    }
    else
        echo "Wrong user or password!";
}


?>
