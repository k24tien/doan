<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
				

					<div class="col-lg-9">
						<h3>Thêm bài viết mới</h3>
						<form action="" method="post" role="form" class="contactForm" enctype="multipart/form-data">
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
                                
                                <label class="control-label">Chuyên mục</label>
                                    
                                     <?php 
                                        $coll = $db->category;
                                        showCategoryinSelectbox($coll);

                                        ?>  
                            </div>
							<div class="form-group">
                                <label class="control-label">Hình đại diện</label>
                                <!--<input id="input-b5" name="post_image" type="file">-->
                                <input id="input-2" name="post_image" type="file">
                            </div>
							<div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md" name="submit">Thêm bài viết</button></div>
						</form>

						<div class="clear"></div>
                        <br />
                        <?php 
                        if(isset($_POST["submit"])){
                            $title = $_POST["title"];
                            $content = $_POST["content"];
                            $des = $_POST["des"];
                            $catname = $_POST["category"];
                            //$target_dir = "uploads/";
                            //$target_file = $target_dir . basename($_FILES["post_image"]["name"]);
                            //echo $_FILES["post_image"]["name"];
                            //echo $_FILES['post_image']['error'];
                            //$target_dir = "uploads/";
                            //$target_file = $target_dir . basename($_FILES["post_image"]["name"]);
                            
                            
                            //$fileName = $_FILES['post_image']['name'];
                            //$fileType = $_FILES['post_image']['type'];
                            //$fileContent = file_get_contents($_FILES['post_image']['name']);
                            
                            //echo $fileType."--- ten file";
                            //$image = new MongoBinData($fileContent, MongoBinData::GENERIC);
                            //echo $fileName;
                            $filename = $_FILES["post_image"]["tmp_name"];
                            $collection = $db->post;
                            $document = array( "title" => $title, "content" => $content, "des" => $des, "category" => $catname, "created_date" => new MongoDate(), "author" => "Administrator", "place" => "Can Tho", "post_image" => new MongoBinData(file_get_contents($filename)));
                            
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