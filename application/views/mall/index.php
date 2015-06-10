<?php
if (!$this->flexi_auth->is_logged_in()){
	$newClass="nomadpage";
}
?>
<div class="<?php if(isset($newClass)){echo $newClass;} ?>">
	<?php  if(isset($newClass)){ ?>
	<div class="nomad-banner">
		<div class="nomad-banner-image">
			<img src="/images/mall-warning.png">
		</div>
		<div class="nomad-banner-text bkpinkycolor">
			WARNING: This mall is not OPTIMIZED!<br>Test drive a customised mall today<br>
			<a href="/#profile"><i>	Discover the Possibilities </i></a>
		</div>
		<div class="nomad-banner-image">
			<img src="/images/mall-warning.png">
		</div>
		<div class="clear">
		</div>
	</div>
	<?php } ?>
</div>
<br>
<?php echo form_open('', array('class'=>'topquicksearch', 'id'=>'topquicksearch', 'name'=>'topquicksearch')); ?>
    
    <div class="quickSearch quicksearchtabtop <?php if ( $this->flexi_auth->is_logged_in() ){ ?> quickSearchTourButtonStart <?php } ?>">
        <?php if ( $this->flexi_auth->is_logged_in() ){ ?><div class="TourButtonStarter bkpinkycolor mousehand" style="display:none;">START TOUR</div> <?php } ?>
        <input type="text" name="searchTerm" placeholder="Search..." id="input-search-keyword" class="quicksearchinputtab">
        <input type="image" name="Quick Search" id="quicksearch" src="/images/search_icon.png" class="quicksearchimagetab" width="40">
    </div>
	
	
	
	<div class="leftContent left">

		<a class="wid100 targetbutn bkpinkycolor" href="/mall/targetsearch.html">
			&nbsp; &nbsp; DETAILED SEARCH
			<span class="targertbutnicon unicode-icon right">&#9658;</span>
		</a>
		
		<div class="wid100 quickbelowbutn bkpinkycolor">
			&nbsp; &nbsp; QUICK SEARCH 
			<span class="quickbelowicon unicode-icon right">&#x25BC;</span>
		</div>
		
		<div class="quickSearch leftsearchsection">
			<div class="group">
				
				<div class="col widfulled">
					<label>REFINE BY:</label><span class="resetRefine mousehand">Clear All</span><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
					<div class="refined sectionTogglediv" id="refinedby">
						<ul class="refinelist">
							<li class="price"><div>Price (0 - 1000)</div> </li>
							<li class="category"><div>All Categories</div> </li>
							<li class="store"><div>All Stores</div> </li>
							<li class="occasion"><div>All Occasion</div> </li>
							<li class="color"><div>All Colors</div> </li>
							<?php if( !empty( $first_name)) { ?>
								<li class="star"><div>5 ☆</div> <a class="closesearch" data-type="star" data-set="5">x</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<hr class="widfulled">
				
				<?php if ($this->flexi_auth->is_logged_in()){ ?>
					<div class="col widfulled">
						<label>RATING:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
						<div class="QuickRating search-quick-rating quick-star sectionTogglediv" id="quick-rating-search">
							
							<span class="hoverStars starclick mousehand lowclassstar mallStar-tooltip-js" data-val="1" title="Avoid" datatooltipnew="Avoid items with low percentage matches">☆<br><span class="star-visible">1</span>
							</span>

							<span class="hoverStars starclick mousehand lowclassstar mallStar-tooltip-js" data-val="2" title="Maybe" datatooltipnew="Risky items with med-low percentage matches">☆<br><span class="star-visible">2</span>
							</span>
							
							<span class="hoverStars starclick mousehand lowclassstar mallStar-tooltip-js" data-val="3" title="OK" datatooltipnew="OK items with med-high percentage matches">☆<br><span class="star-visible">3</span>
							</span>
							
							<span class="hoverStars starclick mousehand mallStar-tooltip-js" data-val="4" title="Good" datatooltipnew="Good items with high percentage matches">☆<br><span class="star-visible">4</span>
							</span>
							
							<span class="hoverStars starclick mousehand active mallStar-tooltip-js" data-val="5" title="Great" datatooltipnew="Great items with your highest percentage matches">☆<br><span class="star-visible">5</span>
							</span>
							
							<span class="starAllShow mousehand" title="Show all">SHOW ALL</span>
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

				<div class="quickSearch_dynamic_category_lengths">

				</div>

				<hr class="widfulled">
				<div class="col widfulled left-store">
					<label>STORE:</label><span class="sectionToggle mousehand"><i class="icon-triangle"></i></span>
					<div class="store sectionTogglediv">
						<div class="searchstore" id="searchstore">
							<input type="text" name="quicksearchstore" class="quicksearchstore" id="quicksearchstore" placeholder="Type your keywords...">
							<img class="quicksearchstore-magnify mousehand" src="/images/searchwhite.png">
						</div>
						<div class="topstores searchstoreresult quick-store">
							<div class="quicktopstore">
								<div class="topstoretext b i"><br>TOP STORES</div>
								<fieldset class="checkboxes otherSection quickstores-type-select">
								<?php foreach ($topstores as $row) { ?>
								<label><input type="checkbox"
									value="<?php print $row['store']; ?>"><span
									title="<?php print $row['store']; ?>"><?php print $row['store']; ?></span></label>
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
		
	</div>
<?php echo form_close();?>

<div class="mainContent rightContent left">

	<div class="garments">
	</div>
	
	<div class="clear"></div>
	<div class="mousehand btnbottommore clicktoseemore">
		Click to see more <i class="icon-triangle"></i>
	</div>
	
	<div class="clear"></div>
	
	<div class="user_inter_pop_profile" style="display:none;"></div>
	
	<div class="user_inter_pop_welcome_profile" style="display:none;"></div>

	
</div>
<?php if( ENVIRONMENT == 'production') { ?>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0027/7573.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
<?php } ?>