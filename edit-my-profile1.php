<?php 
	include('head.php');
?> 
<!--  end navbar -->
<section class="help-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="text-center">Hi Pankaj S, how can we help you?</h3>
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" class="form-control input-lg" placeholder="Enter a keyword. Eg: edit profile, phone number etc." />
						<span class="input-group-btn">
							<button class="btn btn-info btn-lg" type="button">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row help-list">
			<div class="col-sm-12">
				<ul>
					<li><a href="help.php">Shaadi Choice Help</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
					<li><a href="#">Profile & Photos</a></li>
				</ul>
			</div>
			<div class="col-sm-12">
				<div class="panel panel-body">
					<h5><i class="fa fa-file-o" aria-hidden="true"></i> 	I want to edit my profile</h5>
					<p>Adding details to your profile lets you control and enhance how others see you and your profile.</p>
					
					<p>However, before editing your profile, please note that few details like Religion, Community, Date of Birth, Gender, Height, Marital Status and Mother Tongue can be changed only once after your profile is registered with us.</p>

					<a href="edit-profile.php" class="btn btn-danger">Edit My Profile</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
	include('footer.php');
?> 