<?php 
include_once('header.php');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Packages List</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
                    <h5>Packages List</h5>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                		<table class="table packagetable">
                			<thead>
                				<tr>
                					<th>Sr.No.</th>
                					<th>Name</th>
                					<th>Months</th>
                					<th>Price</th>
                					<th>Action</th>
                				</tr>
                			</thead>
                			<tbody>
                				<?php
                				$index = 1;
                				if(count($packages) > 0){
                					foreach ($packages as $row) {
                				?>	
                				<tr>
                					<td><?php echo $index?></td>
                					<td><?php echo $row->package_name?></td>
                					<td><?php echo $row->months?></td>
                					<td><?php echo $row->price?></td>
                					<td>
                						<a href="<?php echo base_url()?>index.php/package_controller/index/<?php echo $row->package_id?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                						<a href="<?php echo base_url()?>index.php/package_controller/delete_package/<?php echo $row->package_id?>" onclick="return confirm('Do you want to delete!');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                					</td>
                				</tr>
                				<?php	                
                					$index++;				
                					}
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
	$('.packagetable').DataTable();
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
    include_once('footer.php');
?>