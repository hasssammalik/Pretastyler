<article class="panels">
	<div class="grid">
		<div class="span_20 maxwid720 PageGreyInput loginPanel Forget_old_password" style="padding: 10px;">

			<?php  $attreg = array('name' => 'user_reset_password', 'id' => 'user_reset_password');echo form_open('user_reset_password', $attreg); ?>
			<p>Please enter your new password.</p>
			<label id="error-forget-password"></label>
			<div class="left widhalf">
				<div><strong>Your new password:</strong></div>
				<input type="password" id="menu_mall_reset_password" placeholder="Password" name="password" required="required">
				<input type="password" id="menu_mall_reset_rpassword" placeholder="Confirm password" name="rpassword" required="required">
			</div>
			
			<div class="clear"></div>
			
			<div class="forgotsubpage">
				 <input type="submit" name="forgotpasssubmit" value="RESET PASSWORD">
			</div>

			<?php echo form_close() ?>

			<div class="clear"></div>
			
		</div>
	</div>
</article>
