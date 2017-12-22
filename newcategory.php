<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Add new category</h3>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Category Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="descript" id="subject" placeholder="Description" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							

							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Add new</button></div>
						</form>
                        <?php 
                        if(isset($_POST["submit"])){
                            $catname = $_POST["name"];
                            $des = $_POST["descript"];
                            $collection = $db->category;
                            $fQuery = array('catname' => $catname);
                            $queryDbFind = $collection->findOne($fQuery);
                            if(empty($queryDbFind)){
                                $document = array( "catname" => $catname, "des" => $des);
                                $collection->insert($document);
                                echo ' <div class="alert alert-success">';
                                echo '<strong>Success!</strong> Create new category <strong>'.$catname.'</strong> successfully!';
                            }
                            else{
                                echo ' <div class="alert alert-danger">';
                                echo '<strong>Failed!</strong> Category <strong>'.$catname.'</strong> existed!';
                            }
                        }
                        
                        ?>    
						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		