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
        echo "<tr id=".$document['_id'].">";
        echo "<td>".$count."</td>";
        echo "<td>".$document['title']."</td>";
        echo "<td>".$document['author']."</td>";
        echo "<td>".date('d/m/Y', $document['created_date']->sec)."</td>";
        echo "<td>".$document['category']."</td>";
        echo "<td>".$document['place']."</td>";
        echo "<td>10</td>";
        echo "<td>10</td>";
        echo '<td class="text-centered"><a href="deletepost.php?id='.$document['_id'].'" ><i class="fa fa-pencil-square-o"></i></a></td>';
        echo '<td class="text-centered"><a href="deletepost.php?id='.$document['_id'].'" ><i class="fa fa-times"></i></a></td></td>';
        echo "</tr>";
    }
}
function loadImage($img,$class){
    $imagebody = $img->bin;
    $base64   = base64_encode($imagebody);
    echo '<img src="data:png;base64,'.$base64.'" class="img-responsive '.$class.'" />';
}
function loadImageThumbnail($img){
    $imagebody = $img->bin;
    $base64   = base64_encode($imagebody);
    echo '<img src="data:png;base64,'.$base64.'" class="img-responsive pull-left" width="65px" height="65px" />';
}
?>
