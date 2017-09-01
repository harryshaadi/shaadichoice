<?php 
	include('head.php');
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets full-information">
		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
			  <h3 class="text-center">Please Add Your Family Details</h3>
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
	</div>
</section>


<?php 
	include('footer.php');
?>

