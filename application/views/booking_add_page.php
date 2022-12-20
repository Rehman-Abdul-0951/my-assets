<?php  require_once('header.php');?>
<style type="text/css">
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	    margin: 0; 
	}
</style>

<!-- this code use of Rooms model open start here -->
<div class="modal fade" id="roomModel" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Room Details</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover roomDataTables">
						<thead>
							<tr>
								<th>Room ID</th>
								<th>Floor No.</th>
								<th>Type</th>
								<th>Rent</th>
								<th>Occupancy</th>
								<th>AC</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($roomData as $roomRecords) {	?>
								<tr class="gradeX">
									<td><a onclick="roomInformation(<?php echo $roomRecords->room_id; ?>);"><?php echo $roomRecords->room_id; ?></a></td>
									<td><?php echo $roomRecords->floor_no; ?></td>
									<td><?php echo $roomRecords->type; ?></td>
									<td><?php echo $roomRecords->rent; ?></td>
									<td><?php echo $roomRecords->occupancy; ?></td>
									<td><?php echo $roomRecords->ac; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- this code use of Rooms model open end here -->

<!-- this code use of Customers model open start here -->
<div class="modal fade" id="customerModel" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Customer Details</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover customerDataTables">
						<thead>
							<tr>
								<th>Cust ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>State</th>
								<th>Pincode</th>
								<th>Street</th>
								<th>Country</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($customerData as $customerRecords) {	?>
								<tr class="gradeX"> 
									<td><?php echo $customerRecords->customer_id; ?></td>
									<td><a onclick="customerInformation(<?php echo $customerRecords->customer_id; ?>);"><?php echo $customerRecords->name; ?></td>
									<td><?php echo $customerRecords->email; ?></td>
									<td><?php echo $customerRecords->phone; ?></td>
									<td><?php echo $customerRecords->city; ?></td>
									<td><?php echo $customerRecords->state; ?></td> 
									<td><?php echo $customerRecords->pincode; ?></td> 
									<td><?php echo $customerRecords->street; ?></td> 
									<td><?php echo $customerRecords->country; ?></td> 
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- this code use of Customers model open end here -->


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Booking Form</h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                	<div class="ibox-title">
                        <h5>Booking Form</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form role="form" id="bookingForm" action="<?php echo base_url();?>index.php/Booking_Controller/bookingUpSet" enctype="multipart/form-data" method="post">
                            	<div class="col-lg-6">
	                                <div class="form-group">
	                                	<div class="row">
		                                    <div class="col-lg-12">
		                                    	<label>Room:</label>
		                                        <div class="input-group">
		                                        	<input type="text" class="form-control room_id" placeholder="Room" name="room_id" value="<?php echo isset($editRecods->room_id)? $editRecods->room_id: '' ?>" readonly>
		                                        	<span class="input-group-btn"> 
		                                        		<button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#roomModel"></i>
		                                        		</button> 
		                                        	</span>
		                                        </div>
		                                    </div>
		                                </div>
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group">
	                                	<div class="row">
		                                    <div class="col-lg-12">
		                                    	<label>Customer:</label>
		                                        <div class="input-group">
		                                        	<input type="hidden" name="customer_id" class="customer_id">
		                                        	<input type="text" class="form-control customer" placeholder="Customer" name="customer_name" value="<?php echo isset($editRecods->name)? $editRecods->name: '' ?>" readonly>
		                                        	<span class="input-group-btn"> 
		                                        		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customerModel"><i class="fa fa-search" aria-hidden="true"></i>
		                                        		</button> 
		                                        	</span>
		                                        </div>
		                                    </div>
		                                </div>
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group">
		                                <label>Number of Days:</label>    
		                                <input type="number" class="form-control" name="no_of_days" placeholder="Number of Days" value="<?php echo isset($editRecods->no_of_days)? $editRecods->no_of_days: '' ?>">   
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group">
		                                <label>Number of People:</label>    
		                                <input type="number" class="form-control" name="no_of_people" placeholder="Number of People" value="<?php echo isset($editRecods->no_of_people)? $editRecods->no_of_people: '' ?>">   
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group" id="data_1">
                               			<label>Book End date</label>
                                		<div class="input-group date">
                                    		<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="book_end_date" value="<?php echo isset($editRecods->book_end_date)? $editRecods->book_end_date: '' ?>">
                                		</div>
                           		 	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group">
		                                <label>Booking Payment:</label>    
		                                <input type="number" class="form-control" name="booking_payment" placeholder="Booking Payment" value="<?php echo isset($editRecods->booking_payment)? $editRecods->booking_payment: '' ?>">   
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group">
		                                <label>Amount:</label>    
		                                <input type="number" class="form-control" name="amount" placeholder="Booking Payment" value="<?php echo isset($editRecods->amount)? $editRecods->amount: '' ?>">   
                                	</div>
                            	</div>

                            	<div class="col-lg-6">
	                                <div class="form-group" id="data_1">
                               			<label>Payment Date</label>
                                		<div class="input-group date">
                                    		<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="payment_date" value="<?php echo isset($editRecods->payment_date)? $editRecods->payment_date: '' ?>">
                                		</div>
                           		 	</div>
                            	</div>
             
                                <div class="col-lg-12">   
		                            <div class="form-group">
		                            	<div class="" style="float: right;">
		                            		<a href="#"><button type="button" class="btn btn-outline btn-default">Cancel</button></a>
		                                	<button class="btn btn-sm btn-primary" type="submit"><strong>Submit</strong></button>
		                            	</div>
		                            </div>
                    			</div>   
                            </form>
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
	/*this code use of get room id and showing input field room start here*/
	function roomInformation(roomId){
		$('#roomModel').modal('hide');
		if(roomId != ''){
			$.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Booking_Controller/getRoomDetails",
                data: { roomId :roomId },                     
                success: function(response){
                	var data = $.parseJSON(response);
                	console.log(data);
                	if(data != ''){
                		$("#roomModel").show();
                		$('.room_id').val(data.room_id);	
                	}
                }
            });
		}
	}
	/*this code use of get room id and showing input field room end here*/

	/*this code use of get customer name and showing input field customer start here*/
	function customerInformation(customerId){
		$('#customerModel').modal('hide');
		if(customerId != ''){
			$.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Booking_Controller/getCustomerDetails",
                data: { customerId :customerId },                     
                success: function(response){
                	var data = $.parseJSON(response);
                	console.log(data);
                	if(data != ''){
                		$("#customerModel").show();
                		$('.customer_id').val(data.customer_id);	
                		$('.customer').val(data.name);	
                	}
                }
            });
		}
	}	
	/*this code use of get customer name and showing input field customer end here*/
 	$(document).ready(function(){
		$('#data_1 .input-group.date').datepicker({
            format:'dd/mm/yyyy',
            "autoclose": true
        }).datepicker("setDate",'now');
   
        $('.roomDataTables').DataTable({
            pageLength: 25,
        }); 

        $('.customerDataTables').DataTable({
            pageLength: 25,
        }); 

        $('#bookingForm').validate({
	        rules: {
	            room_id: {
	                required: true,
	            },
	            customer_name: {
	                required: true,
	            },
	            no_of_days: {
	                required: true,
	            },
	            no_of_people: {
	                required: true,
	            },
	            /*book_end_date: {
	                required: true,
	            },*/
	            /*booking_payment: {
	                required: true,
	            },*/
	            amount: {
	                required: true,
	            },
	            /*payment_date: {
	                required: true,
	            },*/
	        },

	        messages: {
       			room_id: "Select Room",
        		customer_name: "Select Customer",
        		no_of_days: "Enter Number of Days",
        		no_of_people: "Enter Number of People",
        		amount: "Enter Amount",
        		/*book_end_date: "Enter Select Date",*/
        		
        		/*booking_payment: "Enter Select Date,*/
        		/*payment_date: "Enter Select Date,*/
        
   			},

	        errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }	
    	});
  
    });
</script>
<?php
    $script = ob_get_clean();
    require_once("footer.php");
?>