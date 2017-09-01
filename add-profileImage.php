<?php
include('head.php');
include('currency_api.php');
$profileCode = $_SESSION['userDetail']['profile_code'];
?>

<section style="padding-top:0px;">
	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content">
			
			  	 <div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<h4>Please Upload Your Profile Image</h4>
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; ">
							<div class="photo">
							
								<?php
									
								if(isset($_SESSION['image_exist']) && ($_SESSION['image_exist'] == 'Y')) { echo '<script>alert("First delete uploaded image.");</script>'; 
									unset($_SESSION['image_exist']);
								} ?>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_default_1">
										<div class="row panel-body  interest-column">
											<div class="col-sm-12 text-center">
												<?php if(isset($_SESSION['mymessageSession'])){ echo '<div style="color:#900;">'.$_SESSION['mymessageSession'].'</div>'; } ?>
												<p>Get the most responses by uploading up to your 10 photos on your profile. <a href="" style="color:#900;">Read our Photo Guidelines</a></p>
												<p>All photos are screened as per photo guidelines and gets activated within 24 to 48 hours.</p>
												<br>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<?php //if($_SESSION['img_success']=='success'){ echo '<script>alert("Image uploaded successfully.");</script>'; } else { ?>
												<div class="photo-panel">
													<h2><i class="fa fa-cloud-upload" aria-hidden="true"></i></h2>
													<h3>Upload Photo</h3>
													<form action="user-controller.php" method='POST' enctype="multipart/form-data" style="margin-bottom: 0em;">
														<span id="fileselector">
															<label class="btn btn-default" for="upload-file-selector">
																<input type="file" id="upload-file-selector" name="image"/>
																<i class="fa fa-upload" aria-hidden="true"></i> Select Photo
															</label>
														</span>
														<span><button class="btn btn-default" type="submit" name="uploadProfilePic">Upload</button></span>
														<input type="hidden" name="postAction" id="postAction" value="addProfilePic">
														<input type="hidden" name="postEventCode" id="postEventCode" value="<?=$_SESSION['userDetail']['profile_code']?>">
														<input type="hidden" name="postEventRedirect" id="postEventRedirect" value="add-profileImage.php">
														<!--<p>Max upload only 3 images.</p> -->
														<p><small>Upload more photos by going into profile settings</small></p>
													</form>
												</div>
												<?php //} ?>
												<div class="row">
													
														<?php 
														$whr = "profile_code = '".$profileCode."' AND default_image='Y'";
														$profileImageArr = $db->getRecord(0, array('image', 'image_code', 'approved'), 'tbl_profile_images', $whr);
														$count = count($profileImageArr);
														$imagePath ='';
														$imgDiv ='';
														?>
														
														<?php 
															if($count>0){
															?>
														<div class="col-sm-12 panel-body text-center">
															<h4>Uploaded Profile Photo</h4>
														</div>
														<?php		
																for($i = 0; $i < $count; $i++){ 
																$imagePath = USER_PATH.'uploads/profile_pic/'.$profileImageArr[$i]['image'];
														?>
																
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=$imagePath?>" class="img-thumbnail" style="height:200px; width:200px;">
																	<div class="dropdown pull-right">
																	  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop1"><i class="fa fa-cog" aria-hidden="true"></i></button>
																	  <ul class="dropdown-menu  drop_down" id="drop">
																		 <li><form method="POST" action="<?=USER_PATH?>user-controller.php">
																			<button type="submit" onClick='return confirm("Are you sure to delete this image?");' style="border:none; background:transparent;">Delete</button>
																			<input type="hidden" name="postAction" value="dropProfilePic">
																			<input type="hidden" name="postActionCode" value="<?=$profileImageArr[$i]['image_code']?>">
																			<input type="hidden" name="postActionRedirect" value="add-profileImage.php">
																		  </form></li>
																	  </ul>
																	</div>
																</div>
														<?php
																}
															}
															else
															{
															 ?>
															 
																<?php if($_SESSION['userDetail']['gender']=='M'){ ?>
																<div class="col-sm-12 panel-body text-center">
																	<h4>Sample Photo</h4>
																</div>
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=USER_PATH?>img/default-profile.jpg" class="img-thumbnail">
																</div>
																<?php }else{ ?>
																<div class="col-sm-12 panel-body text-center">
																	<h4>Sample Photo</h4>
																</div>
																<div class="col-sm-4 upload_photo col-sm-offset-4">
																	<img src="<?=USER_PATH?>img/default-profile_lady.jpg" class="img-thumbnail">
																	<div class="dropdown pull-right">
																	  
																	  <ul class="dropdown-menu  drop_down" id="drop">											
																		<li><a href="javascript:void(0)" onClick='return archive("32");'>Move To Private</a></li>
																		<li><a href="javascript:void(0)" onClick='return msgread("32");'>Delete</a></li>
																	  </ul>
																	</div>
																</div>
																<?php } ?> 
														<?php } ?>
													
													
													<div class="col-sm-12 text-left ">
													<br>
														<span class="notice"><b>Note:</b> Each photo must not be less than 440px x 440px and you should be in the photo. The uploaded, images can take up to 48 hours to be reviewed and fully visible on your profile.</span>

													</div>
												</div>
											</div>
											
											
											<div class="col-sm-12 text-center ">
											<br>
												<span class="notice"><b>Note:</b> Your face MUST be clearly visible in your MAIN IMAGE. All images MUST contain you.</span>
												<br>
												<span class="notice"><b>Note:</b> Any Images that doesn’t feature yourself will be removed..</span>
												<br>
											</div>
											<a href="<?=USER_PATH?>dashboard.php" class="pull-right btn btn-danger">Back</a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
			  
			 
			
			  
			</div>
		</div>
	</div>
</div>
<?php include_once('footer.php'); ?>