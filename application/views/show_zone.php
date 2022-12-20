<?php
	include_once("header.php");
?>
<!-- Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Zone</h2>
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
							<h3>Show Zone</h3>
						</div>
					</div>
				</div>
		        <div class="ibox-content">
		            <div class="table-responsive">
						<table class="table dataTable">
							<thead>
								<tr>
									<th>Sr.No</th>
									<th>Name</th>
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
									<td><?php echo $r->zone_name ?></td>
									
									<td>
			            				<a href = "<?php echo base_url('index.php/zone_controller/edit_zone/'.$r->zone_id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit!">
			            					<span class="glyphicon glyphicon-pencil"></span>
			            				</a>
										

										<a href = "<?php echo base_url('index.php/zone_controller/delete_zone/'.$r->zone_id); ?>" data-toggle="tooltip" data-placement="top" title="Delete!" onClick="return confirm('Are you sure you want to delete?')" >
			            				<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>

			            			</td>
			         			</tr>
			       				<?php $i++; } ?>
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