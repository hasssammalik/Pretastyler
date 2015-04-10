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


</style>
<script>
$(document).ready(function(){
	$('.welcome_full_page').css("height", $(document).height());
	$('.welcome_full_page').css("width", $(document).width());
})
</script>