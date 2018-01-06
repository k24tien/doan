<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
<?php
$id = $_GET["id"];
$collection = $db->category;
$fQuery = array('_id' => new MongoId($id));      
$queryDbFind = $collection->findOne($fQuery);				
?>
					<div class="col-lg-9">
						<h3>Cập nhật chuyên mục</h3>
						<form action="" method="post" role="form" class="deleteForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Tên chuyên mục" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $queryDbFind["catname"]; ?>"/>
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="descript" id="subject" placeholder="Diễn gỉai" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo $queryDbFind["des"]; ?>"/>
								<div class="validation"></div>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Cập nhật</button>
							</div>
							<div class="col-md-6">
								<a href="allcategory.php" class="btn btn-theme btn-block btn-md" name="reset">Quay lại</a>
							</div>
						</form>
                        <?php 
                        if(isset($_POST["submit"])){
                            $catname = $_POST["name"];
                            $des = $_POST["descript"];
                            $collection = $db->category;
                            
                            $document = array( "catname" => $catname, "des" => $des);
                            $collection->update($fQuery,$document);
                            echo ' <div class="alert alert-success">';
                            echo '<strong>Success!</strong> Cập nhật chuyên mục thành công!';
                            echo '</div>';
                        }
                        
                        ?>    
						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		