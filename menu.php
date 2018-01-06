<?php 
$collection = $db->category;
$cursor = $collection->find();

$collection1 = $db->place;
$cursor1 = $collection1->find();
?>
<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-collapse">
						<ul class="nav navbar-nav">
							
							<li><a href="index.php">Trang chủ</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Địa danh <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<!--<li><a href="#">Di tích lịch sử</a></li>
									<li><a href="#">Vui chơi gỉai trí</a></li> -->
									<?php
									foreach ($cursor as $document) {
										echo '<li><a href="#">'.$document["catname"].'</a></li>';
									}
									?>

								</ul>

							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Địa điểm <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<!--<li><a href="#">Di tích lịch sử</a></li>
									<li><a href="#">Vui chơi gỉai trí</a></li> -->
									<?php
									foreach ($cursor1 as $document1) {
										echo '<li><a href="#">'.$document1["tinhtp"].'</a></li>';
									}
									?>

								</ul>

							</li>
							<li><a href="#">Liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>