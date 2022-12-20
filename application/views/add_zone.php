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
        <h2>Add Zone</h2>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Zone</h5>
                </div>
                <div class="ibox-content">

                    <form  method="post" action=" <?php if($page == "edit"){ ?><?php echo base_url(); ?>index.php/Zone_Controller/update_zone/<?php echo $record->zone_id; ?><?php }else{ ?><?php echo base_url(); ?>index.php/Zone_Controller/add_zone<?php } ?>" id="myform" class="form-horizontal form" >
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="<?php if($page == 'edit'){echo $record->zone_name;}?>"  class="form-control char validate" placeholder="Name Here.." maxlength="50">
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

        //validation for get only charecter value
        $(".char").on("input", function() {
            if ($(this).val().match(/[^A-Za-z\s]/g, '')) {
               $(this).val($(this).val().replace(/[^A-Za-z\s]/g,''));
            }
        });
      
    });
</script>
<?php
    $script = ob_get_clean();
    include_once("footer.php");
?>