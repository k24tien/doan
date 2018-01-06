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
								<th>Bình luận</th>
								<th>Họ tên</th>
								<th>Email</th>
								<th>Ngày tạo</th>
								<th>Bài viết</th>
								<th>Trạng thái</th>
								<th>Duyệt</th>
								<th>Xóa</th>
							  </tr>
							</thead>
							<tbody>
                                <?php
                                $collection = $db->post;
                                $count = 0;
                                $cursor = $collection->find();
                                foreach ($cursor as $document) {
                                	if($document["comments"]!=""){
                                		$count = $count + 1;
                                		$comment = $document["comments"];
                                		echo "<tr>";
                                		
                            			echo '<td>'.$count.'</td>';
                            			echo '<td>'.$comment['comment_content'].'</td>';
                            			echo '<td>'.$comment['comment_name'].'</td>';
                            			echo '<td>'.$comment['comment_email'].'</td>';
                            			echo '<td>'.date('d/m/Y', $comment['comment_date']->sec).'</td>';
                            			echo '<td>'.$document['title'].'</td>';
                            			if($comment['status']==0){
                            				echo '<td>Chờ duyệt</td>';
                            			}
                            			if($comment['status']==1){
                            				echo '<td>Đã duyệt</td>';
                            			}
                            			
                            			echo '<td class="text-centered"><a href="duyetcomment.php?id='.$document['_id'].'&comment='.$comment['comment_name'].'" ><i class="fa fa-pencil-square-o"></i></a></td>';
        							echo '<td class="text-centered"><a href="deletecomment.php?id='.$document['_id'].'&comment='.$comment['comment_name'].'" ><i class="fa fa-times"></i></a></td></td>';	
                                		
                                		echo "</tr>";
                                	
                                }
                            }
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