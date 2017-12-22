<?php 
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$messages = array(
  1=>'Record deleted successfully',
  2=>'Error occurred. Please try again', 
  3=>'Record saved successfully',
  4=>'Record updated successfully', 
  5=>'All fields are required' );

  $flag    = isset($_GET['flag'])?intval($_GET['flag']):0;

$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery('onlinestore.products', $query);
?>
<table class='table table-bordered'>
   <thead>

      <tr>
            <th>#</th>

            <th>Prodcut</th>

            <th>Price</th>

             <th>Category</th>
    
            <th>Action</th>

      </tr>
  
   </thead>

    <?php 

    $i =1; 

    foreach ($cursor as $document) {   ?>

      <tr>

      <td><?php echo $i; ?></td>

      <td><?php echo $document->product_name;  ?></td>

      <td><?php echo $document->price;  ?></td>        
    
     <td><?php echo $document->category;  ?></td>
      
     <td><a class='editlink' data-id=<?php echo $document->_id; ?> 
             href='javascript:void(0)'>Edit</a> |
        <a onClick ='return confirm("Do you want to remove this
                     record?");' 
        href='record_delete.php?id=<?php echo $document->_id;  ?>'>Delete</td>

      </tr>

     <?php $i++;  

  } 

  ?>

</table>
