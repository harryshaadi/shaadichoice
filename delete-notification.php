<?php 
	include('head.php');
?> 
<link href="css/jquery.css" rel="stylesheet" type="text/css" />
<!--  end navbar -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 panel-body">
						<div class="left-tab">
							<div class="left-tab-heading">
							All Notifications
							</div>
							<ul>
								<li><a href="notifications.php">New</a></li>
								<li><a href="read-notification.php">Read</a></li>
								<li class="active"><a href="delete-notification.php">Deleted</a></li>
								<li>
									<div class="input-group stylish-input-group input-search">
										<input type="text" class="form-control"  placeholder="Search notification" >
										<span class="input-group-addon">
											<button type="submit">
												<span class="glyphicon glyphicon-search"></span>
											</button>  
										</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-9 panel-body">
						<div class="inbox">
							<div class="inbox-heading">
									<div class="row">
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
											<h1>Deleted Notifications</h1>
										</div>
									</div>
							</div>
							<hr>
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="conversation.php">
											<span class="ProfileThumbImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari <span class="time">11:54 AM,  6 May 2017</span></h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 text-right">
										<div class="dropdown pull-right">
										  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul class="dropdown-menu  drop_down" id="drop">											
											<li><a href="javascript:void(0)" onClick='return archive("5");'>Read</a></li>										
											<li><a href="javascript:void(0)" onClick='return msgunread("5");'>Un Read</a></li>
											<li><a href="javascript:void(0)" onClick='return movetotrash("5");'>Delete</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="conversation.php">
											<span class="ProfileThumbImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari <span class="time">11:54 AM,  6 May 2017</span></h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 text-right">
										<div class="dropdown pull-right">
										  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul class="dropdown-menu  drop_down" id="drop">											
											<li><a href="javascript:void(0)" onClick='return archive("5");'>Read</a></li>										
											<li><a href="javascript:void(0)" onClick='return msgunread("5");'>Un Read</a></li>
											<li><a href="javascript:void(0)" onClick='return movetotrash("5");'>Delete</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="conversation.php">
											<span class="ProfileThumbImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari <span class="time">11:54 AM,  6 May 2017</span></h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 text-right">
										<div class="dropdown pull-right">
										  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul class="dropdown-menu  drop_down" id="drop">											
											<li><a href="javascript:void(0)" onClick='return archive("5");'>Read</a></li>										
											<li><a href="javascript:void(0)" onClick='return msgunread("5");'>Un Read</a></li>
											<li><a href="javascript:void(0)" onClick='return movetotrash("5");'>Delete</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="conversation.php">
											<span class="ProfileThumbImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari <span class="time">11:54 AM,  6 May 2017</span></h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 text-right">
										<div class="dropdown pull-right">
										  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul class="dropdown-menu  drop_down" id="drop">											
											<li><a href="javascript:void(0)" onClick='return archive("5");'>Read</a></li>										
											<li><a href="javascript:void(0)" onClick='return msgunread("5");'>Un Read</a></li>
											<li><a href="javascript:void(0)" onClick='return movetotrash("5");'>Delete</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							
							<div class="ProfileThumb">
								<div class="panel-body">
									<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
										<a href="conversation.php">
											<span class="ProfileThumbImg">
												<img src="img/1.jpg" class="pull-left">
											</span>
											<h4>Renna Kumari <span class="time">11:54 AM,  6 May 2017</span></h4>
											<h3>Mumbai, Maharashtra, India</h3>
											<div class="message">Hi How r u ?...</div>
										</a>
									</div>
									<div class="col-lg-2  col-sm-2 col-md-2 col-xs-2 text-right">
										<div class="dropdown pull-right">
										  <button class="btn btn-setting dropdown-toggle" type="button" data-toggle="dropdown" data-target="drop"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul class="dropdown-menu  drop_down" id="drop">											
											<li><a href="javascript:void(0)" onClick='return archive("5");'>Read</a></li>										
											<li><a href="javascript:void(0)" onClick='return msgunread("5");'>Un Read</a></li>
											<li><a href="javascript:void(0)" onClick='return movetotrash("5");'>Delete</a></li>
										  </ul>
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
	include('chat.php');
?> 

<?php 
	include('footer.php');
?> 
<script src="js/jquery.js"></script>

<script>
	$( function() {
		$( "#slider-range1" ).slider({
			range: true,
			min: 0,
			max: 200,
			values: [ 0, 200 ],
			slide: function( event, ui ) {
				$( "#height" ).val(ui.values[ 0 ] + " cm " + " - " + ui.values[ 1 ] + " cm"  );
			}
		});
		$( "#height" ).val($( "#slider-range1" ).slider( "values", 0 ) + " cm " +
			" - " + $( "#slider-range1" ).slider( "values", 1 )+ " cm " );
	} );
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
<script>
	function showhidebutton(data,ID){
		//alert("MY CURRENT data"+data+"ID"+ID);
		if($(this).hasClass('locked_active') || $(this).hasClass('unlocked_inactive')){
		/* code to do when unlocking */
        $('#switch_status').html('Switched on.');
		}else{
			/* code to do when locking */
			$('#switch_status').html('Switched off.');
		}
		//$('#'+data+ID).html('hello');
		
		/* reverse locking status */
		$('#toggle_event_editing'+ID+' button').eq(0).toggleClass('locked_inactive locked_active btn-default btn-danger');
		$('#toggle_event_editing'+ID+' button').eq(1).toggleClass('unlocked_inactive unlocked_active btn-danger btn-default');
		
		
	}
</script>