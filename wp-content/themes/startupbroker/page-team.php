<?php get_header(); ?>
<article id="dnn_ContentPane">
    <?php 

		$args = array(
			'type'                     => 'teams',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false 
		
		); 
		
		$categories = get_categories( $args );
// 		echo '<pre>'; print_r($categories);die;
	
	?>
	<h1>Our Teams</h1>
	<?php if(!empty($categories)):?>
		<?php foreach($categories as $category): ?>
			<dl class="callToAction">
				<dt>Team</dt>
				<dd>
					<a data-rit-tabid="<?php echo $category->term_id ;?>" href="<?php echo esc_url(get_category_link( $category->term_id )); ?>"><?php echo $category->name;?></a>
				</dd>
			</dl>
		<?php endforeach;?>
	<?php endif; ?>
	
</article>
<?php get_footer(); ?>