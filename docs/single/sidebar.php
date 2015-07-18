<div id="sidebar" class="col-md-3 widget-area">

<aside id="search-2" class="widget widget_search">
<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/dokumentation/' ) ); ?>">
	<label class="search-form-short">
		<span class="screen-reader-text">Sök efter:</span>
		<input type="search" class="form-control" placeholder="Sök dokumentation…" value="" name="s">
	</label>
	<input type="submit" class="btn btn-primary right" value="Sök">
</form>
</aside>

<?php if ( !bp_is_user() ) : ?>
	<h3>Navigation</h3>
	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<?php bp_docs_tabs( bp_docs_current_user_can_create_in_context() ) ?>
	</div><!-- .item-list-tabs -->
<?php endif ?>

</div>