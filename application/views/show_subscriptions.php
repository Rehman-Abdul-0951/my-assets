<?php
	include_once("header.php");
?>
<!-- Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Subscriptions List</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
	    <div class="col-lg-12">
		    <div class="ibox float-e-margins">
		    	<div class="ibox-title">
                    <div class="row">
						<div class="col-sm-12 form-group" >
							<h3>Subscriptions List</h3>
						</div>
					</div>
				</div>
		        <div class="ibox-content">
		            <div class="table-responsive">
						<table class="table dataTable">
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Customer</th>
									<th>Status</th>
									<th>STB ID</th>
									<th>Card ID</th>
									<th>Package</th>
									<th>Installation Date</th>
									<!-- <th>Renewel Date</th> -->
									<th>Expiry Date</th>
									<th>Operator</th>									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						       <?php
						       $i=1;
						        foreach($record as $r){	
						       ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $r->first_name ?></td>
									<td><?php echo $r->status ?></td>
									<td><?php echo $r->stb_id ?></td>
									<td><?php echo $r->card_id ?></td>
									<td><?php echo $r->package_name ?></td>
									<td><?php echo date("d  M, Y", strtotime($r->installation_date)) ?></td>
									<!-- <td><?php echo date("d  M, Y", strtotime($r->renewal_date)) ?></td> -->
									<td><?php echo date("d  M, Y", strtotime($r->expiry_date)) ?></td>
									<td><?php echo $r->operator_name ?></td>
									<td>
			            				<a href = "<?php echo base_url('index.php/subscription_controller/edit_subscriptions/'.$r->subscription_id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit!">
			            					<span class="glyphicon glyphicon-pencil"></span>
			            				</a>
										

										<a href = "<?php echo base_url('index.php/subscription_controller/delete_subscriptions/'.$r->subscription_id); ?>" data-toggle="tooltip" data-placement="top" title="Delete!" onClick="return confirm('Are you sure you want to delete?')">
			            				<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>

			            			</td>
			         			</tr>
			       				<?php $i++ ; } ?>
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
		    <?php if($faild = $this->session->flashdata('failed')) { ?>
		        toastr.error('<?php echo $failed; ?>');
		    <?php } ?>
		}, 1000);
</script>
<?php
    $script = ob_get_clean();
    include_once("footer.php");
?>
