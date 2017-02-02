
<?php get_header(); ?>
<article id="dnn_ContentPane">
	<h1>Our Team in Switzerland</h1>
    <?php if(!empty($posts)): ?>
		<?php foreach($posts as $post):?>
			<article class="employee" itemtype="http://schema.org/Person" itemscope="">
				<img alt="Britta Häberling" title="Britta Häberling" src="<?php the_field('avarta')?>">
				<div>
					<h2>
						<span itemprop="givenName"><?php the_field('full_name')?></span>
					</h2>
					<strong itemprop="jobTitle"><?php the_field('position')?></strong>
					<dl>
						<dt>Tel</dt>
						<dd>
							<a href="tel:+41444201111" itemprop="telephone"><?php the_field('tel'); ?></a>
						</dd>
						<dt>Direct</dt>
						<dd>
							<a href="tel:+41444201117" itemprop="telephone"><?php the_field('direct'); ?></a>
						</dd>
						<dt>Fax</dt>
						<dd>
							<a href="tel:+41444201112" itemprop="faxNumber"><?php the_field('fax'); ?></a>
						</dd>
					</dl>
					<a href="/Portals/0/Content/Team/CV/CV_BrittaHaeberling_de-CH.pdf"
						target="_blank">Short version CV</a>
				</div>
				<a href="mailto:<?php the_field('email'); ?>" data-rit-email-id="bhaeberling" itemprop="email"><?php the_field('email'); ?></a>
			</article>
		<?php endforeach; ?>
	<?php endif; ?>
</article>
<?php get_footer(); ?>
