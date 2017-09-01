<?php 
	include('basic-profile-header.php'); 
?>
<section style="background-image: url(img/bc.jpg); background-size: 100%;">
		<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1"> 
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs nav-tabs_basic" role="tablist">
          <li role="presentation" class="active" ><a href="#tab1" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-info" aria-hidden="true"></i> <span>Basic Info</span></a></li>
          <li role="presentation"><a href="#tab2" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  <span>Education</span></a></li>
          <li role="presentation"><a href="#tab3" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>  <span>Family Details</span></a></li>
          <li role="presentation"><a href="#tab4" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-beer" aria-hidden="true"></i> <span>Life Style</span></a></li>
          <li role="presentation"><a href="#tab5" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Location</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>
<!--  end navbar -->
<section>


	<div class="container bootstrap snippets full-information">
		<div class="row">
	  		<div class="tab-content panel-body">
			  <div role="tabpanel" class="tab-pane active" id="tab1">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div class="panel panel-body reg_modal" style="border: 1px solid #ccc; padding: 30px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>First Name <span>*</span></label>
													<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>Middle Name</label>
													<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Middle Name">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
													<label>Last Name <span>*</span></label>
													<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Gender <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Male
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Female
											</label>
										</div>
										<div class="form-group">
											<label>Mobile Number <span>*</span></label>
											<input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile Number">
										</div>

										<div class="form-group">
										  <label for="sel1">Religion <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Hindu</option>
											<option>Muslim</option>
											<option>Sikh</option>
											<option>Jain</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Mother Tongue <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Hindu</option>
											<option>Muslim</option>
											<option>Sikh</option>
											<option>Jain</option>
										  </select>
										</div>
										
										<div class="row">
											<div class="col-sm-12">
												<label>Date Of Birth <span>*</span></label>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <select class="form-control" id="sel1">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												  </select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <select class="form-control" id="sel1">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												  </select>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group">
												  <select class="form-control" id="sel1">
													<option>1990</option>
													<option>1991</option>
													<option>1992</option>
													<option>1993</option>
												  </select>
												</div>
											</div>
										</div>
										
										<div class="form-group">
										  <label for="sel1">Marital Status <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Married</option>
										  </select>
										</div>
										
										<div class="form-group">
											<label>Height <span>*</span></label>
											<div class="form-group">
											  <select class="form-control" id="sel1">
												  <option>5'10" 176 cm</option>
												<option>5'10" 176 cm</option>
												<option>5'10" 176 cm</option>
												<option>5'10" 176 cm</option>
											  </select>
											</div>
										</div>

										<div class="form-group">
											<label>Manglik <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">No
											</label>
										</div>

										<div class="form-group">
											<label>Disability <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">No
											</label>
										</div>
										
										<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="submit" value="Continue" class="btn btn-danger">

									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>

			  <div role="tabpanel" class="tab-pane" id="tab2">
					 <div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form">
										<div class="form-group">
										  <label for="sel1">Your Education <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Master</option>
											<option>Beachlors</option>
											<option>Intermediate</option>
											<option>High School</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Education Field <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Computer/IT</option>
											<option>Mechnical</option>
											<option>Electrical</option>	
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Your Work <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Government Employee</option>
											<option>Private Employee</option>
											<option>Businessman</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Annual Income <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>2lakh-3lakh</option>
											<option>3lakh-4lakh</option>
											<option>4lakh-5lakh</option>
										  </select>
										</div>

										<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="submit" value="Continue" class="btn btn-danger">

									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab3">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form">
										<div class="form-group">
										  <label for="sel1">Father Status <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Government Employee</option>
											<option>Private Employee</option>
											<option>Businessman</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Mother Status <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>House Wife</option>
											<option>Government Employee</option>
											<option>Private Employee</option>
											<option>Businessman</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">No. of Brother <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>1</option>
											<option>2</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">No. of Sister <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>1</option>
											<option>2</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Family Affluence <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Upper Class</option>
											<option>Middle Class</option>
											<option>Lower Class</option>
										  </select>
										</div>

										<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="submit" value="Continue" class="btn btn-danger">

									</form>	
								</div>
							</div>
						</div>
					</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab4">
			  		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form">

										<div class="form-group">
											<label>Diet ? <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Veg
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Non-veg
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Occasionlly
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Occasionlly
											</label>
										</div>

										<div class="form-group">
											<label>Smoke? <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">No
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Eggetarian
											</label>
										</div>

										<div class="form-group">
											<label>Drink? <span>*</span></label>
											<br>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">No
											</label>
											<label class="radio-inline">
											  <input type="radio" name="optradio">Occasionlly
											</label>
										</div>

										<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="submit" value="Continue" class="btn btn-danger">

									</form>	
								</div>
							</div>
						</div>
					</div>

			  </div>
			  
			   <div role="tabpanel" class="tab-pane" id="tab5">
			  		 <div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div class="panel panel-body" style="box-shadow: 5px 5px 7px #ccc; border: 1px solid #ccc; padding: 41px 0px;">
							<div class="row">
								<div class="col-sm-offset-1 col-sm-10">
									<form role="form">

										<div class="form-group">
										  <label for="sel1">City <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Muzaffarnagar</option>
											<option>Meerut</option>
											<option>Mathura</option>
											<option>Mumbai</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">State <span>*</span></label>
										  <select class="form-control" id="sel1">
											<option>Delhi</option>
											<option>Gujarat</option>
											<option>Punjab</option>
											 <option>Uttar Pradesh</option>
										  </select>
										</div>

										<div class="form-group">
										  <label for="sel1">Country <span>*</span></label> 
										  <select class="form-control" id="sel1">
											  <option>India</option>
											<option>US</option>
											<option>Canada</option>
										  </select>
										</div>
										<input type="submit" value="Save" class="btn btn-danger">&nbsp;&nbsp;&nbsp;
										<input type="submit" value="Continue" class="btn btn-danger">

									</form>	
								</div>
							</div>
						</div>
					</div>

			  </div>
			</div>
		  
		</div>
	</div>
</section>


<?php 
	include('footer.php');
?>

