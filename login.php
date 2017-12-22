<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php //include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<form role="form" class="login-form" method="post" action="login.php">
							<h2 class="text-center">Đăng nhập</h2>

							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="4">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password">
							</div>
							<!--<div class="form-group">
							code captcha: https://freetuts.net/viet-thu-vien-captcha-va-kiem-tra-ma-captcha-bang-ajax-137.html -->	
							<!--		<input type="text" id="captcha" class="form-control input-lg" value="" placeholder="Mã bảo vệ"/> 
							</div>-->
							<!--<div class="form-group">
									<img src="image.php" id="img-captcha"/>
									<input type="button" value="Reload" onclick="$('#img-captcha').attr('src', 'image.php?rand=' + Math.random())" />
									
							</div> -->
							<div class="row">
								<div class="col-xs-12 col-md-6 col-md-offset-3"><input type="submit" name="submit" value="Sign in" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
								
							</div>
						</form>
                        
                        <?php if(isset($_POST["submit"])){
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $collection = $db->user;
                            checkLogin($collection,$username,$password);
                        }
                        
                        
                        ?>
					</div>
				</div>

			</div>
		</section>
<?php include 'footer.php'; ?>
