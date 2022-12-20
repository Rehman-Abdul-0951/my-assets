<?php  include_once('header.php');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Booking Details</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Booking Table</h5>
                    <div class="ibox-tools">
                        <a href="<?php echo base_url();?>index.php/Booking_Controller/index">
                        	<button class="btn btn-primary" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create</button>
                    	</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                    	<table class="table table-striped table-bordered table-hover dataTables-example">
                    		<thead>
                    			<tr>
			                        <th>Booking ID</th>
			                        <th>Room ID</th>
			                        <th>Customer ID</th>
			                        <th>No. of Days</th>
			                        <th>No. of People</th>
			                        <th>Book End Date</th>
			                        <th>Amount</th>
			                        <th>Booking Payment</th>
			                        <th>Payment Date</th>
			                        <th>Action</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			<?php
                    				//var_dump($bookingData);exit()
                    				foreach ($bookingData as $bookingRecords) {
                    			?>
			                    <tr class="gradeX">
			                        <td><?php echo $bookingRecords->booking_id; ?></td>
			                        <td><?php echo $bookingRecords->room_id; ?></td>
			                        <td><?php echo $bookingRecords->name; ?></td>
			                        <td><?php echo $bookingRecords->no_of_days; ?></td>
			                        <td><?php echo $bookingRecords->no_of_people; ?></td>
			                        <td><?php echo date("d M, Y", strtotime($bookingRecords->book_end_date)); ?></td>
			                        <td><?php echo $bookingRecords->amount; ?></td>
			                        <td><?php echo $bookingRecords->booking_payment; ?></td>
			                        <td><?php echo date("d M, Y", strtotime($bookingRecords->payment_date)); ?></td>  
			                        <td>

			            				<a href="<?php echo base_url('index.php/Booking_Controller/editBookingData/'.$bookingRecords->booking_id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit!" >
			            					<span class="fa fa-pencil"></span>
			            				</a>
										
										<a href="<?php echo base_url('index.php/Booking_Controller/deleteBookingData/'.$bookingRecords->booking_id); ?>" data-toggle="tooltip" data-placement="top" title="Delete!" onClick="return confirm('Are you sure you want to delete?')" >
			            				<button class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
			                        </td>   
			                    </tr>
			                <?php }?>
                    		</tbody>
                   		 </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include_once('footer.php');?>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
         });   
    });

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
            toastr.error('<?php echo $error; ?>');
        <?php } ?>
    }, 1000);
</script>
<?php  exit(); ?>