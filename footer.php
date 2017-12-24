<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-lg-4">
						<div class="widget">
							<h4>Nhom thuc hien</h4>
                                Tran Van Tien<br />
                                Nguyen Tan Phu<br />
                                Nguyen Hoang Minh<br />
                                Nguyen Thanh Tai<br />
                                Tran Van Ut Chinh<br />
                                Le Van Tay<br />
						</div>
					</div>
					<div class="col-sm-4 col-lg-4">
						<div class="widget">
							<h4>Truy cap nhanh</h4>
							<ul class="link-list">
								<li><a href="#">Tim kiem nang cao</a></li>
								<li><a href="#">Dia diem du lich</a></li>
								<li><a href="#">Lien he chung toi</a></li>
							</ul>
						</div>

					</div>
					<div class="col-sm-4 col-lg-4">
						<div class="widget">
							<h4>Quan ly</h4>
							<ul class="link-list">
                                <?php 
                                  if(isset($_SESSION['name']))
                                  { 
                                      ?>
                                        <li><a href="logout.php"><i><?php echo $_SESSION['name'];?></i>&nbsp;&nbsp;|&nbsp;&nbsp;Đăng xuất</a></li>
                                <?php
                                  }
                                else{
                                    ?>
                                <li><a href="login.php">Đăng nhập</a></li>
								<?php } ?><?php 
                                  if(isset($_SESSION['name']))
                                  { 
                                      ?>
                                        <li><a href="logout.php"><i><?php echo $_SESSION['name'];?></i>&nbsp;&nbsp;|&nbsp;&nbsp;Đăng xuất</a></li>
                                <?php
                                  }
                                else{
                                    ?>
                                <li><a href="login.php">Đăng nhập</a></li>
								<?php } ?>
								<!--<li><a href="login.php">Dang nhap</a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<p class="text-left"><strong>Mon Phat trien phan mem nguon mo - 2017</strong></p>
						</div>
						<div class="col-lg-6">
							<p class="text-right"><strong>Giang vien huong dan: Do Thanh Nghi</strong></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
	<script src="plugins/flexslider/flexslider.config.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script src="js/jquery.cubeportfolio.min.js"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/summernote.js"></script>
    <script src="js/fileinput.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>