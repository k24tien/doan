<div class="comment-area">
	<?php if($queryDbFind["comment"]!=""){?>
	<h4>Bình luận/h4>
	<div class="media">
		<a href="#" class="pull-left"><img src="img/avatar.png" alt="" class="img-circle" /></a>
		<div class="media-body">
			<div class="media-content">
				<h6><span>March 12, 2013</span> Michael Simpson</h6>
				<p>
					Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
				</p>

				<a href="#" class="align-right reply">Reply</a>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="marginbot30"></div>
	<h4>Bình luận</h4>
	<?php 
		if(isset($_POST["submit"])){
			$p_id = $id;
			$comment_name = $_POST["name"];
			$comment_email = $_POST["email"];
			$comment_content = $_POST["content"];
			$col = $db->post;
			$query1 = array('_id' => new MongoId($id));
			$query2 = array('$set' => array("comments" =>array("comment_name" => $comment_name, "comment_email" => $comment_email, "comment_content" => $comment_content, "comment_date" => new MongoDate(), "duyet" => "0")));
			$result = $col->update($query1,$query2);
			if($result){
				echo '<div class="clear"></div>';
				echo ' <div class="alert alert-success">';
                echo 'Gửi bình luận thành công! <strong>Xin lưu ý: </strong>Chúng tôi sẽ xét duyệt bình luận trước khi đăng! ';
                echo '</div>';
			}
		}
	?>

	<form role="form" method="post" action="">
		<div class="form-group">
			<input type="text" class="form-control" name="name" id="name" placeholder="* Họ tên">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" id="email" placeholder="* Email address">
		</div>
		<div class="form-group">
			<textarea class="form-control" rows="8" name="content" placeholder="* Nội dung"></textarea>
		</div>
		<button type="submit" name="submit" class="btn btn-theme btn-md">Gửi bình luận</button>
	</form>

</div>