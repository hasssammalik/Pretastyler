<?php if ( uri_string() == '' ) { $link_url_to = "index"; } else {  $link_url_to = uri_string(); } ?>

<section style="display:none;">
<div class="newLoginPops">

	<div class="handle">
		<h3 class="authtab-login">LOGIN</h3>
		<h3 class="authtab-signup" style="display:none;">SIGNUP</h3>
		<h3 class="authtab-forgot" style="display:none;">FORGOT PASSWORD</h3>
	</div>

	<div class="panel loginPanel">
		<div class="group">
			<div class="col span_10" style="position:relative;">
				<div id="login-form" return_url="<?php print $link_url_to ?>.html">
					<?php  $attlog = array('name' => 'menu_mall_login', 'id' => 'menu_mall_login');echo form_open('menu_mall_login', $attlog); ?>
					
						<fieldset>
							<div class="row">
								<label id="error-login"></label>
							</div>
							<div class="row">
								<label>Email Address:</label>
								<div class="icon-user"><input id="menu_mall_login_email" type="email" required="required"></div>
							</div>
							<div class="row">
								<label>Password:</label>
								<div class="icon-lock"><input id="menu_mall_login_password" type="password" required="required"></div>
							</div>
							<div class="row">
								<label class=""><input type="checkbox" id="menu_mall_login_remember_me"><span> Remember me</span></label>
							</div>
							<div class="row">
								<input type="submit" onclick="" value="Log in" id="login-submit">
							</div>
							<div class="row">
								<a href="#" class="forgot-link-tab">Forgot your password?</a><br>
								<a href="#" class="register-link-tab">Don't have an account? <span class="b underlinebugbold">SIGN UP NOW</span></a>
							</div>
						</fieldset>
					<?php echo form_close() ?>
				</div>
				<div id="register-form" style="display:none;">
					<?php  $attreg = array('name' => 'menu_mall_register', 'id' => 'menu_mall_register', 'data-user' => 'premium');echo form_open('menu_mall_register', $attreg); ?>
					<p>Sign up as a member and gain your own fashion mall filled with clothes and accessories specifically selected to suit your body.</p>
						<fieldset>
							<div class="row">
								<label id="error-register"></label>
							</div>
							<div class="row">
								<label>Your first name:</label>
								<div class="icon-user"><input type="text" id="menu_mall_register_fname" name="first-name" required="required"></div>
							</div>
							<div class="row">
								<label>Your last name:</label>
								<div class="icon-user"><input type="text" id="menu_mall_register_lname" name="last-name" required="required"></div>
							</div>
							<div class="row">
								<label>Email Address:</label>
								<div class="icon-user"><input type="email" id="menu_mall_register_email" name="email" required="required"></div>
							</div>
							<div class="row">
								<label>Password:</label>
								<div class="icon-lock"><input type="password" id="menu_mall_register_password" name="password" required="required"></div>
							</div>
							<div class="row">
								<label>Confirm password:</label>
								<div class="icon-lock"><input type="password" id="menu_mall_register_rpassword" name="confirm-password" required="required"></div>
							</div>
							<div class="row margintop10">
								<input type="submit" value="START YOUR FREE TRIAL NOW" id="register-submit">
							</div>
							<div class="row">
								<a href="#" class="login-link-tab">Already have an account? <span class="b underlinebugbold">LOGIN NOW</span></a>
							</div>
						</fieldset>
						<?php echo form_close() ?>
				</div>
				<div id="forgot-form" style="display:none;">
					<?php  $attreg = array('name' => 'menu_mall_forgot', 'id' => 'menu_mall_forgot');echo form_open('menu_mall_forgot', $attreg); ?>
					<p>Enter your PrêtàStyler registered email and we will email your a link to create a new password.</p>
						<fieldset>
							<div class="row">
								<label id="error-forgot"></label>
							</div>
							
							<div class="row">
								<label>Email Address:</label>
								<div class="icon-user"><input type="email" id="menu_mall_forgot_email" name="email" required="required"></div>
							</div>
							<div class="row margintop10">
								<input type="submit" value="SEND" id="forgot-submit">
							</div>
							<div class="row">
								<a href="#" class="login-link-tab">Already have an account? <span class="b underlinebugbold">LOGIN NOW</span></a>
							</div>
						</fieldset>
					<?php echo form_close() ?>
				</div>
			</div>
			
		</div>
	</div>
</div>

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

<?php if( !empty( $breadcrumb[0] ) ) { ?>
	<div style="margin-left: 20px;">
		<div class="headPageTitle">
		   <?php echo strtoupper($title) ?>
		</div>
	</div>
<br>
<?php } ?>



