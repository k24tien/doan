<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php //include 'breadcrumb.php'; ?>
		<section id="content">
			<div class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<form role="form" class="register-form" method="post" action="register.php">
							<h2>Add new user</h2>

							
							<div class="form-group">
								<input type="text" name="fullname" id="display_name" class="form-control input-lg" placeholder="Full Name" tabindex="3">
							</div>
							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="4">
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-md-6"><input type="submit" value="Add user" name="submit" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
							</div>
						</form>
                        <br />
                        <?php if(isset($_POST["submit"])){
                                $fullname = $_POST["fullname"];
                                $username = $_POST["username"];
                                $pwd = $_POST["password"];
                                $repwd = $_POST["password_confirmation"];
                                $collection = $db->user;
                                addUser($collection,$username,$pwd,$fullname);
                                } 
                        ?>
					</div>
                    
                                
                            
				</div>
				
			</div>
		</section>


<?php include 'footer.php'; ?>