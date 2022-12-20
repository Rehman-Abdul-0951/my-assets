<?php
	include_once("header.php");
?>
<!-- Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users List</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<!--Show message after insert , update and delete  record Unsuccessfull-->
<?php if($success = $this->session->flashdata('error')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><?php echo $success; ?></strong>
	</div>
<?php } ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
	    <div class="col-lg-12">
		    <div class="ibox float-e-margins">
		    	<div class="ibox-title">
                    <div class="row">
						<div class="col-sm-12 form-group" >
							<h3>User List</h3>
						</div>
					</div>
				</div>
		        <div class="ibox-content">
		            <div class="table-responsive">
						<table class="table dataTable">
							<thead>
								<tr>
									<th>Sr.No</th>
									<th>User</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>City</th>
									<th>Postal Code</th>
									<th>Street 1</th>
									<th>Street 2</th>
									<th>Country</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						       <?php
								$index = 1;
						        foreach($record as $r){	
						       ?>
								<tr>
									<td><?php echo $index ?></td>
									<td><?php echo $r->type ?></td>
									<td><?php echo $r->first_name ?></td>
									<td><?php echo $r->last_name ?></td>
									<td><?php echo $r->city ?></td>
									<td><?php echo $r->postal_code ?></td>
									<td><?php echo $r->street_1 ?></td>
									<td><?php echo $r->street_2 ?></td>
									<td><?php echo $r->country ?></td>
									<td>
			            				<a href = "<?php echo base_url('index.php/user_controller/edit_user/'.$r->id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit!">
			            					<span class="glyphicon glyphicon-pencil"></span>
			            				</a>
										

										<a href = "<?php echo base_url('index.php/user_controller/delete_user/'.$r->id); ?>" data-toggle="tooltip" data-placement="top" title="Delete!" onClick="return confirm('Are you sure you want to delete?')" >
			            				<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>

			            			</td>
			         			</tr>

			       				<?php
			       					$index++;
									} 
								?>

			       			</tbody>
			   			</table>
		            </div>
		        </div>
		    </div>
		</div>
    </div>
</div>	
<?php 
    ob_start();
?>
<script type="text/javascript">
	$('.table').DataTable();
	setTimeout(function() {
		    toastr.options = {
		        closeButton: true,
		        progressBar: true,
		        showMethod: 'slideDown',
		        timeOut: 4000
		    };
		    <?php if($success = $this->session->flashdata('success')) { ?>
		        toastr.success('<?php echo $success; ?>');
		    <?php } ?>
		    <?php if($failed = $this->session->flashdata('failed')) { ?>
		        toastr.error('<?php echo $failed; ?>');
		    <?php } ?>
		}, 1000);
</script>
<?php
 	$script = ob_get_clean();
	include_once("footer.php");
?>