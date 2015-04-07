<?php echo form_open('', array('class'=>'topquicksearch', 'id'=>'topquicksearch', 'name'=>'topquicksearch')); ?>
    
    <div class="quickSearch quicksearchtabtop">
        
        <input type="text" name="searchTerm" placeholder="Search..." id="input-search-keyword" class="quicksearchinputtab">
        <input type="image" name="Quick Search" id="quicksearch" src="/images/search_icon.png" class="quicksearchimagetab" width="40">
    
    </div>
    <div class="leftContent quickSearch left">
        <div class="group">
    		
			<div class="col widfulled">
				<label>REFINE BY:</label><span class="resetRefine mousehand">Clear All</span><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<div class="refined sectionTogglediv" id="refinedby">
					<ul class="refinelist">
						<li class="price"><div>Price (0 - 1000)</div> </li>
						<?php if( !empty( $first_name )) { ?>
							<li class="star"><div>4 ☆</div> <a class="closesearchx" data-type="star" data-set="4">x</a></li>
							<li class="star"><div>5 ☆</div> <a class="closesearchx" data-type="star" data-set="5">x</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<hr class="widfulled">
			
			<?php if ($this->flexi_auth->is_logged_in()){ ?>
				<div class="col widfulled">
					<label>RATING:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
					<div class="QuickRating search-quick-rating quick-star sectionTogglediv" id="quick-rating-search">
						<span class="starclick mousehand lowclassstar" data-val="1" title="Avoid">☆<br><span class="star-visible">1</span></span>
						<span class="starclick mousehand lowclassstar" data-val="2" title="Maybe">☆<br><span class="star-visible">2</span></span>
						<span class="starclick mousehand lowclassstar" data-val="3" title="OK">☆<br><span class="star-visible">3</span></span>
						<span class="starclick mousehand active" data-val="4" title="Good">☆<br><span class="star-visible">4</span></span>
						<span class="starclick mousehand active" data-val="5" title="Great">☆<br><span class="star-visible">5</span></span>
						<input type="hidden" name="starinput" class="starinputval">
					</div>
				</div>
				<hr class="widfulled">
			<?php } ?>
				
			<div class="col widfulled">
				<label>CATEGORY:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<fieldset class="checkboxes otherSection quick-category sectionTogglediv" id="garment-type-select">
					<?php foreach ($categories as $row) { ?>
					<label><input type="checkbox"
						value="<?php print $row['category_id'] ?>"><span
						title="<?php print $row['name'] ?>"><?php print $row['name'] ?></span></label>
					<?php } ?>
				</fieldset>
			</div>
			<hr class="widfulled">
			<div class="col widfulled left-brand">
				<label>BRAND:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<div class="brand sectionTogglediv">
					<div class="searchbrand" id="searchbrand">
						<input type="text" name="quicksearchbrand" class="quicksearchbrand" id="quicksearchbrand" placeholder="Type your keywords...">
						<img class="quicksearchbrand-magnify mousehand" src="/images/searchwhite.png">
					</div>
					<div class="topbrands searchbrandresult quick-brand">
						<div class="quicktopbrand">
							<div class="topbrandtext b i"><br>TOP BRANDS</div>
							<fieldset class="checkboxes otherSection quickbrands-type-select">
							<?php foreach ($topbrands as $row) { ?>
							<label><input type="checkbox"
								value="<?php print $row['brand']; ?>"><span
								title="<?php print $row['brand']; ?>"><?php print $row['brand']; ?></span></label>
							<?php } ?>
							</fieldset>
						</div>
					</div>
					
				</div>
			</div>
			<hr class="widfulled">
			<div class="col widfulled">
			<label>SHOW:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
			<fieldset class="checkboxes otherSection sectionTogglediv">
				<label><input type="radio" name="order_radio" value="trending"><span>Trending</span></label>
				<label><input type="radio" name="order_radio" value="latest" checked><span>Latest</span></label>
			</fieldset>
			</div>
			<hr class="widfulled">	
			<div class="col widfulled">
				<label>OCCASION:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<fieldset class="checkboxes otherSection quick-occasion sectionTogglediv" id="checkbox-search-occasion">
					<?php foreach ($occasions as $row) { ?>
					<label><input type="checkbox"
						value="<?php print $row['occasion_id'] ?>"><span
						title="<?php print $row['description'] ?>"><?php print $row['name'] ?></span></label>
					<?php } ?>
				</fieldset>
			</div>
			<hr class="widfulled">	
			<div class="col widfulled">
				<label>COLOR:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<fieldset class="checkboxes group color-oneliner quick-color sectionTogglediv" id="checkbox-search-colour">
					<div class="col">
						<?php foreach ($colours as $row) { ?>
						<label>
							<input type="checkbox" value="<?php print $row['colour_id'] ?>">
							<span>
								<img src="/images/colours/<?php print $row['image_path'] ?>" width="20" height="20" alt="<?php print $row['name'] ?>" title="<?php print $row['name'] ?>" <?php
								if( $row['image_path'] == 'sample-whites.png' ) { ?> class="borderGrey" <?php }?> >
								<?php // print $row['name'] ?>
							</span>
						</label>
						<?php } ?>
					</div>
				</fieldset>
			</div>
			<hr class="widfulled">	
			<div class="col widfulled">
				<label>PRICE:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
				<div class="nouisliderWrap sectionTogglediv">
					<div class="nouislider"></div>
				</div>
			</div>
		</div>
    
    </div>
<?php echo form_close();?>

<div class="mainContent rightContent left">
	<?php // echo form_open(); echo form_close();?>
	<div class="garments">
	</div>
	
	<div class="clear"></div>
	<div class="mousehand btnbottommore clicktoseemore">
		Click to see more <i class="icon-triangle"></i>
	</div>
	<div class="clear"></div>
	
	<div class="user_inter_pop_profile" style="display:none;">
		
	</div>
	
	<div class="user_inter_pop_welcome_profile" style="display:none;">
	
	</div>

	
</div>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>