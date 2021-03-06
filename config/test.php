<?php
	$m = new MongoClient();
 
// select a database
$db = $m->test;
 
// select a collection (analogous to a relational database's table)
$collection = $db->user;
 
// add a record
$document = array( "title" => "New One", "author" => "Nguyen Sy Thanh Son" );
$collection->insert($document);
 
// add another record, with a different "shape"
$document = array( "title" => "The Second One", "online" => true );
$collection->insert($document);
 
// find everything in the collection
$cursor = $collection->find();
 
// iterate through the results
foreach ($cursor as $document) {
    echo $document["author"] . "\n";
}
 

?>