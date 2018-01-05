<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Thêm địa điểm mới</h3>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="tinhtp" class="form-control" id="name" placeholder="Tỉnh / Thành phố" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" name="quanhuyen" class="form-control" id="tagsinput" placeholder="Quận huyện" data-rule="minlen:4" data-role="tagsinput" />
								
								<div class="validation"></div>
							</div>
							

							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Thêm mới</button></div>
						</form>
                        <?php 
                        if(isset($_POST["submit"])){
                            $tinhtp = $_POST["tinhtp"];
                            $quanhuyen = $_POST["quanhuyen"];
                            //$des = $_POST["descript"];
                            $collection = $db->place;
                            $fQuery = array('tinhtp' => $tinhtp);
                            $queryDbFind = $collection->findOne($fQuery);
                            if(empty($queryDbFind)){
                                $document = array( "tinhtp" => $tinhtp,"quanhuyen" => $quanhuyen);
                                $collection->insert($document);
                                echo ' <div class="alert alert-success">';
                                echo 'Thêm địa điểm mới thành công!';
                            }
                            else{
                                echo ' <div class="alert alert-danger">';
                                echo 'Có lỗi xảy ra. Địa điểm đã tồn tại!';
                            }
                        }
                        
                        ?>    
						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>