<?php 
include_once('header.php');
?>
<style type="text/css">
    .error{
        color: red;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Add Package</h2>
    </div>
    <div class="col-lg-2"></div>
</div>	
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	    	<div class="ibox float-e-margins">
	    		<div class="ibox-title">
                    <h5>Add Package</h5>
                </div>
                <div class="ibox-content">
                	<form action="<?php echo base_url(); ?>index.php/Package_Controller/<?php echo count($package) > 0 ? 'update_package' : 'insert_package'?>" method="post" class="form-horizontal">
                		<input type="hidden" name="id" value="<?php echo count($package) > 0 ? $package->package_id : ''?>">
                		<div class="form-group">
                            <label class="col-sm-2 control-label">Package Name :</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control char validate" placeholder="Package Name" value="<?php echo count($package) > 0 ? $package->package_name : ''?>" maxlength="50"/>
                            </div>
                        </div>                                          
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Months : </label>
                            <div class="col-sm-10">
                                <select name="months" class="form-control validate">
                                	<option value="">--Select Month--</option>
                                	<option value="1" <?php echo count($package) > 0 && $package->months == 1 ? 'selected'  : ''?>>1</option>
                                	<option value="2" <?php echo count($package) > 0 && $package->months == 2 ? 'selected' : ''?>>2</option>
                                	<option value="3" <?php echo count($package) > 0 && $package->months == 3 ? 'selected' : ''?>>3</option>
                                	<option value="4" <?php echo count($package) > 0 && $package->months == 4 ? 'selected' : ''?>>4</option>
                                	<option value="5" <?php echo count($package) > 0 && $package->months == 5 ? 'selected' : ''?>>5</option>
                                	<option value="6" <?php echo count($package) > 0 && $package->months == 6 ? 'selected' : ''?>>6</option>
                                	<option value="7" <?php echo count($package) > 0 && $package->months == 7 ? 'selected' : ''?>>7</option>
                                	<option value="8" <?php echo count($package) > 0 && $package->months == 8 ? 'selected' : ''?>>8</option>
                                	<option value="9" <?php echo count($package) > 0 && $package->months == 9 ? 'selected' : ''?>>9</option>
                                	<option value="10" <?php echo count($package) > 0 && $package->months == 10 ? 'selected' : ''?>>10</option>
                                	<option value="11" <?php echo count($package) > 0 && $package->months == 11 ? 'selected' : ''?>>11</option>
                                	<option value="12" <?php echo count($package) > 0 && $package->months == 12 ? 'selected' : ''?>>12</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price : </label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control price validate" placeholder="Package Price" value="<?php echo count($package) > 0 ? $package->price : ''?>" maxlength="7">
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-4 col-sm-offset-2">
                            	<input type="button" value="<?php echo count($package) > 0  ? 'Update Package' : 'Add Package' ?>" name="<?php echo count($package) > 0  ? 'update' : 'save'?>" class="btn btn-primary submit" id="submit">
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
        //validation for get only charecter value
        $(".char").on("input", function() {
            if ($(this).val().match(/[^A-Za-z\s]/g, '')) {
               $(this).val($(this).val().replace(/[^A-Za-z\s]/g,''));
            }
        });
        //validation for input only numeric value
        $(".price").on("input", function() {
            if ($(this).val().match(/[^0-9]/g, '')) {
               $(this).val($(this).val().replace(/[^0-9]/g,''));
            }
        });    
    });
</script>
<?php
    $script = ob_get_clean();
    include_once('footer.php');
?>