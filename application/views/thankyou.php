<div class="mainContent">

	<div class="infoBox successpage center">
		<div>
			<h3>THANK YOU !</h3>
			<p>
				<br>
				We will let you know about our every new products.			
			</p>
			
			
			<p class="center">
				Submitting...
			</p>
			
		</div>
	</div>
<div class="subscriber-form" style="display:none;">
<?php $id=array('id'=>"myForm");echo form_open('https://om185.infusionsoft.com/app/form/process/01ae3785a5fde11d3e8a29fd1f6e9400',$id); ?> 
    <input name="inf_form_xid" type="hidden" value="01ae3785a5fde11d3e8a29fd1f6e9400" />
    <input name="inf_form_name" type="hidden" value="Indicate interest" />
    <input name="infusionsoft_version" type="hidden" value="1.37.0.46" />
    <div class="input-fields">
	<div style="width:100%">
	<div class="infusion-field" style="float:left; "> 
       <!-- <label for="inf_field_FirstName">First Name: </label> -->
        <input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" style="width:105px;" value="<?php echo $this->input->post('inf_field_FirstName');?>"/>
    </div>
	
    <div class="infusion-field" style="float:left;margin-left:5px;">
        <!-- <label for="inf_field_LastName">Last Name *</label> -->
        <input class="infusion-field-input-container" id="inf_field_LastName" name="inf_field_LastName" value="<?php echo $this->input->post('inf_field_LastName');?>" type="text" style="width:105px;"/>
    </div>
	</div>
    <div class="infusion-field">
        <!-- <label for="inf_field_Email">Email: </label> -->
        <input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" value="<?php echo $this->input->post('inf_field_Email');?>"  style="width:215px;"/>
    </div>
	</div>
    <div class="infusion-submit">
       <button style=""><b style="color:white; font-family: 'Open Sans', sans-serif;font-size:16px;">GET YOUR'S</b> <br><span style="color:white;font-size:16px;"> TODAY!</span></button>
    </div>
<?php form_close() ?>
<script type="text/javascript" src="https://om185.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=7cdbebcae7b8c4b1866b9ff08971aec0"></script>
</div>
<script>
$(document).ready(function(){
	
setTimeout(function() {
	$('#myForm').submit();}, 1500);
})

</script>