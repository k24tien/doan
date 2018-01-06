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
						
						<h3></h3>
						<form action="" method="post" role="form" class="deleteForm">
							
							<input type="hidden" name="cat_id" value="<?php echo $id; ?>">
							<div class="alert alert-success">
								<p>Bạn có chắc chắn muốn xóa chuyên mục <strong><?php echo $queryDbFind["catname"]; ?></strong> ?</p>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Đồng ý</button>
							</div>
							<div class="col-md-6">
								<a href="allplace.php" class="btn btn-theme btn-block btn-md" name="reset">Quay lại</a>
							</div>
						</form>
						<div class="clear"></div>
						<?php 
							if(isset($_POST["submit"])){
								$cat_id = $_POST["cat_id"];
								$col = $db->category;
								$q = array('_id' => new MongoId($cat_id));
								$query = $col->remove($q);
								if($query)
								{
									echo "Xóa chuyên mục thành công! ";
								}
								else
									echo "Có lỗi xảy ra";
								
							}

						?>
					</div>


				</div>
			</div>
		</section>

<?php include 'footer.php'; ?>		