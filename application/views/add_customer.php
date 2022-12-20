<?php
	include_once("header.php");
?>
<style type="text/css">
    .error{
        color: red;
    }
</style>
<!--page Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Customer</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Customer</h5>
                </div>
                <div class="ibox-content">

                    <form  method="post" action="<?php if($page == "edit"){ ?><?php echo base_url(); ?>index.php/Customer_Controller/update_customer/<?php echo $record->customer_id; ?><?php }else{ ?><?php echo base_url(); ?>index.php/Customer_Controller/add_customer<?php } ?>" id="myform" class="form-horizontal form" >

                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name:</label>
                            <div class="col-sm-4">
                                <input type="text" name="first_name" value="<?php if($page == 'edit'){echo $record->first_name;}?>"  class="form-control char first_name validate" placeholder="First Name Here.." maxlength="30">

                            </div>
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="last_name" value="<?php if($page == 'edit'){echo $record->last_name;}?>"  class="form-control char last_name validate" placeholder="Last Name Here.." maxlength="30">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Phone:</label>
                            <div class="col-sm-4">
                                <input type="text" name="phone_number" value="<?php if($page == 'edit'){echo $record->phone_number;}?>"  class="form-control numeric phone validate" placeholder="Phone Number Here.." maxlength="13">
                            </div>
                            <label class="col-sm-2 control-label">Mobile:</label>
                            <div class="col-sm-4">
                                <input type="text" name="mobile_no" value="<?php if($page == 'edit'){echo $record->mobile_no;}?>"  class="form-control numeric mobile validate" placeholder="Mobile No Here.." maxlength="13">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                              <label class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" value="<?php if($page == 'edit'){echo $record->email;}?>"  class="form-control validate email" placeholder="Email Address Here.." mazlength="60">
                            </div>
                            <label class="col-sm-2 control-label">Alternate No:</label>
                            <div class="col-sm-4">
                                <input type="text" name="alternate_number" value="<?php if($page == 'edit'){echo $record->alternate_number;}?>"  class="form-control numeric validate alternate" placeholder="Alternate Number Here.." maxlength="15">
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Zone:</label>
                            <div class="col-sm-4">
                                <select name="zone_id" class="form-control validate zone">
                                   <option value="">--Select Zone--</option>
                                   <?php
                                        foreach($zone as $r){ 
                                     ?>
                                    <option value="<?php echo $r->zone_id ?>"
                                        <?php if($page == 'edit'){ echo($record->zid == $r->zone_id?'selected':''); 
                                            }
                                        ?>><?php echo $r->zone_name ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                            <label class="col-sm-2 control-label">City:</label>
                            <div class="col-sm-4">
                                <input type="text" name="city" value="<?php if($page == 'edit'){echo $record->city;}?>"  class="form-control validate city char" placeholder="City Here.." maxlength="60">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Street 1 :</label>
                            <div class="col-sm-4">
                                <textarea type="text" name="street_1" class="form-control validate address" rows="5" placeholder="Address Here.." maxlength="250"><?php if($page == 'edit'){echo $record->street_1;}?></textarea>
                            </div>
                            <label class="col-sm-2 control-label">Street 2 :</label>
                            <div class="col-sm-4">
                                <textarea type="text" name="street_2" class="form-control validate address" rows="5" placeholder="Address Here.." maxlength="250"><?php if($page == 'edit'){echo $record->street_2;}?></textarea>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input class="btn btn-primary submit" type="button" value="<?php if($page == 'edit'){echo 'Update';}else{ echo 'Save'; }?>" id="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    ob_start();
?>
<script type="text/javascript">
	$(document).ready(function(){
        //using for form validation
        $("#submit").click(function (){ 
            var flag = true;
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/; 
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
                if($('.email').val().trim() == '' || $('.email').length == 0){
                    $('.email').css('border','1px solid red');
                    $('.email').parent().find('span.error').remove();
                    if(typeof($('.email').parent().find('span.error').html()) == 'undefined'){
                        $('.email').after('<span class="error">Email Address is required</span>');  
                    }   
                    flag = false;   
                }else if(!expr.test($('.email').val())){
                    $('.email').parent().find('span.error').remove();
                    if(typeof($('.email').parent().find('span.error').html()) == 'undefined'){
                        $('.email').after('<span class="error">Invalid Email address</span>');  
                    }
                    flag = false;
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
        $(".numeric").on("input", function() {
            if ($(this).val().match(/[^0-9]/g, '')) {
               $(this).val($(this).val().replace(/[^0-9]/g,''));
            }
        });   
    });
</script>
<?php
    $script = ob_get_clean();
    include_once("footer.php");
?>
