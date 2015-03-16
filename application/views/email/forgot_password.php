<html>
<body>
	<p>Hi <?php echo $first_name;?>,</p>
	<p>You have requested to reset your password for PrêtàStyler. Please click <?php echo anchor('user/forget-password/'.$user_id.'/'.$forgotten_password_token, 'this link');?> to reset your password. If it's not a link, please copy the url below to your browser address bar.</p>
	<p><?php echo site_url('user/forget-password/'.$user_id.'/'.$forgotten_password_token);?></p>
	<p>Thank you</p><br />
	<p>Pretastyler Team</p> <br />
	<p>This is a system generated email. Do not reply to this address. If you have any enquires, please send to <?php echo mailto('info@pretastyler.com', 'info@pretastyler.com'); ?></p>
</body>
</html>