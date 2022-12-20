<?php
	include_once("header.php");
?>
<style type="text/css">
	.error{
		color: red;
	}
</style>
<!-- page  Header-->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add User</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add User</h5>
                </div>
                <div class="ibox-content">
                    <form action="<?php if($page == "edit"){ ?><?php echo base_url(); ?>index.php/User_Controller/update_user/<?php echo $record->id; ?><?php }else{ ?><?php echo base_url(); ?>index.php/User_Controller/add_user<?php } ?>" method="post" id="myform" class="form-horizontal form" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Select Type :</label>
                            <div class="col-sm-4">
                                <select class="form-control validate" name="type">
                                    <option value="">--Select Type--</option>
                                    <option value="admin" <?php if($page == 'edit'){ echo($record->type == "admin" ?'selected':''); 
                                            }?>>Admin</option>
                                    <option value="user" <?php if($page == 'edit'){ echo($record->type == "user"?'selected':''); 
                                            }?>>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name :</label>
                            <div class="col-sm-4">
                                <input type="text" name="first_name" value="<?php if($page == 'edit'){echo $record->first_name;}?>"  class="form-control validate char first_name" placeholder="First Name Here.." maxlength="30">
                            </div>
                            <label class="col-sm-2 control-label">Last Name :</label>
                            <div class="col-sm-4">
                                <input type="text" name="last_name" value="<?php if($page == 'edit'){echo $record->last_name;}?>"  class="form-control validate chars last_name" placeholder="Last Name Here.." maxlength="30">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email :</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" value="<?php if($page == 'edit'){echo $record->email;}?>"  class="form-control validate email" placeholder="Email Address Here.." maxlength="60">
                            </div>
                            <label class="col-sm-2 control-label">Password :</label>
                            <div class="col-sm-4">
                                <input type="password" name="password" value="<?php if($page == 'edit'){echo $record->password;}?>"  class="form-control validate password" placeholder="Password Here.." maxlength="30">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">City :</label>
                            <div class="col-sm-4">
                                <input type="text" name="city" value="<?php if($page == 'edit'){echo $record->city;}?>"  class="form-control validate char city" placeholder="City Here.." maxlength="60">
                            </div>
                             <label class="col-sm-2 control-label">Country :</label>
                            <div class="col-sm-4">
                                <input type="text" name="country" value="<?php if($page == 'edit'){echo $record->country;}?>"  class="form-control validate char country" placeholder="Country Here.." maxlength="60">
                            </div>
                          
                        </div>
                        <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Street 1 :</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control validate street_1" placeholder="Address Here.." name="street_1" maxlength="250"><?php if($page == 'edit'){echo $record->street_1;}?></textarea>
                                </div>
                                <label class="col-sm-2 control-label">Street 2 :</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control validate street_2" placeholder="Address Here.." name="street_2" maxlength="250"><?php if($page == 'edit'){echo $record->street_2;}?></textarea>
                                </div>
                            </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                             <label class="col-sm-2 control-label">Postal Code :</label>
                            <div class="col-sm-4">
                                <input type="text" name="postal_code" value="<?php if($page == 'edit'){echo $record->postal_code;}?>"  class="form-control validate numeric postal_code" placeholder="Postal Code Here.." maxlength="15">
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