<div class="trigger">
	<a href="#" class="sqBtn log-in-btn">+</a>
</div>

<div class="accordion" id="searchOptions">
<?php if ($this->flexi_auth->is_logged_in()){ ?>
	<div class="handle">
		<h3>Mall Directory</h3>
		<span>+</span>
	</div>
	<div class="panel">
		<div class="controlPanel">
			<div>
				<h4>My Account</h4>
				<ul>
					<li><a href="/user.html">Edit My Body Profile</a></li>
					<li><a href="/user/preferences.html">Edit My Preferences</a></li>
				</ul>
			</div>
			<div>
				<h4>My Fashion</h4>
				<ul>
					<li><a href="/mall.html">Shop My Personalised Mall</a></li>
					<li><a href="/user/my-finds.html">View My Finds</a></li>
					<li><a href="/garment/import.html">Add Garment Via URL</a></li>
					<li><a href="/user/my-favorites.html">View Favorites</a></li>
				</ul>
			</div>
			<div>
				<h4>My Styling Boards</h4>
				<ul>
					<li><a href="/styling-board.html">View Styling Boards</a></li>
					<li><a href="/styling-board.html">Create Styling Board</a></li>
					<li><a href="/styling-board.html">View My Styling Boards</a></li>
					<li><a href="/styling-board.html">View My Loved Styling Boards</a></li>
				</ul>
			</div>
			<div>
				<h4>My Learning Center</h4>
				<ul>
					<li><a href="http://pretastyler.com/blog">Visit Style Clinic</a></li>
					<li><a href="http://myprivatestylist.com">View My Private Stylist</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php } else { ?>
<div class="handle">
		<h3>Login / Join Us</h3>
		<span>+</span>
	</div>
	<div class="panel loginPanel">
		<div class="group">
			<div class="col span_10" style="position: relative;">
				<div class="logreghead">
					<h2 id="login-heading">Login</h2>
					<h2></h2>
					<h2 id="register-heading">Join Us</h2>
				</div>
				<div id="login-form">
					<?php  $attlog = array('name' => 'menu_mall_login', 'id' => 'menu_mall_login');echo form_open('menu_mall_login', $attlog); ?>
					<p>Sign in to your account.</p>
					<fieldset>
						<div class="row">
							<label id="error-login"></label>
						</div>
						<div class="row">
							<label>Pretastyler email:</label>
							<div class="icon-user">
								<input id="menu_mall_login_email" type="email"
									placeholder="Type your Prêt à Styler email"
									required="required">
							</div>
						</div>
						<div class="row">
							<label>Pretaslyer password:</label>
							<div class="icon-lock">
								<input id="menu_mall_login_password" type="password"
									placeholder="Type your Prêt à Styler password"
									required="required">
							</div>
						</div>
						<div class="row">
							<label class="checkbox"><input type="checkbox"
								id="menu_mall_login_remember_me"><span>Remember me</span></label>
						</div>
						<div class="row">
							<input type="submit" onclick="" value="Log in" id="login-submit">
							<a href="#">Forgot your password?</a>
						</div>
					</fieldset>
					<?php echo form_close()?>
				</div>
				<div id="register-form">
					<?php  $attreg = array('name' => 'menu_mall_register', 'id' => 'menu_mall_register');echo form_open('menu_mall_register', $attreg); ?>
					<p>Join us by simple steps.</p>
					<fieldset>
						<div class="row">
							<label id="error-register"></label>
						</div>
						<div class="row">
							<label>Your first name:</label>
							<div class="icon-user">
								<input type="text" id="menu_mall_register_fname"
									placeholder="Type your first name" name="first-name"
									required="required">
							</div>
						</div>
						<div class="row">
							<label>Your email:</label>
							<div class="icon-user">
								<input type="email" id="menu_mall_register_email"
									placeholder="Type your email address" name="email"
									required="required">
							</div>
						</div>
						<div class="row">
							<label>Your password:</label>
							<div class="icon-lock">
								<input type="password" id="menu_mall_register_password"
									placeholder="Type your password" name="password"
									required="required">
							</div>
						</div>
						<div class="row">
							<label>Confirm password:</label>
							<div class="icon-lock">
								<input type="password" id="menu_mall_register_rpassword"
									placeholder="Re-type your password" name="confirm-password"
									required="required">
							</div>
						</div>
						<div class="row margintop10">
							<input type="submit" value="Join Us" id="register-submit">
						</div>
					</fieldset>
					<?php echo form_close()?>
				</div>
			</div>
			<div class="col span_14 posRelative">

				<div class="sologan_inadver">
					<a href="/packages.html" class=""><strong>GET STARTED</strong>
						TODAY</a>
				</div>

				<img src="/images/loginadv-highres.png" class="stretch" alt="">
			</div>
		</div>
	</div>
<?php
}
if (TRUE) { ?>
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
						<fieldset class="checkboxes group" id="checkbox-search-colour">
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
	<div class="panel">
		<div id="category-panel">
			<div class="sliderWrap">
				<ul class="items">
					<?php foreach ( $deep_category as $catetory ) { ?>
					<li>
						<label class="category_labels" category_id="<?php print $catetory['category_id'] ?>">
							<input type="checkbox">
							<div><span><?php print $catetory['name']?></span></div>
							<div class="img">
								<span><img src="/images/system/<?php print $catetory['image_path']?>" alt="<?php print $catetory['name']?>" height="192"></span>
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
<?php } ?>
</div>