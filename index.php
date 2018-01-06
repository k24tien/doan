<?php include 'header.php'; ?>
<?php include 'functions.php'?>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 search-outer">
						<form role="form">
								<div class="form-group">
									<input type="text" class="search-input" id="s" placeholder="Tìm kiếm địa danh, địa điểm du lịch ĐBSCL..">
								</div>
						</form>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="bottom-line"><div class="custom-span">Mới cập nhật</div></h4>
					</div>
				</div>
			</div>
			
			<div class="container">
				<div class="row">
                    <?php 
                    $collection = $db->post;
                    $cursor = $collection->find()->sort(array('created_date'=>-1))->limit(3);
                    foreach ($cursor as $document) {
                    //print_r($document);
                    echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
                    echo '<a href="post-rightsidebar.php?id='.$document['_id'].'">';
                    $img = $document["post_image"];
                    loadImage($img,"thumbnail"); 
                    echo '<div class="caption">';
                    echo '<p>'.$document['title'].'</p>';
                    echo '</div></a>'; 
                    echo '</div>';    
                    }
                    ?>
				</div>
			</div>
            
            <div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="bottom-line"><div class="custom-span">Được xem nhiều</div></h4>
					</div>
				</div>
			</div>
            
			
			<div class="container">
				<div class="row">
                    <?php 
                    $collection = $db->post;
                    $cursor = $collection->find()->sort(array('created_date'=>-1))->limit(6);
                    foreach ($cursor as $document) {
                    //print_r($document);
                    echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
                    echo '<a href="post-rightsidebar.php?id='.$document['_id'].'">';
                    $img = $document["post_image"];
                    loadImage($img,"thumbnail"); 
                    echo '<div class="caption">';
                    echo '<p>'.$document['title'].'</p>';
                    echo '</div></a>'; 
                    echo '</div>';    
                    }
                    ?>
				</div>
			</div>
			<!-- divider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
			</div>
			<!-- end divider -->
		
			

			


			

		</section>

<?php include 'footer.php'; ?>
