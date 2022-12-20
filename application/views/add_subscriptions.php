<?php
	include_once("header.php");
?>
<style type="text/css">
    .error{
        color:red;
    }
</style>
<!--page Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Subscription</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Subscription</h5>
                </div>
                <div class="ibox-content">

                    <form  method="post" action=" <?php if($page == "edit"){ ?><?php echo base_url(); ?>index.php/Subscription_Controller/update_subscriptions/<?php echo $record->subscription_id; ?><?php }else{ ?><?php echo base_url(); ?>index.php/Subscription_Controller/add_subscriptions<?php } ?>" id="myform" class="form-horizontal form" >
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Customer:</label>
                            <div class="col-sm-4">
                                 <select name="customer" class="form-control validate">
                                   <option value="">--Select Customer--</option>
                                   <?php
                                        foreach($customer as $r){ 
                                     ?>
                                    <option value="<?php echo $r->customer_id ?>"
                                        <?php if($page == 'edit'){ echo($record->customer == $r->customer_id?'selected':''); 
                                            }
                                        ?>><?php echo $r->first_name ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                             <label class="col-sm-2 control-label">Operator:</label>
                            <div class="col-sm-4">
                                <select name="operator_id" class="form-control validate">
                                   <option value="">--Select Operator--</option>
                                   <?php
                                        foreach($operator as $r){ 
                                     ?>
                                    <option value="<?php echo $r->operator_id ?>"
                                        <?php if($page == 'edit'){ echo($record->operator == $r->operator_id?'selected':''); 
                                            }
                                        ?>><?php echo $r->operator_name ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>
                       <div class="form-group">
                            
                            <label class="col-sm-2 control-label">Status:</label>
                            <div class="col-sm-4">
                                <select name="status" class="form-control validate">
                                    <option value="">--Select Status--</option>
                                    <option value="active" <?php if($page == 'edit'){ echo($record->status == "active"?'selected':''); 
                                            }
                                        ?>>Active</option>
                                    <option value="deactive"  <?php if($page == 'edit'){ echo($record->status == "deactive"?'selected':''); 
                                            }
                                        ?>>Deactive</option>                    
                               </select>

                            </div>
                            <label class="col-sm-2 control-label">Package:</label>
                            <div class="col-sm-4">
                                <select name="package_id" class="form-control validate">
                                   <option value="">--Select Package--</option>
                                   <?php
                                        foreach($package as $r){ 
                                     ?>
                                    <option value="<?php echo $r->package_id ?>"
                                        <?php if($page == 'edit'){ echo($record->package == $r->package_id?'selected':''); 
                                            }
                                        ?>><?php echo $r->package_name ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                              <label class="col-sm-2 control-label">Card ID:</label>
                            <div class="col-sm-4">
                                <input type="text" name="card_id" value="<?php if($page == 'edit'){echo $record->card_id;}?>"  class="form-control validate" placeholder="Card ID Here.." maxlength="15">
                            </div>
                            <label class="col-sm-2 control-label">STB ID:</label>
                            <div class="col-sm-4">
                                <input type="text" name="stb_id" value="<?php if($page == 'edit'){echo $record->stb_id;}?>"  class="form-control validate" placeholder="STB ID Here.." maxlength="15">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <!-- <div class="form-group" id="data_1">
                            <label class="col-sm-2 control-label">Renewal Date:</label> 
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="renewal_date" value="<?php if($page == 'edit'){echo $record->renewal_date;}?>" class="form-control validate">
                                </div>
                            </div>
                            <label class="col-sm-2 control-label">Expiry Date:</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="expiry_date" value="<?php if($page == 'edit'){echo $record->expiry_date;}?>" class="form-control validate">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div> -->
                        <div class="form-group" id="data_1">
                          <label class="col-sm-2 control-label">Installation Date</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="installation_date" value="<?php if($page == 'edit'){echo $record->installation_date;}?>" class="form-control validate" autocomplete="off" onkeydown="return false">
                                </div>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input class="btn btn-primary submit" type="button" value="Save" id="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Show message after insert , update and delete  record Unsuccessfull-->
<?php if($success = $this->session->flashdata('error')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><?php echo $success; ?></strong>
	</div>
<?php } ?>

<?php 
    ob_start();
?>
<script type="text/javascript">
	$(document).ready(function(){
        //using for form validation
        $("#submit").click(function (){ 
            var flag = true;
            $('.validate').each(function(e){          
                if($(this).val().trim() == '' || $(this).length == 0){
                    $(this).css('border','1px solid red');
                    $(this).parent().find('span.error').remove();
                    if(typeof($(this).parent().find('span.error').html()) == 'undefined'){
                        $(this).after('<span class="error">This Field is required</span>');  
                    }   
                    flag = false;   
                }
                else{
                    $(this).removeAttr('style');    
                    $(this).parent().find('span.error').remove();
                    //$("#submit").attr('type','submit');
                }
            });
            if(flag == true){
                $(".submit").attr('type','submit');  
            }else{
                return false;
            }
        });
        //validation for get only charecter value
        $(".char").on("input", function() {
            if ($(this).val().match(/[^A-Za-z\s]/g, '')) {
               $(this).val($(this).val().replace(/[^A-Za-z\s]/g,''));
            }
        });
        //validation for input only numeric value
        $(".mobile").on("input", function() {
            if ($(this).val().match(/[^0-9]/g, '')) {
               $(this).val($(this).val().replace(/[^0-9]/g,''));
            }
        }); 
        //using for datepicker for installation date field
        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format : 'yyyy-mm-dd',  
            });     
    });
</script>
<?php
    $script = ob_get_clean();
    include_once("footer.php");
?>
