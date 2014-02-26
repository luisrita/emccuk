<?php
/**
 * @package WordPress
 * @subpackage emcc
 Template Name: toplevel
 */

get_header(); ?>
<body>

	<div class="body">
    
    	<?php include 'includes/header.php'; ?>
        
        <div class="content">
        	<div class="banner">
				<?php 
            	$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
				if($image[0] != '') echo '<img src="'.$image[0].'" />'; ?>
                <?php include 'includes/badgeBanners.php'; ?>
            </div>
            <?php include 'includes/badges.php'; ?>
            <div class="clear"></div>
            
            <div class="colLeft">
            	<?php include 'includes/news.php'; ?>
            </div>
            
            <div class="colMain"><?php $content = get_post($post_ID);
$content = $content ->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content; ?>
            </div>
            
            <div class="colRight">
            
             <div> <?php get_search_form( $echo ); ?> <br/></div>
            	<?php include 'includes/stories.php'; ?>
            </div>
        </div>
    	
        <?php include 'includes/cufon.php'; ?>
        
    	<?php get_footer() ?>
