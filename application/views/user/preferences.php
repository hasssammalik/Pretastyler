<div class="sectionHeader">
	<div><h2>Let’s <strong>Get Started</strong></h2></div>
</div>
<small class="center"><span>Why Neck Length :</span> Determines the best depth and style for your necklines, necklaces and earrings as well as the best height for your collars.</small>
				
<form>
	<div id="preferences">
		<div class="handle"><h3>Select Garment Type</h3></div>
		<div class="panel">
			<div>
				<div class="sliderWrap">
					<ul class="items">
						<?php foreach ($categories as $category) { ?>
						<li>
							<label class="preferences-category-label" category_id="<?php print $category['category_id'] ?>">
								<input type="radio" name="garmentType">
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
		</div>
		<div class="handle" id="preferencesHeadline"><h3>Check the Styles/characteristics you do not want in your mall</h3></div>
		<div class="panel prefOptions">
			<div>
				<nav id="prefTabs">
					<ul>
						<li class="current"><a href="#fitShape" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Fit/Shape</a></li>
						<li><a href="#armsSleeves" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Arms/Sleeves</a>
							<ul>
								<li class="active"><a href="#">Sleeve Head</a></li>
								<li><a href="#">Sleeve Length</a>
									<ul>
										<li><a href="#">Sleeve Style</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#waistlineFeatures" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Waistline Features</a></li>
						<li><a href="#skirtShape" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Skirt Shape</a></li>
						<li><a href="#fabricSurface" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Fabric Surface</a></li>
						<li><a href="#overallBulk" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Overall Bulk</a></li>
						<li><a href="#patternedSolidColourEmbellished" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Patterned, Solid Colour Embellished ?</a></li>
						<li><a href="#focalArea" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Focal Area</a></li>
						<li><a href="#hemline" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Hemline</a></li>
						<li><a href="#length" data-headline="Check the Styles/characteristics you do not want in your mall"><span>+</span>Length</a></li>
						<li><a href="#colour" data-headline="CHECK THE COLORS YOU DO NOT WEAR"><span>+</span>Colour</a></li>
						<li><a href="#budget" data-headline="Select the Price Range that best suits you for <strong><em>‘Dresses’</em></strong>"><span>+</span>Budget</a></li>
						<li><a href="#store"><span>+</span>Store</a></li>
					</ul>
					<button type="submit"><strong>SAVE</strong> ALL PREFERENCES</button>
				</nav>
				<div class="prefSelections">
					<fieldset id="fitShape">
						<ul class="items">
							<li>
								<label>
									<input type="checkbox">
									<div><span>STRAIGHT</span></div>
									<div class="img">
										<span><img src="/images/preferences/fitShape/straight.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox">
									<div><span>Semi FiTTed</span></div>
									<div class="img">
										<span><img src="/images/preferences/fitShape/semiFitted.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox">
									<div><span>Very Fitted</span></div>
									<div class="img">
										<span><img src="/images/preferences/fitShape/veryFitted.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
						</ul>
					</fieldset>
					<fieldset id="armsSleeves">
						<ul class="items">
							<li>
								<label>
									<input type="checkbox">
									<div><span>Sleeveless</span></div>
									<div class="img">
										<span><img src="/images/preferences/armsSleeves/sleeveless.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox">
									<div><span>Sleeves</span></div>
									<div class="img">
										<span><img src="/images/preferences/armsSleeves/sleeves.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox">
									<div><span>sTraps</span></div>
									<div class="img">
										<span><img src="/images/preferences/armsSleeves/straps.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox">
									<div><span>sTrap and Seelves</span></div>
									<div class="img">
										<span><img src="/images/preferences/armsSleeves/strapSleeves.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
							<li data-tooltip="A sleeve head where the bodice and sleeve connect at the natural shoulder edge and the sleeve is a different color to the rest of the dress.">
								<label>
									<input type="checkbox">
									<div><span>STrapless</span></div>
									<div class="img">
										<span><img src="/images/preferences/armsSleeves/strapless.jpg" alt=""></span>
										<span class="overlay"><span><span><img src="/images/deSelect.png" alt=""></span></span></span>
									</div>
								</label>
							</li>
						</ul>
					</fieldset>
					<fieldset id="waistlineFeatures"></fieldset>
					<fieldset id="skirtShape"></fieldset>
					<fieldset id="fabricSurface"></fieldset>
					<fieldset id="overallBulk"></fieldset>
					<fieldset id="patternedSolidColourEmbellished"></fieldset>
					<fieldset id="focalArea"></fieldset>
					<fieldset id="hemline"></fieldset>
					<fieldset id="length"></fieldset>
					<fieldset id="colour">
						<label>Colours:</label>
						<fieldset class="checkboxes group">
							<div class="col span_12">
								<label><input type="checkbox"><span><img src="/images/colours/001.png" width="17" height="17" alt="">Coral/Orange</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/002.png" width="17" height="17" alt="">Violet/Purple</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/003.png" width="17" height="17" alt="">Camel/Brown</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/004.png" width="17" height="17" alt="">Yellow</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/005.png" width="17" height="17" alt="">Lilac/Purple</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/006.png" width="17" height="17" alt="">Cream/White</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/007.png" width="17" height="17" alt="">Warm Green</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/008.png" width="17" height="17" alt="">Red Violet</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/009.png" width="17" height="17" alt="">Grey</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/010.png" width="17" height="17" alt="">Cool Green</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/011.png" width="17" height="17" alt="">Pink/Red</span></label>
							</div>
							<div class="col span_12">
								<label><input type="checkbox"><span><img src="/images/colours/012.png" width="17" height="17" alt="">Black</span></label>											
								<label><input type="checkbox"><span><img src="/images/colours/013.png" width="17" height="17" alt="">Teal Green</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/014.png" width="17" height="17" alt="">Multicoloured</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/015.png" width="17" height="17" alt="">Silver</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/016.png" width="17" height="17" alt="">Blue</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/017.png" width="17" height="17" alt="">Greens</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/018.png" width="17" height="17" alt="">Taupe/Stone</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/019.png" width="17" height="17" alt="">Rose Gold</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/020.png" width="17" height="17" alt="">Blue</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/021.png" width="17" height="17" alt="">Beige/Nude</span></label>
								<label><input type="checkbox"><span><img src="/images/colours/022.png" width="17" height="17" alt="">Gold</span></label>
							</div>
						</fieldset><br>
						<fieldset class="checkboxes group">
							<div class="col span_12">
								<label><input type="checkbox"><span>SELECT FOR ALL GARMENTS</span></label>
							</div>
							<div class="col span_12">
								<label><input type="checkbox"><span>SELECT FOR <em><strong>‘DRESSES’</strong></em> ONLY</span></label>
							</div>
						</fieldset>
					</fieldset>
					<fieldset id="budget">
						<div class="nouisliderWrap">
							<div class="nouislider"></div>
						</div>
					</fieldset>
					<fieldset id="store">
						<label>SEARCH STORES/BRANDS:</label>
						<input type="text" placeholder="Start Typing The Store/Brand Name...">
						<fieldset class="checkboxes group">
							<div class="col span_12">
								<label><input type="checkbox"><span>DECJUBA</span></label>
								<label><input type="checkbox"><span>GORMAN</span></label>
								<label><input type="checkbox"><span>THE ICONIC</span></label>
								<label><input type="checkbox"><span>SPORTSCRAFT</span></label>
							</div>
							<div class="col span_12">
								<label><input type="checkbox"><span>ASOS</span></label>
								<label><input type="checkbox"><span>PRINCESS POLLY</span></label>
								<label><input type="checkbox"><span>NORDSTROM</span></label>
								<label><input type="checkbox"><span>COUNTRY ROAD</span></label>
							</div>
						</fieldset>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</form>