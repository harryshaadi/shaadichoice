 <div class="well text-center">
					<p>
						Free Registration
						<br>
						<form style="margin-top:10px;">
							<a href="<?=USER_PATH?>register.php"><input type="button" value="Register Now" class="btn btn-danger"/></a>
						</form>
					</p>
				</div>

				<!-- Latest Posts -->
				<div class="panel panel-default">
					<div class="panel-heading panel-head">
						<h4>Latest Posts</h4>
					</div>
					<ul class="list-group lis">
					<?php
					$blogInfoArrAside = $db->getRecord(0, array('*'), 'tbl_blog', '', '', '', 'blog_title', 'ASC');
			
					$numOfRowsAside = count($blogInfoArrAside);
					for($j = 0; $j <= $numOfRowsAside; $j++)
					{ 
					?>
						<li class="list-group-item">
							<a href="blog-detail.php?code=<?=$blogInfoArrAside[$j]['blog_slug']?>"><?php echo ucwords($blogInfoArrAside[$j]['blog_title']);?></a>
						</li>
					<?
					
					}
					?>	
					</ul>
				</div>
				
