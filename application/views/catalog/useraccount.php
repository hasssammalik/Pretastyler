<div class="mainContent">
	
	<div class="frontWrap">
		<div class="homepage-header useraccountBannerHeight">
			<div class="headerBackground">
				
				<div class="headerBackground-content role-element leadstyle-container center">
					<div class="newLoginPops">

						<div class="handle ">
							<h3 class="authtab-login">LOGIN</h3>
							<h3 class="authtab-forgot" style="display:none;">FORGOT PASSWORD</h3>
						</div>

						<div class=" loginPanel">
							<div class="group">
								<div class="col" style="position:relative;">
								<?php 

									$link_url_to = '/mall.html';

									if ( empty( $_GET['returnurl'] ) ) {
										if( !empty( $_SERVER['HTTP_REFERER'] )){
											if ( strpos( $_SERVER['HTTP_REFERER'], 'pretastyler.com' ) !== false ) 
											{ 
												$link_url = $_SERVER['HTTP_REFERER'];
												$link_url = explode( 'pretastyler.com', $link_url );
												$link_url_to = $link_url_to[1];

											}
										} 
									} else {
										$link_url_to = $_GET['returnurl'];
									}

								?>
									<div id="login-form" return_url="<?php print $link_url_to ?>">
										<?php  $attlog = array('name' => 'menu_mall_login', 'id' => 'menu_mall_login');echo form_open('/useraccount/login.html', $attlog); ?>
										
											<fieldset>
												<div class="row">
													<label id="error-login"></label>
												</div>
												<div class="row">
													<label>Email Address:</label>
													<div class="icon-user"><input id="menu_mall_login_email" type="email" required="required"></div>
												</div>
												<div class="row">
													<label>Password:</label>
													<div class="icon-lock"><input id="menu_mall_login_password" type="password" required="required"></div>
												</div>
												<div class="row">
													<label class="remember-label"><input type="checkbox" id="menu_mall_login_remember_me"><span> Remember me</span></label>
												</div>
												<div class="row">

													<div class="fbloginbutton right mousehand" id="fbloginbuttonIcon" onclick="fb_login();">Login with Facebook</div>
													<input type="submit" onclick="" value="Log in" id="login-submit"> 

												</div>
												<div class="row">
													<a href="#forget-password" class="forgot-link-tab">Forgot your password?</a><br>
													<a href="/index.html#profile">Don't have an account? <span class="b underlinebugbold">SIGN UP NOW</span></a>
												</div>
											</fieldset>
										<?php echo form_close() ?>
									</div>

									<div id="forgot-form" style="display:none;">
										<?php  $attreg = array('name' => 'menu_mall_forgot', 'id' => 'menu_mall_forgot');echo form_open('/index.html', $attreg); ?>
										<p>Enter your PrêtàStyler registered email and we will email your a link to create a new password.</p>
											<fieldset>
												<div class="row">
													<label id="error-forgot"></label>
												</div>
												
												<div class="row">
													<label>Email Address:</label>
													<div class="icon-user"><input type="email" id="menu_mall_forgot_email" name="email" required="required"></div>
												</div>
												<div class="row margintop10">
													<input type="submit" value="SEND" id="forgot-submit">
												</div>
												<div class="row">
													<a href="#login" class="login-link-tab">Already have an account? <span class="b underlinebugbold">LOGIN NOW</span></a>
												</div>
											</fieldset>
										<?php echo form_close() ?>
									</div>
								</div>
								
							</div>
						</div>
					</div>

				</div>
				
			</div>
			
		</div>

	</div>

</div>
<div class="modal"></div>
<div class="popup_modal"></div>

<footer>
		<ul>
			<li><a href="#">BROWSER EXTENSION</a>|</li>
			<li><a href="/terms.html">TERMS</a>|</li>
			<li><a href="/our-story.html">OUR STORY</a>|</li>
			<li><a href="/contact-us.html">CONTACT</a>|</li>
			<li><a href="/retailer.html">RETAILERS</a></li>
		</ul>
		<ul class="social">
			<li><a href="https://www.facebook.com/PrestaStyle" class="fb" target="_blank"><i class="icon-facebook"></i></a></li>
			<li><a href="https://twitter.com/YourUniqueStyle" class="tw" target="_blank"><i class="icon-twitter"></i></a></li>
			<li><a href="https://www.pinterest.com/areinten/" class="pin" target="_blank"><i class="icon-pinterest"></i></a></li>
			<li><a href="https://plus.google.com/+Pretastyler" rel="publisher">Google+</a></li>
			
		</ul>
		
	</footer>
</div>

</div>

</div>

</div>
</div>

</div>


<div class="modal"></div>
<div class="popup_modal"></div>

<?php 
	if( ENVIRONMENT == 'production') {
	?>

	<script type="text/javascript">
		setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
		a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
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

	<script type='text/javascript'>
		
		window.__wtw_lucky_site_id = 33872;
		(function() {
			var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
			wa.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://cdn') + '.luckyorange.com/w.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
		})();
	</script>
	
<?php } ?>
<div id="fb-root"></div>
<script type='text/javascript'>

window.fbAsyncInit = function() {
    FB.init({
      appId      : '416574138523788',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.3'
    });
	
};

function fb_login(){
	$( "#error-login" ).html(" ");
    FB.login(function(response) {

        if (response.status === 'connected') {
            FB.api('/me', function(response) {
               login_with_facebook( response.id, response.email, response.first_name, response.last_name, response.verified );
            });

        } else {
            $( "#error-login" ).html("Facebook login Cancelled.");
        }
    }, {
        scope: 'publish_stream,email'
    });
}

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

</script>

<div class="modal"></div>
<div class="popup_modal"></div>
<div class="brandnewmodal"></div>
<div class="popup-box"></div>

</body>
</html>