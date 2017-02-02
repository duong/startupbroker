<!DOCTYPE html>
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Startup Broker</title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=no" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bb.css?v=8" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bb-rwd-desktop.css?v=10" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bb-rwd-mobile.css?v=7" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/DropDownControlStyle.css?v=4" />
    <style id="StylePlaceholder" type="text/css"></style>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bb-rwd-mobile.js"></script>
</head>
<body class="tabid-36">

<?php
    global $tp_options;
    global $post;
    // global $post;

    // die(var_dump($post->ID));
// echo '<pre>';
// print_r( $tp_options );
// echo '</pre>';
?>
    <form method="post" action="" id="Form" enctype="multipart/form-data">
        <header>
            <a href="http://www.businessbroker.ch" data-rit-rwd-hide="desktop">
                <img src="http://www.businessbroker.ch/Portals/_default/Skins/BusinessBroker/images/BusinessBrokerLogo.gif" alt="Business Broker Logo" />
            </a>
        </header>
        <nav class="main">
            <?php
                $my_wp_query = new WP_Query();
                $all_wp_parent_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => 100, 'orderby' => 'id', 'order' => 'asc', 'post_parent' => 0 ));
                
                $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => 100, 'orderby' => 'id', 'order' => 'asc'));
                $pageParents = array();
                if(!empty($all_wp_pages)){
                	foreach($all_wp_pages as $item) {
                		if(!empty($item->post_parent))
                			$pageParents[$item->ID] = $item->post_parent;
                	}
                }
//                 echo '<pre>'; print_r($pageParents);die;
            ?>
            <ul>
                <?php if(!empty($all_wp_parent_pages)) : ?>
                    <?php foreach($all_wp_parent_pages as $pageItem): ?>
                        
                        <?php
                            $page_children = get_page_children( $pageItem->ID, $all_wp_pages );
                            if(!empty($page_children)) : ?>
                                <li class="parentNode <?php if(($pageItem->ID == $post->ID) || (!empty($pageParents[$post->ID]) && $pageParents[$post->ID] == $pageItem->ID)): ?> selectedPath <?php endif; ?>"><a href="<?php echo esc_url( get_permalink($pageItem->ID) ); ?>"><?php echo $pageItem->post_title; ?></a>
                                    <ul>
                                        <?php foreach($page_children as $page) : ?>
                                            <li class="<?php if($page->ID == $post->ID): ?> selectedPath selectedNode<?php endif; ?>"><a href="<?php echo esc_url( get_permalink($page->ID) ); ?>"><?php echo $page->post_title; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="<?php if($pageItem->ID == $post->ID): ?> selectedPath <?php endif; ?>"><a href="<?php echo esc_url( get_permalink($pageItem->ID) ); ?>"><?php echo $pageItem->post_title; ?></a></li>
                            <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <article id="dnn_LeftPane">
                <p>
                    <a href="/en/about-us/the-book" data-rit-tabid="122">
                        <img alt="Business Broker Buch: Unternehmen erfolgreich kaufen und verkaufen" src="<?php echo $tp_options['left-banner']['url']; ?>" />
                    </a> 
                    <span>NEW Business Broker</span> 
                    <strong>Practice Guide</strong> 
                    <a class="callToAction_buttonText" href="/en/about-us/the-book" data-rit-tabid="122">Order</a>
                </p>
            </article>
        </nav>
        <section>
            <header id="dnn_TopPane">
                <img
                    src="<?php echo $tp_options['logo-image']['url']; ?>"
                    alt="Business Broker Logo"
                    title="Firma kaufen &amp; verkaufen mit Business Broker"
                    data-rit-rwd-hide="mobile" /> 
                <?php if(has_post_thumbnail('blog-page')):?>
                	<?php the_post_thumbnail('blog-page'); ?>
                <?php else: ?>
                	<img src="<?php bloginfo('template_url'); ?>/images/thumbnail.jpg">
                <?php endif; ?>
            </header>