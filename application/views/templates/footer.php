							<footer>
								<ul>
									<li><a href="#">BROWSER EXTENSION</a>|</li>
									<li><a href="/terms.html">TERMS</a>|</li>
									<li><a href="/our-story.html">OUR STORY</a>|</li> 
									<li><a href="/contact-us.html">CONTACT</a>|</li>
									<li><a href="/retailer.html">RETAILERS</a></li>
								</ul>
								<ul class="social">
									<li><a href="http://www.facebook.com/myprivatestylist" class="fb"><i class="icon-facebook"></i></a></li>
									<li><a href="https://twitter.com/YourUniqueStyle" class="tw"><i class="icon-twitter"></i></a></li>
									<li><a href="http://www.pinterest.com/areinten/" class="pin"><i class="icon-pinterest"></i></a></li>
								</ul>
								
							</footer>
							
						</div>
					</div>
				</div>
				
					
				
				
			</div>
		<?php if(!isset($extraFooter)) { ?>
		</div>
		
	</div> <?php }?>
<div class="modal"></div>
<div class="popup_modal"></div>

<?php 
	if( isset( $extraFooterJS )) {
		echo $extraFooterJS;
	}
?>
<?php 
if( ENVIRONMENT == 'production') {
?>	
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