<?php 
	include('head.php');
	$msg='';
	/* $payment_dtl = $db->getRecord(0, array('act_amount','time_period'),'tbl_paypal',array('order_id'=>$_REQUEST['custom']));
	//print_r($payment_dtl);
	print_r($_REQUEST);
	
	$payer_id = $_REQUEST['payer_id'];
	$txn_id = $_REQUEST['txn_id'];
	$txn_type = $_REQUEST['txn_type'];
	$payment_status = $_REQUEST['payment_status'];
	$payment_date = $_REQUEST['payment_date'];	 
	$payment_type = $_REQUEST['payment_type'];	 
	if( $_REQUEST['payment_status']=='Completed'){
		$res = $db->updateRecord(0, array('payer_id' => $payer_id,'txn_id' => $txn_id,'txn_type' => $txn_type,'payment_status' => $payment_status,'payment_date' => $payment_date,'payment_type' => $payment_type), 'tbl_paypal', array('order_id'=>$_REQUEST['custom']));
		$msg = 1;
	}else{
		$msg = 0;
	} */
	
?>

<!--  end navbar -->
<section>
	<div class="container bootstrap snippets edit-profile">
		<div class="row">
		  <div class="col-xs-12 col-sm-8">
		  		<br>
		  		<br>
				
					<div class="panel pay_one">
						<div class="row">
							<div class="col-sm-12">
								<h4>Your Payment was un-successfull. Please try again later.</h4>
								<!--<h4>Your OrderID is : <?//=$_REQUEST['custom'];?></h4>-->
								<h4><a href="upgrade.php">Click Here </a></h4>
								<hr>
							</div>
						</div>
					</div>
				
			</div>
			
			<div class="col-xs-12 col-sm-4 iframe">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FShaadiChoice%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=284842481937589" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				
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