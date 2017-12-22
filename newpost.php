<?php include 'header.php'; ?>
<?php ?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Thêm bài viết mới</h3>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="title" class="form-control" id="name" placeholder="Tiêu đề" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<textarea class="summernote" name="content"></textarea>
                                
								<script>
                                    var content = $('.summernote').summernote('code');
                                </script>
								<div class="validation"></div> 
								<!-- <div id="rich-text"></div> -->
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="des" id="subject" placeholder="Tóm tắt" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
                                <label class="control-label">Hinh dai dien</label>
                                <input id="input-b5" name="post_image" type="file">
                            </div>
							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Thêm bài viết</button></div>
						</form>

						<div class="clear"></div>
                        <?php 
                        if(isset($_POST["submit"])){
                            $title = $_POST["title"];
                            $content = $_POST["content"];
                            $des = $_POST["des"];
                            $collection = $db->post;
                            $document = array( "title" => $title, "content" => $content, "des" => $des);
                            $collection->insert($document);
                            echo ' <div class="alert alert-success">';
                            echo '<strong>Success!</strong> Create new post successfully!';
                        }
                        
                        ?>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		