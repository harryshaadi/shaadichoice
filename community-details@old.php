<?php
if(!isset($_SESSION['userDetail']))
	include('header.php');	
else
	include('head.php');

	
	
?>

<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-4 col-xs-12 search-panel">
			<form>
				<h2>Matrimony</h2>
				<div class="panel-group" id="accordion">
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse2">
						Religion
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Hindu
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Sikh
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Christian
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Jain
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Christian 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Catholic
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Jewish
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Marathi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Marathi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Punjabi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Kannada
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Bengali
										</label>
									  </div>
								</div>
					  </div>
					</div>
				  </div>
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse3">
						Language
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="Hindi">
										  <input type="checkbox"> Hindi
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="English">
										  <input type="checkbox"> English
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Urdu">
										  <input type="checkbox"> Urdu 
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Malyalam">
										  <input type="checkbox"> Malyalam
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline" title="Gujarati">
										  <input type="checkbox"> Gujarati 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline" title="Bangli">
										  <input type="checkbox"> Bangali
										</label>
									  </div>
									  
								</div>
					  </div>
					</div>
				  </div>
				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse4">
						Community
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse in">
					  <div class="panel-body1">
								<div class="row check">
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Brahmin
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Rajput
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Maratha
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox"> Yadav
										</label>
									  </div>
									   <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">khatri 
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Arora
										</label>
									  </div>
									  <div class="col-sm-6">
										<label class="checkbox-inline">
										  <input type="checkbox">Other
										</label>
									  </div>
									  
								</div>
					  </div>
					</div>
				  </div>


				  
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse7">
						Country
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse in">
					  <div class="panel-body1">
							<div class="row check">
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> India
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> USA
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Brazil
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox"> Canada
									</label>
								  </div>
								   <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">UK
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">France
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">Italy
									</label>
								  </div>
								  <div class="col-sm-6">
									<label class="checkbox-inline">
									  <input type="checkbox">UAE
									</label>
								  </div>
							</div>
					  </div>
					</div>
				  </div>
				  <div class="panel panel1">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse"  href="#collapse15">
						Profile Text
						<span class="fa fa-minus-circle pull-right"></span>
						</a>
					  </h4>
					</div>
					<div id="collapse15" class="panel-collapse collapse in">
					  <div class="panel-body1">
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control"  placeholder="e.g. drinking, spanish" >
							<span class="input-group-addon">
								<button type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>  
							</span>
						</div>
						<input class="btn btn-danger search-result" type="button" value="Search">
						<input class="btn btn-danger reset-result pull-right" type="reset" value="Reset all">
					  </div>
					</div>
				  </div>
				</div>
				</form>
			</div>
			
			<div class="col-lg-9 col-sm-8 col-xs-12 panel-body">
				 	<div class="row">
						<div class="col-md-12">
							<div class="tabbable-panel">
								<div class="tabbable-line">
									<ul class="nav nav-tabs" style="margin-bottom: 10px;">
										<li class="active">
											<a href="#tab_default_1" data-toggle="tab">
											Hindu Male </a>
										</li>
										<li>
											<a href="#tab_default_2" data-toggle="tab">
											Hindu Female </a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade in active" id="tab_default_1">
											 <div id="products" class="row list-group">
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Ankit Pal"><img class="group list-group-image img-thumbnail" src="img/2.jpg" alt="Ankit Pal" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Ankit Pal</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
  										
  										<div class="tab-pane fade in" id="tab_default_2">
											 <div id="products" class="row list-group">
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/1.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/2.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/3.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/4.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/5.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/6.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/7.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/8.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Aditi Sharma"><img class="group list-group-image img-thumbnail" src="img/partner/2.jpg" alt="Aditi Sharma" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Aditi Sharma</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Harshita Varma"><img class="group list-group-image img-thumbnail" src="img/partner/3.jpg" alt="Harshita Varma" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Harshita Varma</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Priya Kashyap"><img class="group list-group-image img-thumbnail" src="img/partner/4.jpg" alt="Priya Kashyap" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Priya Kashyap</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Khushi Jain"><img class="group list-group-image img-thumbnail" src="img/partner/5.jpg" alt="Khushi Jain" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Khushi Jain</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Deepika Patel"><img class="group list-group-image img-thumbnail" src="img/partner/6.jpg" alt="Deepika Patel" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Deepika Patel</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Bhumika Rawat"><img class="group list-group-image img-thumbnail" src="img/partner/7.jpg" alt="Bhumika Rawat" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Bhumika Rawat</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Apurva Arora"><img class="group list-group-image img-thumbnail" src="img/partner/8.jpg" alt="Apurva Arora" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Apurva Arora</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/4.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/5.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>

																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="item col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="thumbnail">
														<a href="matrimonial-profile.php" title="Anjali Singh"><img class="group list-group-image img-thumbnail" src="img/partner/7.jpg" alt="Anjali Singh" /></a>
														<div class="caption">
															<div class="row">
																<div class="table-list">
																	<h4 class="group inner list-group-item-heading"><a href="matrimonial-profile.php">Anjali Singh</a></h4>
																	<table class="table table-responsive">
																		<tr>
																			<td>Age :</td>
																			<td>25 Years</td>
																		</tr>
																		<tr>
																			<td>Community:</td>
																			<td>Hindu</td>
																		</tr>
																		<tr>
																			<td>Profession :</td>
																			<td>Teacher</td>
																		</tr>
																		<tr>
																			<td>Location :</td>
																			<td>Mumbai</td>
																		</tr>
																	</table>
																</div>
																<hr>
																<div class="thumbnail-footer text-center butn">
																	<a href="matrimonial-profile.php">View Full Profile</a>
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
					</div>
				</div>
		</div>
	</div>
</section>




<?php 
	include('footer.php');
?>

<script>
$(document).ready(function(){
	$('.collapse').on('shown.bs.collapse',function(){
		$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
	}).on('hidden.bs.collapse',function(){
		$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');	
	})
});
</script>

<script>
	$(document).ready(function(e) {
		$('.chat_body').hide();
		$('.chat').hide();
        $('.chat_header').click(function(e) {
         $('.chat_body').slideToggle(500);
		$('.chat').slideToggle(500);
		 $(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
        });
    });
	
	$(document).ready(function(e) {
        $('.msg_head').click(function(e) {
            $('.msg_wrap').slideToggle(500);
			
        });
    });
	
	
	$(document).ready(function(e) {
        $('.close1').click(function(e) {
            $('.msg_box').hide(500);
        });
    });
	$(document).ready(function(e) {
        $('.user').click(function(e) {
			$('.msg_wrap').show();
            $('.msg_box').show();
        });
    });


	$(document).ready(function() {
        $('textarea').keypress(function(e) {
			if(e.keyCode==13){
				var msg = $(this).val();
				$("<div class='msg_b'>"+msg+"</div>").insertBefore('.msg_insert');
				$(this).val('');
				$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
			}
        });
    });
</script>
<script>
$(document).ready(function() {
	$('#btnPopover1').popover();
	$('#btnPopover2').popover();
	$('#btnPopover3').popover();
	$('#btnPopover4').popover();
	$('#btnPopover5').popover();
	$('#btnPopover6').popover();
	$('#btnPopover7').popover();
	$('#btnPopover8').popover();
	
	$('#btnPopover_1').popover();
	$('#btnPopover_2').popover();
	$('#btnPopover_3').popover();
	$('#btnPopover_4').popover();
	$('#btnPopover_5').popover();
	$('#btnPopover_6').popover();
	$('#btnPopover_7').popover();
	$('#btnPopover_8').popover();
});
</script>

