<?php 
include_once('header.php');
?>
<style type="text/css">
    .error{
        color:red;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Operator</h2>
    </div>
    <div class="col-lg-2"></div>
</div>	
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
                    <h5>Add Operator</h5>
                </div>
                <div class="ibox-content">
                	<form action="<?php echo base_url(); ?>index.php/Operator_Controller/<?php echo count($operator) > 0 ? 'update_operator' : 'insert_operator'?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                		<input type="hidden" name="id" value="<?php echo count($operator) > 0 ? $operator->operator_id : ''?>">
                		<input type="hidden" name="logo_path" value="<?php echo count($operator) > 0 ? $operator->logo : ''?>">
                		<div class="form-group">
                            <label class="col-sm-2 control-label">Operator Name :</label>
                            <div class="col-sm-10">
                                <input type="text" name="operator_name" class="form-control validate" placeholder="Operator Name" value="<?php echo count($operator) > 0 ? $operator->operator_name : ''?>" maxlength="50" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Logo image:</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control validate"/>
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-4 col-sm-offset-2">
                            	<input type="button" value="<?php echo count($operator) > 0  ? 'Update Operator' : 'Add Operator' ?>" name="<?php echo count($operator) > 0  ? 'update' : 'save'?>" class="btn btn-primary submit" id="submit"/>
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
                        $(this).after('<span class="error">Field is required</span>');  
                    }   
                    flag = false;   
                }else{
                    $(this).removeAttr('style');    
                    $(this).parent().find('span.error').remove();
                }
            });
            if(flag == true){
                $(".submit").attr('type','submit');  
            }else{
                return false;
            }
        });
    });
</script>
<?php
    $script = ob_get_clean();
    include_once('footer.php');
?>