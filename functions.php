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
		$_SESSION['name'] = $queryDbFind["name"];
         //echo  $_SESSION['name'] ;
        header('Location: newpost.php');
    }
    else
        echo "Wrong user or password!";
}
function showCategory($conn){
    $cursor = $conn->find();
    $count = 0;
    foreach ($cursor as $document) {
        $count = $count + 1;
        echo "<tr>";
        echo "<td>".$count."</td>";
        foreach($document as $key => $val) {
            if($key != "_id"){
            echo "<td>".$val."</td>";
            }
        }
        echo "<td></td>";
        echo "</tr>";
    }
}
function showCategoryinSelectbox($conn){
    $cursor = $conn->find();
    $count = 0;
    echo '<select name="category" class="form-control">';
    foreach ($cursor as $document) {
        
        //echo '<option value="'.$document['_id'].'">'.$document['catname'].'</option>';
        echo '<option value="'.$document['catname'].'">'.$document['catname'].'</option>';
    }
    echo '</select>';
}
function showAllPost($conn){
    $cursor = $conn->find();
    $count = 0;
    foreach ($cursor as $document) {
        $count = $count + 1;
        echo "<tr>";
        echo "<td>".$count."</td>";
        echo "<td>".$document['title']."</td>";
        echo "<td>".$document['author']."</td>";
        echo "<td>".date('d/M/Y', $document['created_date']->sec)."</td>";
        echo "<td>".$document['category']."</td>";
        echo "<td>".$document['place']."</td>";
        echo "<td>10</td>";
        echo "<td>10</td>";
        echo '<td class="text-centered"><i class="fa fa-pencil-square-o"></i></td>';
        echo '<td class="text-centered"><i class="fa fa-times"></i></td></td>';
        echo "</tr>";
    }
}
?>
