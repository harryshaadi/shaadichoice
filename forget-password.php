<?php 
	include('header.php');
?> 
<!--  end navbar -->
<section>
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
		<?php
		// HERE SHOW ERROR MSG
		 include_once('user-session-msg.php');
		?>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<form method="POST" action="user-controller.php" class="form-horizontal" name="forgetPassword" >
				  <h3 class="text-center" style="padding-top: 30px;">Retrieve Password</h3>
				  <div class="panel panel-danger">
					<div class="panel-heading">
					<h4 class="panel-title">Retrieve your password via Email</h4>
					</div><br>
					<div class="panel-body">
						 <div class="form-group">
							<label class="col-sm-3 control-label">Email :</label>
							<div class="col-sm-5">
							  <input type="email" name="forgetEmail" id="forgetEmail" class="form-control" value="" placeholder="Registered Email id" required>
							</div>
						</div>
						<div class="form-group">
						<div class="col-sm-3"></div>
							<div class="col-sm-9">
							  <button type="submit" class="btn btn-danger">Send Password</button>
							  <input type="hidden" name="postAction" id="postAction" value="userForgetPassword"/>
							</div>
						</div><br><br>
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
