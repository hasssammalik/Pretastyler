<!--<div class="mainContent ">
<div class="welcomepage"></div>
<div class="welcome-content">
<div class="welcome-head">welcome user</div>
<div class="welcome-body">We're thrilled to have you as part of our family of savvy fashion shoppers. <br> We've placed lots of cool features in your mall so don't forget to hover your mouse over tabs and icons to see what they do. </div>
</div>
</div>
-->
<div class="mainContent">

	<div class="infoBox successpage center">
		<div>
			<h3>WELCOME <?php if ($this->flexi_auth->is_logged_in()){ print strtoupper($first_name); } else {echo ('USER'); } ?></h3>
			<div class="welcome-body">
				We're thrilled to have you as part of our family of savvy fashion shoppers. <br><br> We've placed lots of cool features in your mall so don't forget to hover your mouse over tabs and icons to see what they do.
				<p class="center">
					<a class="bkpinkycolor" href="/mall.html">VISIT MALL</a>
				</p>
			</div>
		</div>
	</div>

</div>
<style>
.infoBox{
	position: fixed;
	top: 53%;
	left: 55%;
	width:380px;
	transform: translate(-50%,-50%);
	height: 300px;
	padding: 20px;
	margin: 0px auto;
}
.welcome_full_page .infoBox h3{
	color:#e72775!important;
}
.welcome_full_page{
	background:url('/images/welcome-bg.jpg');
	background-size: cover;
	background-position: 50% 0%;
}
.welcome-body{
	background:white;
	text-align:left;
	margin-top:25px;
	font-size:17px;
	padding:20px;
}
.welcome-body a {
	padding: 5px 40px;

	font-size: 18px;
}

</style>
<script>
$(document).ready(function(){
	$('.welcome_full_page').css("height", $(document).height());
	$('.welcome_full_page').css("width", $(document).width());
})
</script>