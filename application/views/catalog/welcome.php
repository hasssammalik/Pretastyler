<div class="mainContent">

	<div class="welcomebox">
		<div>
			<div class="welcome-body">
				<h3>WELCOME <?php if ($this->flexi_auth->is_logged_in()){ print strtoupper($first_name); } else {echo ('USER'); } ?></h3>
				
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


</div>
</div>
</div>

<div class="modal"></div>
<div class="popup_modal"></div>
<div class="brandnewmodal"></div>
<div class="popup-box"></div>

<?php 
if( isset( $extraFooterJS )) {
	echo $extraFooterJS;
}
?>
<?php 
if( ENVIRONMENT == 'production') {
	?>	
	<!-- Facebook Conversion Code for Registrations - Pretastyler 1 -->
	<script>(function() {
	  var _fbq = window._fbq || (window._fbq = []);
	  if (!_fbq.loaded) {
	    var fbds = document.createElement('script');
	    fbds.async = true;
	    fbds.src = '//connect.facebook.net/en_US/fbds.js';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(fbds, s);
	    _fbq.loaded = true;
	  }
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6022631669625', {'value':'0.00','currency':'AUD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022631669625&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>


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