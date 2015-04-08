<div class="mainContent ">
<div class="welcomepage"></div>
<div class="welcome-content">
<div class="welcome-head">welcome user</div>
<div class="welcome-body">We're thrilled to have you as part of our family of savvy fashion shoppers. <br> We've placed lots of cool features in your mall so don't forget to hover your mouse over tabs and icons to see what they do. </div>
</div>
</div>
<style>
.welcomepage{
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
	$('.welcomepage').css("height", $(document).height());
	$('.welcomepage').css("width", $(document).width());
})
</script>