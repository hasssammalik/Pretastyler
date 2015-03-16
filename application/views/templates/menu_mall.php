<?php if ( uri_string() == '' ) { $link_url_to = "index"; } else {  $link_url_to = uri_string(); } ?>
<div class="trigger topAccordionMenuShower <?php // if($title == 'Home') { print 'hidden'; } ?>" id="topAccordionMenuShowerOne">
	<a href="#" class="sqBtn log-in-btn"><img src="/images/pinkbutton.png" width="42px"></a>
</div>

<div class="accordion topAccordionMenu <?php // if($title == 'Home') { print 'hidden'; } ?>" id="searchOptions">
<?php if ($this->flexi_auth->is_logged_in()){ ?>
	<div class="handle"><h3>Mall Directory</h3><span>+</span></div>
	<div class="panel">
		<div class="controlPanel">
			<div>
				<h4>Account</h4>
				<ul>
					<li><a href="/user.html" title="Update or edit your body profile">Edit Profile</a></li>
					<li><a href="/user.html" title="Your contact details, sizes, weight, height and age.">Edit Account details</a></li>
					<!-- <li><a href="/user/preferences.html">Edit Preferences</a></li> -->
				</ul>
			</div>
			<div>
				<h4>Fashion</h4>
				<ul><?php echo form_open(); echo form_close();?>
					<li><a href="/mall.html">Personalised Mall</a></li>
					<li><a href="/user/my-finds.html" title="Items you have assessed from other websites">My Finds</a></li>
					<li><a href="/user/my-wishlists.html" title="Items you have saved as favorites">My Wishlist</a></li>
					<li><a href="/user/my-wardrobe.html" title="Items you have saved after a purchase. Premium membership required.">My Wardrobe</a></li>
					<li><a href="/user/my-dressing-room.html" title="Items saved from websites for you to assess later. Premium membership required.">My Dressing Room</a></li>
					<li><a href="#" class="expend-url-click" title="Insert url of garment from another website you wish to assess – an alternative to using the clip-it extension. NOTE: download ‘clip-it’ for faster functionality">Assess Garment Via URL</a></li>
					<li class="url-area" style="display:none;"><input type="email" placeholder="Paste your URL here..."><a class="button start-assessment-click" href="#">Start</a></li>
				</ul>
			</div>
			<div>
				<h4>INSPIRATION BOARDS</h4>
				<ul>
					<li><a href="/boards" title="Inspiration Boards. NOTE: become a member to see personalized boards">Inspiration Boards</a></li>
					<li><a href="/boards/create" title="Create an inspiration Board">Create Inspiration Board</a></li>
					<li><a href="/boards/my" title="Boards your have created">My Inspiration Boards</a></li>
					<li><a href="/boards/loved" title="Boards you have saved as a favorite">My Favorite Inspiration Boards</a></li>
				</ul>
			</div>
			<div>
				<h4>Learning Center</h4>
				<ul>
					<li><a href="http://pretastyler.com/blog" title="Learn about style and fashion or fix your fashion dilemmas">Style Clinic</a></li>
					<li><a href="http://myprivatestylist.com" title="Premium member’s personal style program">My Private Stylist</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php } else { ?> 
<div class="handle"><h3 class="authtab-login">LOGIN</h3><h3 class="authtab-signup" style="display:none;">SIGNUP</h3><h3 class="authtab-forgot" style="display:none;">FORGOT PASSWORD</h3><span>+</span></div>
	<div class="panel loginPanel">
		<div class="group">
			<div class="col span_10" style="position:relative;">
				<div id="login-form" return_url="<?php print $link_url_to ?>.html">
					<?php  $attlog = array('name' => 'menu_mall_login', 'id' => 'menu_mall_login');echo form_open('menu_mall_login', $attlog); ?>
					
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
								<label class=""><input type="checkbox" id="menu_mall_login_remember_me"><span> Remember me</span></label>
							</div>
							<div class="row">
								<input type="submit" onclick="" value="Log in" id="login-submit">
							</div>
							<div class="row">
								<a href="#" class="forgot-link-tab">Forgot your password?</a><br>
								<a href="#" class="register-link-tab">Don't have an account? <span class="b underlinebugbold">SIGN UP NOW</span></a>
							</div>
						</fieldset>
					<?php echo form_close() ?>
				</div>
				<div id="register-form" style="display:none;">
					<?php  $attreg = array('name' => 'menu_mall_register', 'id' => 'menu_mall_register', 'data-user' => 'premium');echo form_open('menu_mall_register', $attreg); ?>
					<p>Sign up as a member and gain your own fashion mall filled with clothes and accessories specifically selected to suit your body.</p>
						<fieldset>
							<div class="row">
								<label id="error-register"></label>
							</div>
							<div class="row">
								<label>Your first name:</label>
								<div class="icon-user"><input type="text" id="menu_mall_register_fname" name="first-name" required="required"></div>
							</div>
							<div class="row">
								<label>Your last name:</label>
								<div class="icon-user"><input type="text" id="menu_mall_register_lname" name="last-name" required="required"></div>
							</div>
							<div class="row">
								<label>Email Address:</label>
								<div class="icon-user"><input type="email" id="menu_mall_register_email" name="email" required="required"></div>
							</div>
							<div class="row">
								<label>Password:</label>
								<div class="icon-lock"><input type="password" id="menu_mall_register_password" name="password" required="required"></div>
							</div>
							<div class="row">
								<label>Confirm password:</label>
								<div class="icon-lock"><input type="password" id="menu_mall_register_rpassword" name="confirm-password" required="required"></div>
							</div>
							<div class="row margintop10">
								<input type="submit" value="START YOUR FREE TRIAL NOW" id="register-submit">
							</div>
							<div class="row">
								<a href="#" class="login-link-tab">Already have an account? <span class="b underlinebugbold">LOGIN NOW</span></a>
							</div>
						</fieldset>
						<?php echo form_close() ?>
				</div>
				<div id="forgot-form" style="display:none;">
					<?php  $attreg = array('name' => 'menu_mall_forgot', 'id' => 'menu_mall_forgot');echo form_open('menu_mall_forgot', $attreg); ?>
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
								<a href="#" class="login-link-tab">Already have an account? <span class="b underlinebugbold">LOGIN NOW</span></a>
							</div>
						</fieldset>
					<?php echo form_close() ?>
				</div>
			</div>
			<div class="col span_14 posRelative minheight165">
				<div class="sologan_inadverDiv">
					<div class="sologan_inadverTop">
							<b>PUT PRÊTÀSTYLER TO WORK FOR YOU</b><br>
							Create your free body and preference profile and 
							let us do the hard work. We'll fill your fashion mall with clothes that are perfect for you and your figure. <br>
							<b>TOO EASY! START YOUR FREE TRIAL</b>
					</div>
					<div class="">
						<a href="/packages.html" class="sologan_inadver"><strong>FIND OUT MORE</strong></a>
					</div>
				</div>
				
				<img src="/images/new_login_banner.jpg" class="stretch" alt="">
			</div>
		</div>
	</div>

	
<section style="display:none;">

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="payforpremiumuser">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="T9XV53PTEPHN8">
	<input type="hidden" name="bn" value="Pretastyler_Membership_WPS_AU">
	<input type="hidden" name="custom" value="<?php $username = $this->flexi_auth->get_user_identity();	echo $username ? $username : '';?>" id="custompayval">
	<input type="submit" border="0" name="submit" alt="PayPal — The safer, easier way to pay online." value="SIGNUP FOR PREMIUM" style="height: 70px;background-color: #f16ca1; font-style: italic;" id="payforpremiumuserbtn">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>

<script type="text/javascript">
	$("#menu_mall_register_email").on("change", function() { $("#custompayval").val( $(this).val()); });
</script>

</section>
	
<?php } 
if (explode('/',uri_string())[0] == 'mall') {?>
    <?php /* ?>
	<div class="handle">
		<h3>Quick Search</h3>
		<span>+</span>
	</div>
	
	<div class="panel quickSearch">
		<div>
			<form>
				<div class="group">
					<div class="col span_7">
						<div class="group">
							<div class="col span_24">
								<label>Search:</label> <input type="text" name="searchTerm"
									placeholder="Type your keywords" id="input-search-keyword">
							</div>
						</div>
						<div class="group">
							<div class="col span_10">
								<label>Show:</label>
								<fieldset class="checkboxes">
									<label><input type="checkbox" checked><span>Trending</span></label>
									<label><input type="checkbox"><span>Latest</span></label>
								</fieldset>
							</div>
							<div class="col span_14">
								<label>Garment Type:</label> <select id="garment-type-select">
									<option value="0">Please Select</option>
									<?php foreach ($categories as $row) { ?><option
										value="<?php print $row['category_id']?>"><?php print $row['name']?></option><?php }?>
								</select>
							</div>
						</div>
					</div>
					<div class="col span_4">
						<label>Occasions:</label>
						<fieldset class="checkboxes" id="checkbox-search-occasion">
							<?php foreach ($occasions as $row) { ?>
							<label><input type="checkbox"
								value="<?php print $row['occasion_id'] ?>"><span
								title="<?php print $row['description'] ?>"><?php print $row['name'] ?></span></label>
							<?php } ?>
						</fieldset>
					</div>
					<div class="col span_8">
						<label>Colors:</label>
						<fieldset class="checkboxes group" id="scheckbox-search-colour">
							<div class="col span_12">
								<?php foreach ($colours1 as $row) { ?>
								<label><input type="checkbox"
									value="<?php print $row['colour_id'] ?>"><span><img
										src="/images/colours/<?php print $row['image_path'] ?>"
										width="11" height="11" alt="<?php print $row['name'] ?>"><?php print $row['name'] ?></span></label>
								<?php } ?>
							</div>
							<div class="col span_12">
								<?php foreach ($colours2 as $row) { ?>
								<label><input type="checkbox"
									value="<?php print $row['colour_id'] ?>"><span><img
										src="/images/colours/<?php print $row['image_path'] ?>"
										width="11" height="11" alt="<?php print $row['name'] ?>"><?php print $row['name'] ?></span></label>
								<?php } ?>
							</div>
						</fieldset>
					</div>
					<div class="col span_5">
						<label>Price range:</label>
						<div class="nouisliderWrap">
							<div class="nouislider"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="handle"><h3>Targeted Search</h3><span>+</span></div>
	<div class="panel targetcustomslides">
		<div id="category-panel">
			<div class="sliderWrap ">
				<ul class="items">
					<?php foreach ( $deep_category as $category ) { ?>
					<li>
						<label class="category_labels" category_id="<?php print $category['category_id'] ?>">
							<input type="checkbox">
							<div><span><?php print $category['name']?></span></div>
							<div class="img">
								<span><img src="/images/system/<?php print $category['image_path']?>" alt="<?php print $category['name']?>" height="192"></span>
								<span class="overlay"><span><span><i class="icon-check"></i></span></span></span>
							</div>
						</label>
					</li>
					<?php } ?>
				</ul>
				<div class="pager"></div>
			</div>
		</div>

		<div class="advanced" style="display:none">
			<div class="options accordion">
			</div>
			<div class="itemsWrap">
				<div class="sliderWrap">
					<ul class="items">
					</ul>
					<div class="pager"></div>
				</div>
			</div>
			<div class="next-button">Skip
			</div>
		</div>
	</div>
	<?php */ ?>
<?php } ?>
</div>
<?php if( !empty( $breadcrumb[0] ) ) { ?>
<div style="margin-left: 20px;">
<div class="headPageTitle">
   <?php echo strtoupper($title) ?>
</div>
</div>
<br>
<?php } ?>



