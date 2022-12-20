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
        <h2>Add User Zone</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add User Zone</h5>
                </div>
                <div class="ibox-content">

                    <form  method="post" action=" <?php if($page == "edit"){ ?><?php echo base_url(); ?>index.php/Userzone_Controller/update_userzone/<?php echo $record->userzone_id; ?><?php }else{ ?><?php echo base_url(); ?>index.php/Userzone_Controller/add_userzone<?php } ?>" id="myform" class="form-horizontal form" >

                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Name :</label>
                            <div class="col-sm-10">
                                <select name="user_id" class="form-control validate">
                                   <option value="">--Select User--</option>
                                   <?php
                                        foreach($user as $r){
                                     ?>
                                    <option value="<?php echo $r->id ?>"
                                        <?php if($page == 'edit'){ echo($record->user_id == $r->id?'selected':''); 
                                            }
                                        ?>><?php echo $r->first_name.' '.$r->last_name ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Zone :</label>
                            <div class="col-sm-10">
                                <select name="zone_id" class="form-control validate">
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
<?php 
    ob_start();
?>
<script type="text/javascript">
    $(document).ready(function(){
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
                    $(".submit").attr('type','submit'); 
                }
            });
            
        });
    });
</script>
<?php
    $script = ob_get_clean();
    include_once("footer.php");
?>