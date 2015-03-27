<div class="mainContent myNewTabsRoom">
	
	<div class="brandWrap">
		<div class="tabsDressing">
			<ul id="dressingTabHeadContainer">
			    <li class="tabHead-wishList"><a href="#wishList" class="acttabsInner act-wishList">WISHLIST <span>()</span></a></li>
			    <li class="tabHead-assessedItems"><a href="#assessedItems" class="acttabsInner act-assessedItems">PENDING GARMENTS <span class="pinkycolor">()</span></a></li>
			    <li class="tabHead-itemsPendingGarment"><a href="#itemsPendingGarment" class="acttabsInner act-itemsPendingGarment">HISTORY <span>()</span></a></li>
			</ul>
		</div>
	</div>


	<section class="dressingTabContainer">
			
		<div class="tabsInner tab-wishList" id="wishList" style="display:none;">
			<div class="garments"></div>
		</div>

		<div class="tabsInner tab-assessedItems" id="assessedItems" style="display:none;">
			<div class="garments"></div>
		</div>

		<div class="tabsInner tab-itemsPendingGarment" id="itemsPendingGarment" style="display:none;">
			<div class="garments"></div>
		</div>


	</section>

	<style type="text/css">
		.myNewTabsRoom .tabsDressing {
		  width: 480px;
		}
		.myNewTabsRoom .tabsDressing li {
		  display: inline-block;
		  flex: 1 auto;
  		  position: relative;
		}
		.myNewTabsRoom .tabsDressing li a, .myNewTabsRoom .tabsDressing li a span, .myNewTabsRoom .tabsDressing li a:visited span {
			font-size: 0.8rem;
			padding: 0.2em 1.5em;
			color: #909090;
			font-weight: bold;
			border-right: none;
			background: #EFEFEF;
		}
		.myNewTabsRoom .myNewTabsRoom .tabsDressing li a.tabClicked, .myNewTabsRoom .tabsDressing li a.tabClicked span {
			background: #B2B2B2;
  			color: white;
		}
		.myNewTabsRoom .tabsDressing li a span.pinkycolor, .myNewTabsRoom .tabsDressing li a.tabClicked span.pinkycolor {
		  color: #e72775;
		}
		.myNewTabsRoom .tabsDressing li a:hover, .myNewTabsRoom .tabsDressing li a:visited:hover span {
			background: white;
  			text-decoration: none;
		}
		.myNewTabsRoom .tabsDressing li.tabClicked, .myNewTabsRoom .tabsDressing li.tabClicked {
			border: none;
		}

	</style>
	
	<script type="text/javascript">
		$(function(){
			toggleTabContent();

			$(".acttabsInner").click(toggleTabContent);

			

		});

		function toggleTabContent(){
			if(window.location.hash){ 
				var tab = window.location.hash;
				$(".act-"+tab.substring(1, tab.length)).addClass("tabClicked");
				$(tab).show();
			} else {
				$(".act-wishList").addClass("tabClicked");
				$("#wishList").show();
			}
		}

	</script>


</div>