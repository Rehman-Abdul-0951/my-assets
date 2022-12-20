<?php 
include_once('header.php');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Operators List</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
                    <h5>Operators List</h5>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                		<table class="table operatorstable">
                			<thead>
                				<tr>
                					<th>Sr.No.</th>
                					<th>Logo Image</th>
                					<th>Name</th> 
                                    <th>Action</th>               					
                				</tr>
                			</thead>
                			<tbody>
                				<?php
                				$index = 1;
                				if(count($operators) > 0){
                					foreach ($operators as $row) {
                				?>	
                				<tr>
                					<td><?php echo $index?></td>
                					<td><img src="<?php echo base_url().$row->logo?>" class="img-thumbnail" height="100px" width="50px;"/></td>
                					<td><?php echo $row->operator_name?></td> 
                					<td>
                						<a href="<?php echo base_url()?>index.php/operator_controller/index/<?php echo $row->operator_id?>" class="btn btn-primary">Edit</a>
                						<a href="<?php echo base_url()?>index.php/operator_controller/delete_operator/<?php echo $row->operator_id?>" onclick="return confirm('Do you want to delete!');" class="btn btn-danger">Delete</a>
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
    $(document).ready(function(e){        
        $('.operatorstable').DataTable();

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
    });
</script>
<?php
    $script = ob_get_clean();
    include_once('footer.php');
?>