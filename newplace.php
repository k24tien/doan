<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Add new place</h3>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="tinhtp" class="form-control" id="name" placeholder="Tinh/ Thanh pho" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="descript" placeholder="Quan huyen" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							

							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Add new</button></div>
						</form>
                        <?php 
                        if(isset($_POST["submit"])){
                            $tinhtp = $_POST["tinhtp"];
                            //$des = $_POST["descript"];
                            $collection = $db->place;
                            $fQuery = array('tinhtp' => $tinhtp);
                            $queryDbFind = $collection->findOne($fQuery);
                            if(empty($queryDbFind)){
                                $document = array( "tinhtp" => $tinhtp);
                                $collection->insert($document);
                                echo ' <div class="alert alert-success">';
                                echo '<strong>Success!</strong> Create new place <strong>'.$tinhtp.'</strong> successfully!';
                            }
                            else{
                                echo ' <div class="alert alert-danger">';
                                echo '<strong>Failed!</strong> Place <strong>'.$tinhtp.'</strong> existed!';
                            }
                        }
                        
                        ?>    
						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>