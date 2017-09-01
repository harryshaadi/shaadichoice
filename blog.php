<?php 
	if(!isset($_SESSION['userDetail']))
	include('header-data.php');	
else
	include('head.php');

?> 

<!--  end navbar -->
<section style="padding: 0px;">
	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<h3 class="blog-heading">Latest Post</h3>
			</div>
			<div class="col-sm-8 panel-body">
				
				<?php
				$st =0;
				$perPage = 5;
				$totalNoOfRecords = $db->getRecordCount(0, 'tbl_blog', '', 'blog_id_pk');
				$blogInfoArr = $db->getRecord(0, array('*'), 'tbl_blog', '', $st, $perPage, 'blog_title', 'ASC');
			
				$numOfRows = count($blogInfoArr);

				if($numOfRows > 0)
				{
					for($i = 0; $i < $numOfRows; $i++)
					{ 
						$title = ''; 
						$statusFlag = strtoupper($blogInfoArr[$i]['status']);
						
				if($blogInfoArr[$i]['blog_pic']=='')
					$blogimg = HTTP_PATH.'/img/no-image.jpg';
				else $blogimg = HTTP_PATH.'/uploads/blog_img/'.$blogInfoArr[$i]['blog_pic'];
				$comments = $db->getRecordCount(0, 'tbl_comment', array('blog_id_fk'=>$blogInfoArr[$i]['blog_id_pk']));
				?>
				<div class="media media1">
					<img src="<?=$blogimg;?>" class="img-responsive" alt="<?php echo  ucwords($blogInfoArr[$i]['blog_title']);?>" style="height: 405px; width: 717px;">
					<div class="media-body">
					  <a href="blog-detail.php?code=<?=$blogInfoArr[$i]['blog_slug']?>"><h3 class="media-heading"><?php echo  ucwords($blogInfoArr[$i]['blog_title']);?></h3></a>
					  <h6><i class="fa fa-calendar" aria-hidden="true"></i> <i>Posted on February 19, 2016</i> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-user-circle-o" aria-hidden="true"></i> <i>Admin</i></h6>
					  <p>
					  	<?=substr($blogInfoArr[$i]['description'],0,150);?> <a href="blog-detail.php?code=<?=$blogInfoArr[$i]['blog_slug']?>">Read More</a>
					  </p>
					  <a href="blog-detail.php?code=<?=$blogInfoArr[$i]['blog_slug']?>"><i class="fa fa-pencil" aria-hidden="true"></i> Comments (0)</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="blog-detail.php"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a>
					</div>
				</div>
				<?php 
				}
				}
				else { ?>
					<tr><td colspan="5">No Record Found.</td></tr> 
				<?php } ?>  
				  
				  
				  
				  
				  

				  <br>
				  <ul class="pagination pull-right">
					  <li class="disabled"><a href="javascript:void(0)">«</a></li>
					  <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
					  <li><a href="javascript:void(0)">2</a></li>
					  <li><a href="javascript:void(0)">3</a></li>
					  <li><a href="javascript:void(0)">4</a></li>
					  <li><a href="javascript:void(0)">5</a></li>
					  <li><a href="javascript:void(0)">»</a></li>
					</ul>

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
	include('footer-basic.php');
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