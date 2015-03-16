<html>
<body>
	<p>Hi <?php echo $first_name;?>,</p>
	<p>Your password for <?php echo $identity;?> has been reset to: <?php echo $new_password;?></p>
	<p>Thank you</p><br />
	<p>Pretastyler Team</p> <br />
	<p>This is a system generated email. Do not reply to this address. If you have any enquires, please send to <?php echo mailto('info@pretastyler.com', 'info@pretastyler.com'); ?>
</body>
</html>