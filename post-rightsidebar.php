<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php
$id = $_GET['id'];  
$collection = $db->post;
$fQuery = array('_id' => new MongoId($id));
    
$queryDbFind = $collection->findOne($fQuery);

?>
<?php include 'breadcrumb.php'; ?>		
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<article>
							<div class="post-image">
								<div class="post-heading">
									<h3><a href="#"><?php echo $queryDbFind["title"]; ?></a></h3>
								</div>
                                <?php 
                                $img = $queryDbFind["post_image"];
                                loadImage($img,"");
                                //$img = $queryDbFind["post_image"];
                                //echo $img;
                                //$imagebody = $queryDbFind["post_image"]->bin;
                                //$base64   = base64_encode($imagebody);
                                //header('Content-Type: image/jpeg');
                                // Output the image
                                //imagejpeg($img);
                                ?>
                                <!--<img src="data:png;base64,<?php //echo $base64 ?>" class="img-responsive"/>-->
								<!--<img src="img/dummies/blog/img1.jpg" alt="" class="img-responsive" />-->
							</div>
							<?php echo $queryDbFind["content"]; ?>
							<div class="bottom-article">
								<ul class="meta-post">
									<li><i class="fa fa-calendar"></i><a href="#"> <?php echo date('d/m/Y', $queryDbFind['created_date']->sec);?></a></li>
									<li><i class="fa fa-user"></i><a href="#"> <?php echo $queryDbFind['author']; ?></a></li>
									<li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
									<!--<li><i class="fa fa-tags"></i><a href="#">Design</a>, <a href="#">Blog</a></li> -->
								</ul>
							</div>
						</article>
<?php //include 'comment.php';?>						

						<div class="clear"></div>
					</div>
<?php include 'right-sidebar.php';?>					
				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>