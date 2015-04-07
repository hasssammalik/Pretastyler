
<div class="mainContent myNewTabsRoom minheight250">
	<script>
$(document).ready(function()
{
$('.tabHead-wishList').mouseenter(function()
	{
		$('#wishlist1').fadeIn(500);
	}).mouseleave(function(){
		$('#wishlist1').fadeOut(500);
	});

$('.tabHead-itemsPendingGarment').mouseenter(function()
	{
		$('#pending1').fadeIn(500);
	}).mouseleave(function(){
		$('#pending1').fadeOut(500);
	});

	$('.tabHead-history').mouseenter(function()
	{
		$('#history1').fadeIn(500);
	}).mouseleave(function(){
		$('#history1').fadeOut(500);
	});

	$('.tabHead-myfinds').mouseenter(function()
	{
		$('#myfinds1').fadeIn(500);
	}).mouseleave(function(){
		$('#myfinds1').fadeOut(500);
	});


})
	</script>
	
	<div class="tabsDressing">
		<ul id="dressingTabHeadContainer">
		    <li class="tabHead-wishList">

		    	<a href="#wishList" class="acttabsInner act-wishList">WISHLIST <span>(0)</span></a>
		    	<span class="talkbubble" id="wishlist1">Things saved because you love them.</span>
		    </li>
		    <li class="tabHead-itemsPendingGarment tabHead-myfinds">
		    	<a href="#myfinds" class="acttabsInner act-myfinds">MY FINDS <span class="pinkycolor">(0)</span></a>
		    	<span class="talkbubble" id="myfinds1">Things you have found and assessed.</span>
		    </li>
		    <li class="tabHead-itemsPendingGarment">
		    	<a href="#itemsPendingGarment" class="acttabsInner act-itemsPendingGarment">PENDING GARMENTS <span class="pinkycolor">(0)</span></a>
		    	<span class="talkbubble" id="pending1">Items you have found waiting assessment.</span>
		    </li>
		    
		    <li class="tabHead-history">
		    	<a href="#history" class="acttabsInner act-history">HISTORY <span>(0)</span></a>
		    	<span class="talkbubble" id="history1" style="width:380px;">Items you have deleted from My Finds and Wishlist</span>
		    </li>
		</ul>
	</div>

	<br>
	
	<section class="dressingTabContainer">
			
		<div class="tabsInner tab-wishList" id="wishList" style="display:none;">
			<div class="garments"></div>



			<!-- <div class="mousehand btnbottommore clicktoseemore_fav">
				Click to see more <i class="icon-triangle"></i>
			</div> -->

		</div>

		<div class="tabsInner tab-itemsPendingGarment" id="itemsPendingGarment" style="display:none;">
			<div class="garments"></div>

			<!-- <div class="mousehand btnbottommore clicktoseemore_pending">
				Click to see more <i class="icon-triangle"></i>
			</div> -->

		</div>
		
		
		<div class="tabsInner tab-myfinds" id="myfinds" style="display:none;">
			<div class="garments"></div>
			
			<!-- <div class="mousehand btnbottommore clicktoseemore_pending">
				Click to see more <i class="icon-triangle"></i>
			</div> -->

		</div>
		
		

		<div class="tabsInner tab-history" id="history" style="display:none;">
			<div class="garments"></div>

			<!-- <div class="mousehand btnbottommore clicktoseemore_history">
				Click to see more <i class="icon-triangle"></i>
			</div> -->

		</div>


	</section>

	<style type="text/css">
		.myNewTabsRoom .tabsDressing {
		  width: 570px;
		}
		.myNewTabsRoom .tabsDressing li {
		  display: inline-block;
		  flex: 1 auto;
  		  position: relative;
		}
		.myNewTabsRoom .tabsDressing li a {
			font-size: 0.82rem;
			padding: 0.3em 1.3em;
			color: #808080;
			font-weight: bold;
			border-right: none;
			background: #EFEFEF;
			text-decoration: none;
		}
		
		.myNewTabsRoom .tabsDressing li a.tabClicked {
			background: #B2B2B2;
  			color: white;
		}
		.myNewTabsRoom .tabsDressing li a span.pinkycolor, .myNewTabsRoom .tabsDressing li a.tabClicked span.pinkycolor {
		  color: #e72775;
		}
		.myNewTabsRoom .tabsDressing li a:hover, .myNewTabsRoom .tabsDressing li a:visited:hover {
			background: #C7C7C7;
			color: white;
  			text-decoration: none;
		}
		.myNewTabsRoom .tabsDressing li.tabClicked, .myNewTabsRoom .tabsDressing li.tabClicked {
			border: none;
		}

	</style>
	
	<script type="text/javascript">
		var tab = false;
		var callHash = 1;

		$(function(){
			if( window.location.hash ){
				tab = window.location.hash;
			} else {
				tab = '#wishList';
			}
			toggleTabContent(tab);
			
			$(".acttabsInner").click(function(){
				toggleTabContent($(this).attr("href"));
			});

		});

		function toggleTabContent(tab){
			$(".tabsInner").hide();
			$(".tabClicked").removeClass("tabClicked");
			callHash = 1;
			var arraytab = tab.split('#', 2);
			tab = arraytab[1];
			if( tab.length > 0 ){ 
				$(".act-"+tab).addClass("tabClicked");
				$("#"+tab).show();
			} else {
				$(".act-wishList").addClass("tabClicked");
				$("#wishList").show();
			}
			
		}

		
	</script>


</div>