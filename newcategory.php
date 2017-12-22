<?php include 'header.php'; ?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Thêm bài viết mới</h3>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Ten chuyen muc" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="descript" id="subject" placeholder="Dien giai" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							

							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">Thêm Chuyen muc</button></div>
						</form>

						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		