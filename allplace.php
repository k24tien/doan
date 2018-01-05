<?php include_once 'header.php'; ?>
<?php include_once 'functions.php'; ?>
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
								<th>Tỉnh / TP</th>
								<th>Quận huyện</th>
								<!--<th>Tùy chọn</th>
								<th>Tùy chọn</th> -->
							  </tr>
							</thead>
							<tbody>
                            <?php 
                                $collection = $db->place;
                                $cursor = $collection->find();
                                foreach ($cursor as $document) {
                                    echo "<tr>";
                                    foreach($document as $key => $val) {
                                        if($key != "_id"){
                                        echo "<td>".$val."</td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                                
                           
                                
                                
                                ?>
							  <!--<tr>
								<td>#</td>
								<td>Du lich</td>
								<td>Tong hop cac bai viet ve du lich</td>
								<td>10</td>
								<td class="text-centered"><i class="fa fa-pencil-square-o"></i></td>
								<td class="text-centered"><i class="fa fa-times"></i></td>
								
							  </tr>-->
							  
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