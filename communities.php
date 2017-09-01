<?php 
//include_once('scpanel/web-config.php');	
include('header-data.php');


$communityArr = $db->getRecord(0,array('community_name'),'tbl_community','', '', '', 'community_name', 'ASC');
$countCommunity = count($communityArr);
?>
<link href="<?=USER_PATH?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<!---Custom CSS--->
<link href="<?=USER_PATH?>css/custom.css" rel="stylesheet" type="text/css" />
<!---Responsive CSS--->
<link href="<?=USER_PATH?>css/responsive.css" rel="stylesheet" type="text/css" />
<!---Fontawesome--->
<link rel="stylesheet" href="<?=USER_PATH?>css/font-awesome.min.css">
<!---Fevicon--->
<link href="<?=USER_PATH?>img/fev.png" rel="icon" type="image/png" />
<link href="<?=USER_PATH?>css/blog.css" rel="stylesheet" type="text/css" />
<!---Font-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!--  end navbar -->
<section>
<?php $alphabelArray = array('a' =>'A', 'b' =>'B', 'c'=>'C', 'd'=>'D', 'e'=>'E', 'f'=>'F', 'g'=>'G', 'h'=>'H', 'i'=>'I', 'j'=>'J', 'k'=>'K', 'l'=>'L', 'm'=>'M', 'n'=>'N', 'o'=>'O', 'p'=>'P', 'q'=>'Q', 'r'=>'R', 's'=>'S', 't'=>'T', 'u'=>'U', 'v' => 'V', 'w'=>'W', 'x'=>'X', 'y'=>'Y', 'z'=>'Z');?>
	<br>
	<div class="container">
		<div class="row comu">
			<div class="col-sm-8">
					<h3>Comunities</h3>
					<ul class="list-inline brands-list">
					<?php foreach($alphabelArray as $key => $val){?>
					  <li><a href="#<?=$key?>"><?=$val?></a></li>
					<?php } ?>
					</ul>
					
					<div class="tabbable-panel1">
						<?php foreach($alphabelArray as $key => $val) { ?>
						<div class="community-heading" id="<?=$key?>"><?=$val?></div>
						<div class="row community-content">
							<?php if($countCommunity > 0){
								foreach($communityArr as $comKey => $comVal)
								{
									$comVal['community_name'] = str_replace(' ','-',$comVal['community_name']);
									if(strtolower(trim($comVal['community_name'][0])) == $key)
									{
							?>
							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-1	2">
								<p><a href="<?=USER_PATH?>matrimony/<?=strtolower(trim($comVal['community_name']))?>-matrimony"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?=$comVal['community_name']?></a></p>
							</div>	
							<?php }}} ?>
						</div>
						<?php } ?>
					</div>
				</div>
				
				<div class="col-sm-4">
				<h3>Free Sign Up & View Match Profile</h3>
				
				<div class=" iframe">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FShaadiChoice%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=284842481937589" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</div>
			</div>
			</div>
		</div>
</section>




<?php 
	include('footer-basic.php');
?>

