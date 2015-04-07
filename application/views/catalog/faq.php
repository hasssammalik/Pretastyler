<script>
	$(document).ready(function(){
		$('a[href^="#"]').on('click',function (e) {
			e.preventDefault();
			
			var target = this.hash;
			var $target = $(target);
			
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top-60
				}, 900, 'swing', function () {
				window.location.hash = target;
			});
		});
	});
</script>
<style>
	.content{
	background-image: url(/images/payment/pretastylerpayment.jpeg);
	background-position: 10% 35%;
	background-attachment: fixed;
	}
</style>
<div class="faq">
	<div class="container-full">
		<div class="half">
			<div class="qanda">
				<div class="faq-info" id="q1">
					<div class="faq-header">
						WHAT IS PRÊTÀSTYLER?
					</div>
					<div class="faq-body">
						A fashion retail platform which revolutionizes the way women shop online by creating individually stocked malls filled with items specifically selected to flatter their shape, age and style preferences.   
						<br>Like your fingerprints, you own a unique set of body characteristics and personal style preferences that impact which types of garments and accessories suit you.
						<br>With PrêtàStyler’s advanced technology you can have a fashion mall created exclusively for you, filled with clothes and accessories that are perfectly matched to flatter your shape.
						<br>To complete your look and ensure you look and feel amazing every time you walk out the door each garment also comes with expert style advice on how to wear the garment to perfection.
					</div>
				</div>
				<div class="faq-info" id="q2">
					<div class="faq-header">
						A. HOW DO I SIGN UP AND WHAT'S REQUIRED?
					</div>
					<div class="faq-body">
						Registration is through this [page] and costs $9 per month.<br>
						Once you have registered you will be lead through the profile and preferences set-up. Upon completion your personalized mall will be stocked and the fun begins!<br>
						<ol style="padding-left: 20px;"><li> Click <a href="/index.html#profile">HERE</a> or the SIGN-UP link on the top right of every page. (You can also sign up using any of the signup buttons throughout the website)<br>
						</li><li> Enter you Name and Email</li>
						<li>Chosse a Password (must be alphanumberic - letters and numbers only)</li>
						<li> Confirm the same Password</li></ol>
					</div>
				</div>
				
				<div class="faq-info" id="q2a">
					<div class="faq-header">
						B. WHAT'S IN THE SNEAKY FINE PRINT, WHERE'S THE CATCH?
					</div>
					<div class="faq-body">
						It’s so cool to see someone concerned enough to ask! We care about protecting our member’s interests’ too. That being said we have nothing to hide, and we welcome you to view our <a href="/terms.html">Terms of Use</a>.
					</div>
				</div>
				
				<div class="faq-info" id="q2b">
					<div class="faq-header">
						C. FREE TRIAL PERIOD
					</div>
					<div class="faq-body">
						Membership comes with a 14 day free trial the period.  A counter on the menu bar of each page will show the days you have left.<br>
						Over your first week you will be sent introductory emails that explain how to get the most benefit from PrêtàStyler.
					</div>
				</div>
				
				<div class="faq-info" id="q2c">
					<div class="faq-header">
						E. UPDATING YOUR DETAILS
					</div>
					<div class="faq-body">
						Whenever necessary, you can update your details by clicking your [Account] area located
						at the top right hand side of the page
					</div>
				</div>
				
				<div class="faq-info" id="q2d">
					<div class="faq-header">
						F. HOW TO LOGIN?
					</div>
					<div class="faq-body">
						<ul style="list-style:none;">
							<li>Click [LOGIN] located in the top right corner of every page.</li>
							<li>A login panel will open up.</li>
							<li>Enter the email address you signed up with and your password</li>
							<li>Finally, click the LOGIN button.</li>
						</ul>
					</div>
				</div>
				
				<div class="faq-info" id="q2e">
					<div class="faq-header">
						G. DELETING YOUR ACCOUNT
					</div>
					<div class="faq-body">
						We’d be really sad to see you go! But if you must, please send an email to <a href="mailto:info@pretastyler.com">info@pretastyler.com</a> requesting your account be deleted and we will personally make sure your account is removed promptly.  Be sure to also give us the email address you use on the site and tell us whether or not you still want to receive our company updates. In addition you will need to stop your monthly payments through Paypal
					</div>
				</div>
				
				<div class="faq-info" id="q3">
					<div class="faq-header">
						YOUR PASSWORD
					</div>
					<div class="faq-body">
						a. Forgetten Your Password?<br>
						&nbsp;&nbsp;&nbsp;No problem, just follow these easy steps:
						<br>
						
						<ol style="padding-left:10%;">
							<li>Click the ‘Forgot Your Password’ link below the LOG IN button or <a href="/useraccount/login.html">HERE</a>.</li>
							<li>On the next screen, you will be asked to enter your email address.</li>
							<li>Click Send.</li>
							<li>You will receive and email to confirm the request is from you with a reset link.  If you don’t at first see it remember to check your junk/spam folder.</li>
							<li>Click the reset link in this email</li>
							<li>You will be taken to a page where you can enter and confirm a new password.</li>
							<li>Click SUBMIT to save the change.</li>
							<li>You will receive an email confirming that your password has been changed.  </li>
						</ol>
						
						<p style="padding-left:2%;">We suggest you store this email in a safe place.  We all have lapses of memory.<br>
						If you still experience problems contact us through this <a href="mailto:info@pretastyler.com">EMAIL.</a></p>
						b. Need to Change Your Password?<br>
						&nbsp;&nbsp;Whenever necessary you can change your password by clicking your [Accounts] area
						located at the top right hand side of the page.
					</div>
				</div>
				
				<div class="faq-info" id="q4">
					<div class="faq-header">
						YOUR PROFILE
					</div>
					<div class="faq-body">
						a. Why Your Profile is Required?<br>
						&nbsp;&nbsp;&nbsp;Knowing your unique shape is a core requirement so PrêtàStyler can fill your mall with all the garments and accessories that are right for you.  Completing <a href="/user.html">[your profile]</a> should take no longer than 5 minutes.  The more accurate your profile, the more perfect the items in your mall will be.
						<br>b. Editing Your Profile<br>
						<ol style="padding-left:8%;list-style-type: lower-roman;">
							<li>Log into  <a href="/useraccount/login.html">[PrêtàStyler]</a>.</li>
							<li>Click <a href="/user.html">(your name ACCOUNT)</a> on the meu bar – top right hand corner of any page.</li>
							
						</ol>
					</div>
				</div>
				
				<div class="faq-info" id="q5">
					<div class="faq-header">
						THE MALL
					</div>
					<div class="faq-body">
						<strong>	How Items Are Displayed</strong><br>
						<ol style="padding-left:8%;list-style-type: lower-alpha;">
							<li>On logging in your mall displays a mix of your 4 and 5 star rated items that have been uploaded within the last 24 hours.</li>
							<li>To see items with a lower rating click on a lower star rating located at the top of the Quick Search panel at the left hand side of the page.  </li>
							
						</ol>
						<br><strong>The Star Rating</strong><br>
						&nbsp;&nbsp;&nbsp;Items are ranked with a star rating; from 5  to 1 stars.<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5 stars - Great <br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4 stars - Good  <br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 stars - OK<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2 stars - Maybe<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 stars - Avoid<br>
						
						<strong>The Icons</strong>
						&nbsp;&nbsp;&nbsp;Hover your mouse over any item in the mall and icons will appear on the right hand side.
						<ol style="padding-left:10%;list-style-type: upper-roman;">
							<li><strong>Shopping Cart: </strong>Takes you directly to the retailer’s website to purchase it</li>
							<li><strong>Pencil: </strong>(present on your ‘My Finds’ page only) Allows you to edit the item if you
							think you’ve assessed the item incorrectly.</li>
							<li><strong>Dress: </strong>Shows items that are similar in style</li>
							<li><strong>Heart: </strong>Saves the item to your favorites area.</li>
							<li><strong>Coat Hanger: </strong>Pops the item into your wardrobe, if you’ve already purchased it.</li>
							<li><strong>'i' for Information: </strong>(bottom right): Click this icon to enlarge the image, see multiple views of the item, read the description, sizes, colors etc.   </li>
							<li><strong>Head: </strong>(top right) Indicates that this item has been found and assessed by another member using the Style Genie app.  Note: the assessment of the garment may not be correct.</li>
						</ol>
						<strong>Garment Insights and Styling Recommendations</strong>
						<p style="padding-left:3%;">Because looking fabulous is as much about how you wear a garment as the garment itself, PrêtàStyler adds specific styling recommendations for each garment based on your body profile.  Click on the garment image or info icon to view them.  On the left of the item you’ll see ‘Why It Suits You’ and on the right ‘How to Look Your Best’</p>
					</div>
				</div>
				
				<div class="faq-info" id="q6">
					<div class="faq-header">
						SEARCHING FOR ITEMS
					</div>
					
					<div class="faq-body">
						Being able to find what you want quickly, easily and accurately is one of the cornerstone missions of PrêtàStyler. We are always striving to go one better than our competitors and our own personal bests – the Detailed Search is one way we are doing this.  <br>
						<strong>a. Quick Search.</strong><br>
						&nbsp;&nbsp;&nbsp;This search function allows you quickly refine your search.  <br>
						&nbsp;&nbsp;&nbsp;You can search by any or all of the following:<br>
						<ol style="padding-left:8%;list-style-type: upper-alpha;">
							<li>Category:  That is the type of garment you are looking for (ie dress, jacket
							shoes, necklace)</li>
							<li>Brand:  Do you prefer to purchase from certain stores/brands.  Start typing in the name if you don't immediately see it in the checklist below and if we have it in our system it will magically appear in the list for you to select.</li>
							<li>Trending/Latest:  Do you like looking at what other people are looking at or would you rather just know the new stock we now have on the site.  The choice is yours.</li>
							<li>Occasion:  From Beach to active to evening wear, we have you covered.</li>
							<li>Color:  You can multi-select whatever colors you prefer wearing.</li>
							<li>Price:  Got a limited budget, no worries, just refine the budget bars by dragging each price point in to specify the range you are prepared to pay.</li>
						</ol>
						
						<strong>Detailed Search</strong>
						&nbsp;&nbsp;&nbsp;This search is one of our unique features and allows you to search for garments with EXACTLY the specific characteristics you’re after.  If your dream dress happens to be a red dress with a scoop neckline, fluttered sleeves, midi length and in lace, our search will get to work and if it’s available from one of the stores in the fashion mall, then you’re going find it in double time.
						<br>We’re adding new retailers, brands and clothing all the time so keep coming back if you don’t find what you want at first.
						<ol style="padding-left:10%;list-style-type: upper-roman;">
							<li><strong>Start Your Detailed Search: </strong>Takes you directly to the retailer’s website to purchase it</li>
							<li><strong>Select the type of item</strong>you wish to search for. (this is on the image below)</li>
							<li>Then one at a time<strong>open the individual areas</strong>you’re looking for. For example if you want to search for flutter sleeves first select ‘Arms/Sleeves’ then Short Sleeve Styles. You’ll be shown all the short sleeve options and you can select flutter sleeves.</li>
							<li>As you select different characteristics the mall below the search will start displaying items.  Your choices will narrow down as you get more and more specific with your
							search.</li>
						</ol>
					</div>
				</div>
				
				<div class="faq-info" id="q7">
					<div class="faq-header">
						STYLE GENIE APP
					</div>
					
					<div class="faq-body">
						Being able to find what you want quickly, easily and accurately is one of the cornerstone missions of PrêtàStyler. We are always striving to go one better than our competitors and our own personal bests – the Detailed Search is one way we are doing this.  <br>
						<strong>a. What Is It?</strong><br>
						&nbsp;&nbsp;&nbsp;A clever Google Chrome app that allows members you to apply the same PrêtàStyler assessment smarts to any item of clothing or accessory that you find anywhere on the web. Once the item has been assessed you'll know instantly if it suit’s you. <br>
						<strong>b. Where to Find it</strong><br>
						&nbsp;&nbsp;&nbsp;The Google Chrome store:  Google Chrome Store Extension  Note: This chrome app works on Macs.<br>
						<strong>c. How to Assess An Item </strong><br>
						
						<iframe height="360" src="https://www.youtube.com/embed/cGt4X-Eekco" frameborder="0" style="padding-left: 1%; width:99%; margin: 5px;" allowfullscreen></iframe>
						
						<ol style="padding-left:8%;list-style-type: upper-roman;">
							<li>Find a garment or accessory you like from any online store</li>
							<li>Search until you locate the largest image of the item.</li>
							<li>Hover over the item and right click (Ctrl click for mac) your mouse.  If that does not work click on an area of white space. Then select 'Select image of genie search'.</li>
							<li>Images will appear from the page: select the image of the particular garment you are interested in.</li>
							<li>Click ‘Next’ (you don't need to add any additional images)</li>
							<li>Click 'Assess item' to start the assessment or ‘Add to My Dressing Room’ to assesslater.</li>
							<li>The next asks a few questions about the item to allow you to find it later, brand, color etc. Click ‘Next’</li>
							<li>Now the assessment process starts.  Select the features that your item has. Be sure to read the description under each option if you are unsure.</li>
							<li>Answer all questions.</li>
							<li>After you have answered the last question the item is assessed and you are shown a pop-up with its rating for you.  From there you can purchase it, read why it did or did not suit or go back to the mall.</li>
							<li>The item will automatically be placed in your Dressing Room under Assessed Items.</li>
						</ol>
					</div>
				</div>
				
				<!-- <div class="faq-info" id="q7">
					<div class="faq-header">
						STYLE GENIE APP
					</div>
					
					<div class="faq-body">
						Being able to find what you want quickly, easily and accurately is one of the cornerstone missions of PrêtàStyler. We are always striving to go one better than our competitors and our own personal bests – the Detailed Search is one way we are doing this.  <br>
						<strong>a. What Is It?</strong><br>
						&nbsp;&nbsp;&nbsp;A clever Google Chrome app that allows members you to apply the same PrêtàStyler assessment smarts to any item of clothing or accessory that you find anywhere on the web. Once the item has been assessed you'll know instantly if it suit’s you. <br>
						<strong>b. Where to Find it</strong><br>
						&nbsp;&nbsp;&nbsp;The Google Chrome store:  Google Chrome Store Extension  Note: This chrome app works on Macs.<br>
						<strong>c. How to Assess An Item </strong><br>
						<ol style="padding-left:8%;list-style-type: upper-roman;">
							<li>Find a garment or accessory you like from any online store</li>
							<li>Search until you locate the largest image of the item.</li>
							<li>Hover over the item and right click (Ctrl click for mac) your mouse.  If that does not work click on an area of white space. Then select 'Select image of genie search'.</li>
							<li>Images will appear from the page: select the image of the particular garment you are interested in.</li>
							<li>Click ‘Next’ (you don't need to add any additional images)</li>
							<li>Click 'Assess item' to start the assessment or ‘Add to My Dressing Room’ to assesslater.</li>
							<li>The next asks a few questions about the item to allow you to find it later, brand, color etc. Click ‘Next’</li>
							<li>Now the assessment process starts.  Select the features that your item has. Be sure to read the description under each option if you are unsure.</li>
							<li>Answer all questions.</li>
							<li>After you have answered the last question the item is assessed and you are shown a pop-up with its rating for you.  From there you can purchase it, read why it did or did not suit or go back to the mall.</li>
							<li>The item will automatically be placed in your Dressing Room under Assessed Items.</li>
						</ol>
						<strong>Dressing Room</strong><br>
						&nbsp;&nbsp;&nbsp;This area saves the following items:
						<ol style="padding-left:8%;list-style-type: lower-alpha;">
							<li><span class="u">Unassessed items</span>: items you have found on the web but have not yet assessed. To start the assessment process hover your mouse over the image and click the pencil icon. Once the item has been assessed it will be placed in your ‘Assessed items’ area and will show in the mall.</li>
							<li><span class="u">Assessed items</span>: items you have found on the web and assessed using the style genie app.</li>
							<li><span class="u">Wishlist items</span>: items you have marked as favourites (heart icon)</li>
						</ol>
					</div>
				</div> -->
				
				<div class="faq-info" id="q8">
					<div class="faq-header">
						STYLE CLINIC
					</div>
					
					<div class="faq-body">
						<strong>a. What is Style Clinic?</strong><br>
						&nbsp;&nbsp;&nbsp;Your fashion experience does not end with your personalized mall or garment insights. <BR> 
						We have an ever expanding library of invaluable, instructional features to help you, from how to wear the latest trends to organizing your wardrobe and learning about how design lines affect your shape.  It's called Style Clinic and its open 24/7.  Why not take a look right now.
						<br>As a member you will be sent the latest Style Clinic feature each week.<br>
						<strong>b. Do You Accept Features from Other Writers?</strong><br>
						&nbsp;&nbsp;&nbsp;We certainly do!  In fact, we are looking to expand with a series of talented bloggers regularly providing features on all sorts of fashion, beauty, lifestyle and life issues. If you feel your features and musings would be of interest to our readers please [contact us] and provide the topic(s) you write on and a sample of your work.<br>
						
					</div>
				</div>
				
				<div class="faq-info" id="q9">
					<div class="faq-header">
						BUGS, SUGGESTIONS & FEEDBACK
					</div>
					
					<div class="faq-body">
						We are all ears- fire away!
						<strong>a. Have a Problem or Found a Bug?</strong><br>
						&nbsp;&nbsp;&nbsp;Woops!  If you have hit a snag, you can contact us using the chat/feedback box at the bottom right of every page of our website. Alternatively, we welcome emails requesting support sent to <a href="/contact-us.html">info@pretastyler.com</a>.  We will endeavor to get back to you within 36 working hours. <BR> 
						We have an ever expanding library of invaluable, instructional features to help you, from how to wear the latest trends to organizing your wardrobe and learning about how design lines affect your shape.  It's called Style Clinic and its open 24/7.  Why not take a look right now.
						<br>As a member you will be sent the latest Style Clinic feature each week.<br>
						<strong>b. I Love It or Hate It – We Want Your Feedback</strong><br>
						&nbsp;&nbsp;&nbsp;We'd love to hear from you, as to how you're finding the site. <br> 
						We welcome the 'c'mon guys you need to do this better' feedback just as much as the 'you guys rock' fan mail.<br>
						We want to make the site the best it can possibly be, and your feedback helps us do that.<br>
						You can either rate your experience 1 out of 10 <a href="">HERE</a>.  We like to think of it as a temperature gauge letting us know, quickly and simply, how customers are finding their user experience on PrêtàStyler.  Are we hot or not? Let us know!<br>					
						Alternatively, you can email our customer support  <a href="/contact-us.html">HERE</a>. So thanks in advance for taking the time to let us know what you think.  <br>
						<strong>c. Have An Idea?  Throw It To Us!</strong><br>
						&nbsp;&nbsp;&nbsp;We want to make the site the best it can possibly be, and your feedback helps us do that.<BR>
						We welcome 'hey have you thought of doing...' emails.  Don’t be shy – we are all eager ears here at PrêtàStyler.
					</div>
				</div>
				
				<div class="faq-info" id="q10">
					<div class="faq-header">
						NEED OTHER HELP?
					</div>
					
					<div class="faq-body">
						<a href="/contact-us.html">Contact us</a> and we will be back to you within 24 Australian working hours
					</div>
				</div>
				
			</div>
			
		</div>			
		
		
		<div class="half">
			<div class="faqs">
				<div class="faqs-header">FAQs:</div>
				<div class="tab-links">
					<div class="active"><a href="#q1"><strong>WHAT IS PRÊTÀSTYLER?</strong></a></div>
					
					<div style="font-style:italic;">
						<a href="#q2"><strong>SIGNING UP/ MEMBERSHIP</strong></a>
					</div>
					<div style="padding:10px 50px;">
						<ul>
							<li><a href="#q2" class="i">a. How Do I Sign Up and What's Required?</a></li>
							<li><a href="#q2a" class="i">b. What's in the sneaky fine print, where's the catch?</a></li>
							
							<li><a href="#q2b" class="i">c. Free Trial</a></li>
							<li><a href="#q2c" class="i">d. Updating Your Details</a></li>
							<li><a href="#q2d" class="i">e. How to Login</a></li>
							<li><a href="#q2e" class="i">f. Deleting Your Account</a></li>
						</ul>
					</div>
					<div><a href="#q3"><strong>YOUR PASSWORD</strong></a></div>
					<div><a href="#q4"><strong>YOUR PROFILE</strong></a></div>
					<div><a href="#q5"><strong>THE MALL</strong></a></div>
					<div><a href="#q6"><strong>OUR SEARCHES</strong></a></div>
					<div><a href="#q7"><strong>STYLE GENIE APP</strong></a></div>
					<div><a href="#q8"><strong>STYLE CLINIC</strong></a></div>
					<div><a href="#q9"><strong>BUGS, SUGGESTIONS & FEEDBACK</strong></a></div>
					<div><a href="#q10"><strong>NEED OTHER HELP?</strong></a></div>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
</div>

<div class="clear"></div>