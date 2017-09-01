<?php 
	if(!isset($_SESSION['userDetail']))
	include('header-blog.php');	
else
	include('head.php');

	$code = $_GET['code'];
	$blogDetail = $db->getRecord(0,array('*'),'tbl_blog',array('blog_slug' => $code));
	if($blogDetail[0]['blog_pic']=='')
					$blogimg = HTTP_PATH.'/img/no-image.jpg';
				else $blogimg = HTTP_PATH.'/uploads/blog_img/'.$blogDetail[0]['blog_pic'];
	
	?> 

<!--  end navbar -->
<section style="padding: 0px;">
	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-sm-8 panel-body">
				
				<div class="media media1">
					<img src="<?=$blogimg?>" class="img-responsive" style="height: 405px;width: 717px;">
					<div class="media-body">
					  <h3 class="media-heading"><?=$blogDetail[0]['blog_title']?></h3>
					  <h6><i class="fa fa-calendar" aria-hidden="true"></i> <i>Posted on <?=$blogDetail[0]['created_on']?></i> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-user-circle-o" aria-hidden="true"></i> <i>Sam Bedi</i></h6>
					  <p>
					  	<?=$blogDetail[0]['description']?>
					  </p>
					  
					 
					</div>
				  </div>
				  
				  <div class="media1">
					<h3>2 Comments</h3>
						<hr>
					<div class="media">
						<div class="media-body">
						  <h4 class="media-heading">Reena Rai <small><i>Posted on February 19, 2016</i></small></h4>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="media">
						<div class="media-body">
						  <h4 class="media-heading">Neha Singh <small><i>Posted on February 19, 2016</i></small></h4>
						  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					
					<form role="form">
						<h3 style="margin-bottom: 15px;">Leave Reply</h3>
						<div class="form-group">
						<label>Comment</label>
						<textarea class="form-control" type="textarea" id="message" maxlength="140" rows="7" style="width:100%;"></textarea>                 
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" id="email" name="email" required>
						</div>
						
						<button type="button" id="submit" name="submit" class="btn btn-danger">Post Comment</button>
					</form>
				  </div>
				  <br>
				</div>
			
			
			
			
			<div class="col-sm-4 panel-body">
				<?php 
					include('blog_left.php');
				?> 
			</div>
		
		</div>
	</div>	
	<br>
<br>			
</section>

<?php 
	include('footer.php');
?> 

<script>
$('input#option1').click(function () {
     if ($(this).is(":checked")) {
         $('.tb1').css('color', '#504e4e')
     } else {
         $('.tb1').css('color', '#9a2729')
     }
});
$('input#option2').click(function () {
     if ($(this).is(":checked")) {
         $('.tb2').css('color', '#504e4e')
     } else {
         $('.tb2').css('color', '#9a2729')
     }
});
$('input#option3').click(function () {
     if ($(this).is(":checked")) {
         $('.tb3').css('color', '#504e4e')
     } else {
         $('.tb3').css('color', '#9a2729')
     }
});
$('input#option4').click(function () {
     if ($(this).is(":checked")) {
         $('.tb4').css('color', '#504e4e')
     } else {
         $('.tb4').css('color', '#9a2729')
     }
});
$('input#option5').click(function () {
     if ($(this).is(":checked")) {
         $('.tb5').css('color', '#504e4e')
     } else {
         $('.tb5').css('color', '#9a2729')
     }
});
</script>