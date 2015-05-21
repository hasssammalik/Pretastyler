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