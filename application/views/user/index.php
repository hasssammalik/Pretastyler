<input type="hidden" value="<?php print $user_selection?>" id="answers"> <!--Here are the answers so far-->
<?php echo form_open(); echo form_close();?>
<form class="userProfile">
	<fieldset id="fieldset1">
		<div class="sectionHeader">
			<div><h2>Account <strong>Details </strong></h2><div class="accountDetails editSection right i u b mousehand" data-action="edit">EDIT</div></div>
		</div>
		<div class="llist">
			<div class="row">
				<div class="col span_11">
					<label>First name:</label>
					<input type="text" name="fname" value="<?php print $user_info['first_name']?>" class="first-name accountDetailsDisabled" disabled="disabled">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Last name:</label>
					<input type="text" name="lname" value="<?php print $user_info['last_name']?>" class="last-name accountDetailsDisabled" disabled="disabled">
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Email:</label>
					<input type="email" name="email" value="<?php print $user_email?>" class="" disabled="disabled">
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11 group">
					<div class="col span_12">
						<label>Country:</label>
						<select name="country" class="country-select accountDetailsDisabled" disabled="disabled">
							<option value="0">Please Select</option>
							<?php foreach ($countries as $country) {?>
							<option value="<?php print $country['country_id']?>" <?php print ($country['default'] == 1)?'selected="selected"':'' ?>><?php print $country['country']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col span_6 leftMargin4">
						<label>ZipCode:</label>
						<input type="text" name="zip" value="<?php print $user_info['zipcode']?>" class="zipcode accountDetailsDisabled" disabled="disabled">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11 hidden  accountDetailsDisabledagree">
					<label class=""><input type="checkbox" name="agree" required="required" class="iagreecheckbox" id="iagreecheckbox" checked="checked"><span> &nbsp; I agree to the <a href="/terms.html">Terms of Use</a>. </span></label>
				</div>
			</div>
		</div>
	</fieldset>
	
	<fieldset id="fieldset2">
		<div class="sectionHeader">
			<div><h2>General <strong>features</strong></h2><div class="generalFeatures editSection right i u b mousehand" data-action="edit">EDIT</div></div>
		</div>
		<div class="llist">
			
			<h3>Select your <strong>'standard'/'usual'/'normal'</strong> size for:</h3>
			<div class="row">
				<div class="col span_11">
					<label>Dresses/Swimwear:</label>
					<div class="group">
						<div class="col span_6">
							<select class="ovr-select generalFeaturesDisabled" size_type="OVR" disabled="disabled">
								<?php foreach($size_info['OVR']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="ovr-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['OVR']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Shorts/Jeans/Skirts:</label>
					<div class="group">
						<div class="col span_6">
							<select class="bot-select generalFeaturesDisabled" size_type="BOT" disabled="disabled">
								<?php foreach($size_info['BOT']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="bot-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['BOT']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Tops/Jackets:</label>
					<div class="group">
						<div class="col span_6">
							<select class="top-select generalFeaturesDisabled" size_type="TOP" disabled="disabled">
								<?php foreach($size_info['TOP']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="top-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['TOP']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Shoes/Footwear:</label>
					<div class="group">
						<div class="col span_6">
							<select class="sho-select generalFeaturesDisabled" size_type="SHO" disabled="disabled">
								<?php foreach($size_info['SHO']['regions'] as $region) { ?>
								<option value="<?php print $region['name'] ?>" <?php print $region['selected']?'selected="selected"':'' ?>><?php print $region['name'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col span_10 leftMargin4">
							<select class="sho-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['SHO']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col span_11">
					<label>Hats:</label>
					<!-- <div class="group"> 
						<div class="col span_11"> -->
							<select class="hat-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['HAT']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						<!-- </div>
					</div> -->
				</div>
				<div class="col span_2">&nbsp;</div>
				<div class="col span_11">
					<label>Bangles/Bracelets:</label>
					<!-- <div class="group"> 
						<div class="col span_11"> -->
							<select  class="wri-size-select generalFeaturesDisabled" disabled="disabled">
								<?php foreach($size_info['WRI']['size_list'] as $size) { ?>
								<option value="<?php print $size['value'] ?>" <?php print $size['selected']?'selected="selected"':'' ?>><?php print $size['name'] ?></option>
								<?php } ?>
							</select>
						<!-- </div>
					 </div> -->
				</div>
			</div>
		</div> 
	</fieldset>
	<br>
	<fieldset id="profilePanel" class="fixedOptions" style="z-index:4;background:white;padding-top:45px">
		<div class="sectionHeader">
			<div><h2>My Body <strong>Features</strong></h2><div class="body editSection right i u b mousehand" id="bodyFeatures" data-action="edit">EDIT</div></div>
		</div>
		
	</fieldset>
	
	
	<br>
	
</form>


<?php 
if( ENVIRONMENT == 'production') {
?>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

<?php } ?>

