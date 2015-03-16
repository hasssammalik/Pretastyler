<?php
$email_field = array(
		'name'			=> 'email',
		'class'			=> 'form-control',
		'placeholder'	=> 'Email',
);
$password_field = array(
		'name'			=> 'password',
		'class'			=> 'form-control',
		'placeholder'	=> 'Password',
);
$remember_me_field = array(
		'name'		=> 'remember_me',
		'checked'	=> TRUE,
);
$submit_field = array(
		'class'		=> 'btn bg-olive btn-block',
);?>
		<div class="form-box" id="login-box">
			<div class="header">Sign In</div>
			<?php echo form_open('admin/login'); ?>
				<div class="body bg-gray">
					<div class="form-group">
					<?php if (!empty($error)) { print $error; } ?>
					</div>
					<div class="form-group">
						<?php echo form_input($email_field); ?>
					</div>
					<div class="form-group">
						<?php echo form_password($password_field); ?>
					</div>		  
					<div class="form-group">
						<?php echo form_checkbox($remember_me_field);?> Remember me
					</div>
				</div>
				<div class="footer">
					<button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
				</div>
			<?php echo form_close();?>
		</div>