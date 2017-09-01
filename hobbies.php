<?php 
	include('head.php');
	$userHobbiesArr = $db->getRecord($trace = 0,array('hobbies','interests','music','user_reads','movies','sports','languages'),'tbl_user_hobby',array('profile_code'=>$_SESSION['userDetail']['profile_code']));
?> 
<!--  end navbar -->
<section>
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
		  <div class="col-sm-3 panel-body">
				<?php include_once('manage_profile_left.php');?>
			</div>

		  <div class="col-xs-12 col-sm-9 profile-list profile_listing">
		   <?php  
				include_once('user-session-msg.php');
			?> 
			<form class="form-horizontal" name="hobbies" id="hobbies" method="POST" action="user-controller.php">
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Hobbies</h4>
				</div>
				<div class="panel-body">
				  <div class="form-group">
					
					 <?php 
					 if(!empty($userHobbiesArr[0]))
					 {
					 if(array_key_exists('hobbies',$userHobbiesArr[0]))
						 $hobby = explode(', ', $userHobbiesArr[0]['hobbies']);
					 }
					 ?>
					 <div class="panel-body">
						<div class="form-group">
						
						 <?php $count = count($ARR_HOBBIES);
							if($count > 0)
							{
								foreach($ARR_HOBBIES as $key => $value)
								{ ?>
								 <div class="col-sm-4">
									<div class="checkbox">
									  <label><input type="checkbox" value="<?=$key?>" name="hobbies[]" <?=(!empty($hobby)?(in_array($key,@$hobby)?'checked':''):'')?>><?= $value ?></label>
									</div>
								</div>							
							<?php } } ?>
						</div>
					</div>
					</div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Interests</h4>
				</div>
				<?php 
				if(!empty($userHobbiesArr[0]))
				{
				if(array_key_exists('interests',$userHobbiesArr[0]))
						 $intrest = explode(', ', $userHobbiesArr[0]['interests']);
				}
				?>
				<div class="panel-body">
					<div class="form-group">
					
					 <?php $count = count($ARR_INTERESTS);
						if($count > 0)
						{
							foreach($ARR_INTERESTS as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="interests[]" <?=(!empty($hobby)?(in_array($key,$intrest)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
						<?php } } ?>
					</div>
				</div>
			  </div>
			  
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Favourite Music</h4>
				</div>
				<?php 
				if(!empty($userHobbiesArr[0]))
				{
				if(array_key_exists('music',$userHobbiesArr[0]))
						 $MusicArr = explode(', ', $userHobbiesArr[0]['music']);
				}
				?>
				<div class="panel-body">
					<div class="form-group">
					  <?php $count = count($ARR_MUSIC);
						if($count > 0)
						{
							foreach($ARR_MUSIC as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="music[]" <?=(!empty($hobby)?(in_array($key,$MusicArr)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
						<?php } } ?>
					</div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Favourite Reads</h4>
				</div>
				<?php 
				if(!empty($userHobbiesArr[0]))
				{
				if(array_key_exists('user_reads',$userHobbiesArr[0]))
						 $Reading = explode(', ', $userHobbiesArr[0]['user_reads']);
				}
				?>
				<div class="panel-body">
				  <div class="form-group">
					<?php $count = count($ARR_READS);
						if($count > 0)
						{
							foreach($ARR_READS as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="user_reads[]" <?=(!empty($hobby)?(in_array($key,$Reading)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
						<?php } } ?>
				  </div>
				</div>
			  </div>
			  
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Preferred Movies</h4>
				</div>
				<?php 
				if(!empty($userHobbiesArr[0]))
				{
				if(array_key_exists('movies',$userHobbiesArr[0]))
						 $MoviesArr = explode(', ', $userHobbiesArr[0]['movies']);
				}
				?>
				<div class="panel-body">
				  <div class="form-group">
					 <?php $count = count($ARR_MOVIES);
						if($count > 0)
						{
							foreach($ARR_MOVIES as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="movies[]" <?=(!empty($hobby)?(in_array($key,$MoviesArr)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
					<?php } } ?>
				  </div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Sports </h4>
				</div>
				<?php if(!empty($userHobbiesArr[0]))
				{
					if(array_key_exists('sports',$userHobbiesArr[0]))
						 $SportsArr = explode(', ', $userHobbiesArr[0]['sports']);
				}
				?>
				<div class="panel-body">
				  <div class="form-group">
					 <?php $count = count($ARR_SPORTS);
						if($count > 0)
						{
							foreach($ARR_SPORTS as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="sports[]" <?=(!empty($hobby)?(in_array($key,$SportsArr)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
					<?php } } ?>
				  </div>
				</div>
			  </div>
			  
			  <div class="panel panel-danger">
				<div class="panel-heading">
				<h4 class="panel-title">Spoken Languages </h4>
				</div>
				<?php 
				if(!empty($userHobbiesArr[0]))
				{
				if(array_key_exists('languages',$userHobbiesArr[0]))
						 $LanguageArr = explode(', ', $userHobbiesArr[0]['languages']);
				}
				?>
				<div class="panel-body">
				  <div class="form-group">
					  <?php $count = count($ARR_LANGUAGES);
						if($count > 0)
						{
							foreach($ARR_LANGUAGES as $key => $value)
							{ ?>
							 <div class="col-sm-4">
								<div class="checkbox">
								  <label><input type="checkbox" value="<?=$key?>" name="languages[]" <?=(!empty($hobby)?(in_array($key,$LanguageArr)?'checked':''):'')?>><?= $value ?></label>
								</div>
							</div>							
					<?php } } ?>
				  </div>
				  <hr>
				  <div class="form-group">
					<div class="col-sm-10">
					  <button type="submit" class="btn btn-danger">Save Changes</button>
					  <input type="hidden" name="postAction" value="editUserHobbies">
					  <a href="<?=USER_PATH?>self-profile.php"><input type="button"  name="BACK" value="BACK" class="btn btn-default"></button></a>
					</div>
				  </div>
				</div>
			  </div>
			  
			  
			</form>

		  </div>
		</div>
	</div>
</section>


<?php 
	include('footer.php');
?> 
