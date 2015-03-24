							<footer>
								<ul>
									<li><a href="#">BROWSER EXTENSION</a>|</li>
									<li><a href="/terms.html">TERMS</a>|</li>
									<li><a href="/our-story.html">OUR STORY</a>|</li> 
									<li><a href="/contact-us.html">CONTACT</a>|</li>
									<li><a href="/retailer.html">RETAILERS</a></li>
								</ul>
								<ul class="social">
									<li><a href="http://www.facebook.com/myprivatestylist" class="fb"><i class="icon-facebook"></i></a></li>
									<li><a href="https://twitter.com/YourUniqueStyle" class="tw"><i class="icon-twitter"></i></a></li>
									<li><a href="http://www.pinterest.com/areinten/" class="pin"><i class="icon-pinterest"></i></a></li>
								</ul>
								
							</footer>
							
						</div>
					</div>
				</div>
				
					
				
				
			</div>
		<?php if(!isset($extraFooter)) { ?>
		</div>
		
	</div> <?php }?>
<div class="modal"></div>
<div class="popup_modal"></div>
<div class="newLoginPops" style="display: none;">

	<div class="handle">
		<h3 class="authtab-login">LOGIN</h3>
		<h3 class="authtab-signup" style="display:none;">SIGNUP</h3>
		<h3 class="authtab-forgot" style="display:none;">FORGOT PASSWORD</h3>
	</div>

	<div class=" loginPanel">
		<div class="group">
			<div class="col" style="position:relative;">
			<?php if ( uri_string() == '' ) { $link_url_to = "index"; } else {  $link_url_to = uri_string(); } ?>
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
<?php 
	if( isset( $extraFooterJS )) {
		echo $extraFooterJS;
	}
?>
<?php 
if( ENVIRONMENT == 'production') {
?>	
<script type='text/javascript'>

window.__wtw_lucky_site_id = 33872;
    (function() {
        var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
        wa.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://cdn') + '.luckyorange.com/w.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
    })();
</script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='//v2.zopim.com/?2DZTXFz3pU0P9dFbK9NzPb2IBE2aAE8b';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
<?php } ?>
</body>
</html>