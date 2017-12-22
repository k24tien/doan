<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<div class="table-responsive">          
						  <table class="table table-bordered table-hover">
							<thead>
							  <tr>
								<th>#</th>
								<th>Tên bài viết</th>
								<th>Tác giả</th>
								<th>Ngày tạo</th>
								<th>Chuyên mục</th>
								<th>Địa điểm</th>
								<th>Lượt xem</th>
								<th>Bình luận</th>
								<th>Tùy chọn</th>
								<th>Tùy chọn</th>
							  </tr>
							</thead>
							<tbody>
                                <?php
                                $collection = $db->post;
                                showAllPost($collection);
                                ?>
							</tbody>
						  </table>
						</div>
						<div class="col-lg-6 col-md-offset-3">
								<ul class="pagination">
									<li><a href="#">&laquo;</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
						</div>
						<div class="clear"></div>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		