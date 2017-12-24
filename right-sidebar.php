<div class="col-lg-4">
	<aside class="right-sidebar">
		<div class="widget">
			<form role="form">
				<div class="form-group">
					<input type="text" class="form-control" id="s" placeholder="Search..">
				</div>
			</form>
		</div>
		<div class="widget">
			<h5 class="widgetheading">Categories</h5>
			<ul class="cat">
                <?php 
                    $collection0 = $db->category;
                    $cursor0 = $collection0->find();
                    foreach ($cursor0 as $document0) {
                        echo '<li><i class="fa fa-angle-right"></i><a href="#">'.$document0['catname'].'</a></li>';
                    }
                ?>
				<!-- <li><i class="fa fa-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
				<li><i class="fa fa-angle-right"></i><a href="#">Online business</a><span> (11)</span></li>
				<li><i class="fa fa-angle-right"></i><a href="#">Marketing strategy</a><span> (9)</span></li>
				<li><i class="fa fa-angle-right"></i><a href="#">Technology</a><span> (12)</span></li>
				<li><i class="fa fa-angle-right"></i><a href="#">About finance</a><span> (18)</span></li> -->
			</ul>
		</div>
		<div class="widget">
			<h5 class="widgetheading">Latest posts</h5>
			<ul class="recent">
                <?php 
                    $collection = $db->post;
                    $cursor = $collection->find()->sort(array('created_date'=>-1))->limit(3);
                    foreach ($cursor as $document) {
                        ?>
                <li>
                <?php 
                    $img = $document["post_image"];
                    loadImageThumbnail($img,"thumbnail"); 
                 ?>
                 <h6><a href="post-rightsidebar.php?id=<?php echo $document['_id']; ?>"><?php echo $document['title']; ?></a></h6>
                    <p>
						<?php echo $document['des'];?>
					</p>
                </li>
                <?php
                    }
                ?>
				<!--<li>
					<img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
					<h6><a href="#">Lorem ipsum dolor sit</a></h6>
					<p>
						Mazim alienum appellantur eu cu ullum officiis pro pri
					</p>
				</li>
				<li>
					<a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
					<h6><a href="#">Maiorum ponderum eum</a></h6>
					<p>
						Mazim alienum appellantur eu cu ullum officiis pro pri
					</p>
				</li>
				<li>
					<a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
					<h6><a href="#">Et mei iusto dolorum</a></h6>
					<p>
						Mazim alienum appellantur eu cu ullum officiis pro pri
					</p>
				</li> -->
			</ul>
		</div>
		<!-- <div class="widget">
			<h5 class="widgetheading">Popular tags</h5>
			<ul class="tags">
				<li><a href="#">Web design</a></li>
				<li><a href="#">Trends</a></li>
				<li><a href="#">Technology</a></li>
				<li><a href="#">Internet</a></li>
				<li><a href="#">Tutorial</a></li>
				<li><a href="#">Development</a></li>
			</ul>
		</div> -->
	</aside>
</div>