
<section style="display:none;">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="payforpremiumuser">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="T9XV53PTEPHN8">
		<input type="hidden" name="bn" value="Pretastyler_Membership_WPS_AU">
		<input type="hidden" name="custom" value="<?php $username = $this->flexi_auth->get_user_identity();	echo $username ? $username : '';?>" id="custompayval">
		<input type="submit" border="0" name="submit" alt="PayPal — The safer, easier way to pay online." value="SIGNUP FOR PREMIUM" style="height: 70px;background-color: #f16ca1; font-style: italic;" id="payforpremiumuserbtn">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
	</form>

	<script type="text/javascript">
		$("#menu_mall_register_email").on("change", function() { $("#custompayval").val( $(this).val()); });
	</script>

</section>
<?php
echo form_open(); echo form_close();

 if( !empty( $breadcrumb[0] ) ) { ?>
	<div>
		<h1 class="headPageTitle">
		   <?php echo strtoupper($title) ?>
		</h1>
	</div>
<br>
<?php } ?>
