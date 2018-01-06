<?php include 'header.php'; ?>
<?php include 'functions.php'?>
<?php include 'breadcrumb.php'; ?>	
		<section id="content">
			<div class="container">
				<div class="row">
<?php include 'left-sidebar.php';?>	
<?php 

$id = $_GET["id"];
$collection = $db->post;
$fQuery = array('_id' => new MongoId($id));      
$queryDbFind = $collection->findOne($fQuery);

?>				

					<div class="col-lg-9">
						<h3>Cập nhật bài viết </h3>
						<form action="" method="post" role="form" class="contactForm" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="title" class="form-control" id="name" placeholder="Tiêu đề" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $queryDbFind["title"];?>"/>
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<textarea class="summernote" name="content" value="<?php echo $queryDbFind["content"]; ?>"></textarea>
                                
								<script>
                                    var content = <?php echo $queryDbFind["content"]; ?>
                                    window.alert(content);
                                    $('.summernote').summernote('code');
                                </script>
								<div class="validation"></div> 
								<!-- <div id="rich-text"></div> -->
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="des" id="subject" placeholder="Tóm tắt" data-rule="minlen:4" value="<?php echo $queryDbFind["des"];?>" />
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
                                <label class="control-label">Địa điểm</label>
                                <select name="tinhtp" class="form-control">
                                    <?php
                                    $coll1 = $db->place;
                                    $cursor1 = $coll1->find();
                                    foreach ($cursor1 as $document1) {
                                        echo '<option value="'.$document1['tinhtp'].'">'.$document1['tinhtp'].'</option>';

                                    }
                                    
                                    ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label class="control-label">Hình đại diện</label>
                                <!--<input id="input-b5" name="post_image" type="file">-->
                                <input id="input-2" name="post_image" type="file">
                            </div>
                            <div class="form-group">
                                <input type="text" name="tags" class="form-control" id="tagsinput" placeholder="Từ khóa" data-role="tagsinput" value="<?php echo implode(",",$queryDbFind["tags"]);?>" />
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
                            $tinhtp = $_POST["tinhtp"];
                            $tag = $_POST["tags"];
                            $t = explode(",", tag);
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
                            $document = array( "title" => $title, "content" => $content, "des" => $des, "category" => $catname, "created_date" => new MongoDate(), "author" => "Administrator", "place" => $tinhtp,"tags"=>$t,"view"=>"1","like"=>"0", "post_image" => new MongoBinData(file_get_contents($filename)));
                            
                            $collection->insert($document);
                            echo ' <div class="alert alert-success">';
                            echo 'Cập nhật bài viết mới thành công!';
                        }
                        
                        ?>
					</div>


				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>		