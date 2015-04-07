<article class="panels">
	<div class="grid">
		<div class="paymentpage">
			<div class="pagetitle">
			  <h2>PAYMENT</h2>
			</div>
			<div class="clear"></div>


			<div class="paymentpagecontent container span_20 maxwid720">

<!--                   <div class="payment_section_1"></div> -->

                  <div class="payment_section_2">
                      <div class="">
            				<div class="firstsection">
            					<h3>TO FINALISE YOUR MEMBERSHIP BY FILLING YOUR BILLING AND CREDIT CARD INFORMATION</h3>

            					<p class="center">
            						We will bill your membership fee of $19 per month. You'll be introduced to styles that you hadn't even considered and then get some expert style advice on how to pull your outfits together. And you're going to love it.
            					</p>

            				</div>

            				<?php echo form_open('payment') ?>

            				<div class="paymentsection">
            					<h4>BILLING INFORMATION</h4>

            					<div class="billinfo">

            						<label class="left widhalf">
            							<div><strong>Your Last Name:</strong></div>
            							<input type="text" name="lastname" placeholder="Type your last name">
            						</label>

            						<label class="left widhalf withfloatright">
            							<div><strong>Your First Name:</strong></div>
            							<input type="text" name="firstname" placeholder="Type your first name">
            						</label>

            						<label class="left widhalf">
            							<div><strong>Your Email:</strong></div>
            							<input type="email" name="email" placeholder="Type your email">
            						</label>
            						<div class="clear"></div>

            					</div>

            				</div>


            				<div class="paymentsection">
            					<h4>CREDIT CARD INFORMATION</h4>

            					<div class="creditcard">

            						<p>Pay with credit card. Please enter your card details below.</p>

            						<div>
            							<p><strong>Your Payment Method</strong></p>
            							<p>
            								<img src="/images/payment/creditcard.png" width="220">
            							</p>

            						</div>

            						<label class="left widhalf">
            							<div><strong>Your Name on Card:</strong></div>
            							<input type="text" name="cardname" placeholder="Type your account name">
            						</label>

            						<label class="left widhalf withfloatright">
            							<div><strong>Your Account Number:</strong></div>
            							<input type="text" name="accountname" placeholder="Type your account number">
            						</label>

            						<label class="left widhalf">
            							<div><strong>Your Expire Date:</strong></div>
            							<select name="datemonth" class="widhalf">
            								<?php $datemonths = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ); ?>
            								<?php foreach( $datemonths as $k => $month ) {
            									echo '<option value="'. ($k + 1) .'">'.$month.'</option>';
            								} ?>

            							</select>
            							<select name="dateyear" class="widhalf">
            								<?php $year = date("Y") ?>
            								<?php for ($valid=$year; $valid<$year+20;$valid++) {
            									echo '<option value="'.$valid.'">'.$valid.'</option>';
            								} ?>

            							</select>

            						</label>

            						<label class="left widhalf">
            							<div><strong>Your Security Code:</strong></div>
            							<input type="text" name="ccv" placeholder="Type security code" class="left widhalf"> <span class="small u widhalf left i">What is this?</span>
            						</label>
            						<div class="clear"></div>
            					</div>

            				</div>


            				<div class="paymentsection">
            					<h4>PAY WITH PAYPAL</h4>

            					<div class="paypal">
            						<img src="/images/payment/paypal.png" width="150" class="left small">

            						<p class="" style="margin-top: 10px;">
            							You will be redirected to the Paypal website to make your payment after clicking on confirmed button.
            						</p>

            					</div>
            					<div class="clear"></div>
            				</div>
            				<br>

            				<div class="paymentsection">

            					<label class="left widfull">
            						<div><strong>How did you heard about us?</strong></div>
            						<input type="text" name="question_howhead" placeholder="Our email advertising... ">
            					</label>

            					<label class="left widhalf">
            						<div><strong>Referral Code:</strong></div>
            						<input type="text" name="referralcode" placeholder="Type your code">
            					</label>

            					<label class="left widhalf withfloatright">
            						<div><strong>Discount Code:</strong></div>
            						<input type="email" name="discountcode" placeholder="Type your code">
            					</label>
            					<div class="clear"></div>
            				</div>

            				<br>
            				<div class="paymentsection center">
            					 <a href=""><img src="/images/payment/confirm_button.png" width="220"></a>
            				</div>

            				<?php echo form_close() ?>

        <!--                     <div class="paymentpagecontent_2"></div> -->

                            <div class="clear"></div>
                        </div>
			     </div>
            </div>
		</div>
	</div>
</article>
