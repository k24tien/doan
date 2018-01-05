<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				
<?php 
	$id = $_GET["id"];
	$collection = $db->post;
	$fQuery = array('_id' => new MongoId($id));
	    
	$queryDbFind = $collection->findOne($fQuery);
?>
					<div class="col-lg-9">
						
						<h3></h3>
						<form action="" method="post" role="form" class="deleteForm">
							
							<input type="hidden" name="post_id" value="<?php echo $id; ?>">
							<div class="alert alert-success">
								<p>Bạn có chắc chắn muốn xóa bài viết <strong><?php echo $queryDbFind["title"]; ?></strong> ?</p>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Đồng ý</button>
							</div>
							<div class="col-md-6">
								<button type="reset" class="btn btn-theme btn-block btn-md" name="reset">Hủy bỏ</button>
							</div>
						</form>
						<div class="clear"></div>
						<?php 
							if(isset($_POST["submit"])){
								$post_id = $_POST["post_id"];
								$col = $db->post;
								$q = array('_id' => new MongoId($post_id));
								$query = $col->remove($q);
								if($query)
								{
									echo "Xóa bài viết thành công! ";
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