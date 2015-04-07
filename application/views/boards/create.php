<div class="panel">
	<section class="grid">
		<div class="grid_8 dress-match-wrap">
			<div class="dress-match">
				<div class="dress-match-links toolbar toolbar-top"></div>
				<div class="dress-match-item-menu toolbar toolbar-left"></div>
				<div class="canvas"></div>
			</div>
		</div>
		<div class="grid_4 dress-select">
			<div  class='hidden'>
				<div id="modal_cropper" class="cropperjs-modal">
					<div class="buttons">
						<div class="btn modal-close">Close</div>
					</div>
				</div>
			</div> 
			<div class="dress-select-wrap">
				<div class="palette"></div>
			</div>
		</div>
	</section>
</div>

<script type="text/jsx">
	/** Canvas */
	var canvas = new Canvas( jQuery( '.canvas' ) );
	canvas.toolbars.top = React.render( <TopToolbar />, jQuery( '.toolbar.toolbar-top' ).get( 0 ) );
	canvas.toolbars.left = React.render( <LeftToolbar />, jQuery( '.toolbar.toolbar-left' ).get( 0 ) );

	/** Palette */
	var colours = <?php echo json_encode( $colours ); ?>;
	var palette = React.render( <Palette colours={ colours } />, jQuery( '.palette' ).get( 0 ) );
</script>
