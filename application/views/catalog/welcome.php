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
			<h3>THANK YOU !</h3>
			<p>
				You have now joined the style revolution.<br>
				Your personalised mall is almost ready for you.<br>
				Click below to complete your body profile<br>
			
			</p>
			
			<p class="center">
				<a class="bkpinkycolor" href="/user.html"> COMPLETE BODY PROFILE </a>
			</p>
			
			<p>
				Completed the body profile already? Lucky You!<br>
				You can go straight to your mall and see what fabulous<br>
				garments the style genie has picked out for you<br>
			</p>
			
			<p class="center">
				<a class="bkgrey" href="/mall.html">VISIT MALL</a>
			</p>
			
		</div>
	</div>

</div>
<style>
.infoBox{
	  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  height: 300px;
  padding: 20px;
  margin: 0px auto;
}
.welcome_full_page{
	background:url('/images/welcome-bg.jpg');
	background-size: cover;
}
.welcome-content{
	position:fixed;
	width:400px;
	margin:200px auto;
}
.welcome-head{
background:white;
text-transform: uppercase;
padding:20px;
}
.welcome-body{
	background:white;
	margin-top:10px;
	padding:20px;
}
</style>
<script>
$(document).ready(function(){
	$('.welcome_full_page').css("height", $(document).height());
	$('.welcome_full_page').css("width", $(document).width());
})
</script>