<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header(); ?>
<article id="dnn_ContentPane" style="width: 100%;">
	<section>
		<h2>Addresses</h2>
		<?php 
			//Define your custom post type name in the arguments
			$args = array('post_type' => 'list-contact');
			//Define the loop based on arguments
			$loop = new WP_Query( $args );
			//Display the contents
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<article class="contactInfo">
				<img alt="<?php the_title(); ?>" src="<?php echo get_field('thumbnail'); ?>">
				<p>
					<span><?php echo get_post_meta($post->ID, 'address_1', true); ?></span>
					<span><?php echo get_post_meta($post->ID, 'address_2', true); ?></span>
					<span><?php echo get_post_meta($post->ID, 'address_3', true); ?></span>
				</p>
				<dl>
					<dt>Phone</dt>
					<dd>
						<a href="tel:<?php echo get_post_meta($post->ID, 'phone', true); ?>"><?php echo get_post_meta($post->ID, 'phone', true); ?></a>
					</dd>
					<dt>Fax</dt>
					<dd>
						<a href="tel:<?php echo get_post_meta($post->ID, 'fax', true); ?>"><?php echo get_post_meta($post->ID, 'fax', true); ?></a>
					</dd>
					<dt>Mail</dt>
					<dd>
						<a href="<?php echo get_post_meta($post->ID, 'email', true); ?>" data-rit-email-id="info_zuerich"><?php echo get_post_meta($post->ID, 'email', true); ?></a>
					</dd>
					<dt>Homepage</dt>
					<dd>
						<a href="<?php echo get_post_meta($post->ID, 'website', true); ?>"><?php echo get_post_meta($post->ID, 'website', true); ?></a>
					</dd>
				</dl>
			</article>
		<?php endwhile;?>
	</section>
    <?php
				
	while ( have_posts () ) :
					the_post ();
					the_content ();
					?>
    <?php endwhile; // end of the loop. ?>
</article>
<?php get_footer(); ?>