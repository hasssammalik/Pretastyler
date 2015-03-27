<div class="mainContent">
	
	<div class="brandWrap">
		<div class="tabs">
			<ul id="dressingTabHeadContainer">
			    <li class="tabHead-wishList"><a href="#wishList" class="act-wishList">WISHLIST <span>()</span></a></li>
			    <li class="tabHead-assessedItems"><a href="#assessedItems" class="act-assessedItems">PENDING GARMENTS <span class="pinkycolor">()</span></a></li>
			    <li class="tabHead-itemsPendingGarment"><a href="#itemsPendingGarment" class="act-itemsPendingGarment">HISTORY <span>()</span></a></li>
			</ul>
		</div>
	</div>


	<section class="dressingTabContainer">
			
		<div class="tabs tab-wishList" id="wishList">
			<div class="garments">This is Wish list </div>
		</div>

		<div class="tabs tab-assessedItems" id="assessedItems">
			<div class="garments">Contains of Assessed Items here</div>
		</div>

		<div class="tabs tab-itemsPendingGarment" id="itemsPendingGarment">
			<div class="garments">Items Pending Garments can be Found here to be assessed.</div>
		</div>


	</section>

	<style type="text/css">
		.tabs {
		  width: 450px;
		}
		.tabs li {
		  display: inline-block;
		}
		.tabs li a,  .tabs li a span, .tabs li a:visited span {
			font-size: 0.8rem;
			padding: 0.2em 1.9em;
			color: #909090;
			font-weight: bold;
			border-right: none;
			background: #EFEFEF;
		}
		.tabs li a.tabClicked {
			background: #B2B2B2;
  			color: white;
		}
		.tabs li a span.pinkycolor {
		  color: #e72775;
		}

	</style>
	
	<script type="text/javascript">

		if(window.location.hash){ 
			var tab = window.location.hash;
			$("act-"+tab.substring(1, tab.length)).addClass("tabClicked");
			$(tab).show();
		} else {
			$("act-wishList").addClass("tabClicked");
			$("#wishList").show();
		}


	</script>


</div>