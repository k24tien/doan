<?php
include 'config.php';
//$collection = $db->user;
//$cursor = $collection->find();
function addUser($username,$password,$fullname){
	$collection = $db->user;
	$roles = array("read" => '1', "update" => '1', "delete" => '1');
	$document = array( "username" => $username, "pwd" => $password, "name" => $fullname, "roles" => $roles);
	$collection->insert($document);
	
}

function test(){
    $collection = $db->user;

    // find everything in the collection
    $cursor = $collection->find();

    // iterate through the results
    foreach ($cursor as $document) {
        echo $document["fullname"] . "\n";
    }
}

function hello($username){
    echo $username;
}
?>
