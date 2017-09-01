<?php
	include_once('admin-header.php');
  ?>
<div id="wrapper">
<?php
	include_once('admin-left-sidebar.php');
		
		$pageTitle = "Manage Community";
		$linkTitle = "Add New Community";
		$linkURL = "add-edit-community.php";
		$cScreenName = "Show All Communities";
		//$communityInfoArr = $db->getRecord(0, array('*'), 'tbl_community');	
		
		$st = 0;
		$perPage = 20;
		$totalNoOfRecords = '';
		$val = '';
		if (!empty($_GET['st'])) $st = $_GET['st'];
		
		if(isset($_POST['search']))
		{
			if($_POST['searchid']!='')
			{ $val = $_POST['searchid']; }
			$sc = new Search();
			$communityInfoArr = $sc->searchCity($trace = 0,array('*'),'tbl_community',array('community_name'=>$_POST['searchid']),$st,$perPage,'community_name', 'ASC');
			$totalNoOfRecords = count($communityInfoArr);
			unset($sc);
		}
		else
		{
			$totalNoOfRecords = $db->getRecordCount(0, 'tbl_community', '', 'community_id_pk');
			$communityInfoArr = $db->getRecord(0, array('*'), 'tbl_community', '', $st, $perPage, 'community_name', 'ASC');
		}
		$divPage = generatePagination($totalNoOfRecords, $perPage, $st, 'community-listing.php', "");
		
?>
   <div id="page-wrapper">
            <div class="container-fluid">
               <!-- Page Heading -->
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header"><?=$pageTitle?></h1>
                     <ol class="breadcrumb">
                        <li><a href="<?=$linkURL?>"><?=$linkTitle?></a></li>
                        <li class="active"><?=$cScreenName?></li>
                     </ol>
                  </div>
               </div>
				<?php
				// HERE SHOW ERROR MSG
				include_once('session-msg.php');
				?>
                <!-- /.row -->
				
                <div class="row">
				<div class="search-bar">
						<form method="post" action=''>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="searchid" placeholder="Search Community" value="<?=$val;?>" name='searchid' search-item="searchCommunity"/> 
								<div id="result" class="" style="border:1px solid #ccc"></div>
							</div>
							<div class="col-sm-2">
								<input type="submit"  name='search' id="search" class="form-control btn btn-danger" value="Search" >
								<input type="hidden"  name='postAction' id="postAction" class="form-control btn btn-danger" value="selectCity" >
							</div>
							<div class="col-sm-2">
								<a href="community-listing.php" class="form-control btn btn-danger">Reset</a>
							</div>
						</form>
					</div>
					<br>
					<br>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover ">
                                <thead class="bg-danger">
                                    <tr>
										<th class="srnno">Sr. No.</th>
                                        <th>Community Name</th>
                                        <th class="clsCenter">Status</th>
                                      	<th class="action">Action</th>
                                   </tr>
                                </thead>
                                <tbody>
<?php 
									$numOfRows = count($communityInfoArr);

									if($numOfRows > 0)
									{
										for($i = 0; $i < $numOfRows; $i++)
										{ 
											$statusFlag = strtoupper($communityInfoArr[$i]['status']);
											if($statusFlag!='')
											{
											$status = $ACC_STATUS[$statusFlag];
												if($status=='Active')
												{
													$path = HTTP_PATH.'/img/active.jpg';
													$title = 'Inactive'; 
												}
												else 
												{
													$path = HTTP_PATH.'/img/inactive.jpg';
													$title = 'Active';
												}
											} else {$path = HTTP_PATH.'/img/active.jpg';}
?>
										<tr>
											<td class="srno"><?=$i+1?></td>
											<td><?=$communityInfoArr[$i]['community_name'];?></td>
											<td class='clsCenter'>
												<form action="admin-controller.php" method="post" onsubmit="javascript: return showConfirmBox('Do you want to update status?');">
													<input type="hidden" name="communityCode" value="<?=$communityInfoArr[$i]['community_code']?>">
													<input type="hidden" name="status" value="<?=$statusFlag?>">
													<input type="hidden" name="postAction" value="updateCommunityStatus">
													<button type="submit" name="submit" class="edit-btn"><span style="cursor:pointer" data-toggle="tooltip" title=<?=$title?>> <img src="<?=$path ?>" class='clsCenter'></span></button>
												</form>
											</td>
											<?php // EDIT, DELETE ///?>
										    <td class="action">
												<div class="col-sm-6">
														<form action="add-edit-community.php" method="post">
															<input type="hidden" name="postCommunityCode" value="<?=$communityInfoArr[$i]['community_code']?>">
															<button type="submit" name="submit" value="Edit" class="edit-btn"/><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#9a2629; margin-right:-1px"></i>&nbsp;Edit</button>
														</form>
													</div>
													<div class="col-sm-6">
														<form action="admin-controller.php" method="post" onsubmit="javascript: return showConfirmBox('Do you want to delete this record?');">
															<input type="hidden" name="community_code" value="<?=$communityInfoArr[$i]['community_code']?>"><input type="hidden" name="postAction" value="dropCommunity">
															<button type="submit" name="submit" value="Delete" class="edit-btn"><i class="fa fa-trash-o" aria-hidden="true" style="color:#9a2629; margin-right:-1px"></i>&nbsp;Delete</button>
														</form> 
													</div>
											</td>
										 </tr>
<?php 								
									}
									if($totalNoOfRecords>20){
?>
										<tr>
											<td colspan="5"><div class="yahoo2"><?=$divPage?>&nbsp;<strong><?=$totalNoOfRecords?>&nbsp;record(s)</strong></div>
										</td></tr> 
<?php								}
								}
								else
								{
?>
									<tr><td colspan="5">No Record Found.</td></tr>
<?php 
								}
?>
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
   include_once('admin-footer.php');
?>
