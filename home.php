<?php
/**
 * @package WordPress
 * @subpackage emcc
 Template Name: home
 */

get_header(); ?>
<body>

	<div class="body">
    
    	<?php include 'includes/header.php'; ?>
        
        <div class="content">
        	<?php
                $banners = get_posts('category=2&orderby=menu_order&order=ASC&numberposts=-1');
				for($i=0; $i<sizeof($banners); $i++)
				{
					$image = substr($banners[$i]->post_content, strpos($banners[$i]->post_content, '/wp-content'));
					$image = substr($image, 0, strpos($image, '"'));
					$bannersList[] = array($image, $banners[$i]->post_title, $banners[$i]->post_excerpt);
				}
                
                echo '<script type="text/javascript">'."\n";
                echo 'var banners = new Array();'."\n";
                for($i=0; $i<sizeof($bannersList); $i++)
                {
                    echo 'banners['.$i.'] = new Array("'.$bannersList[$i][0].'", "'.$bannersList[$i][1].'", "'.$bannersList[$i][2].'");'."\n";
                }
				
                echo 'function preload(arrayOfImages) ';
                echo '{';
                echo '	$(arrayOfImages).each(function(){';
                echo '		(new Image()).src = this;';
                echo '	});';
                echo '}';
                echo 'preload([';
				echo '"/wp-content/themes/emcc/badgeHigh-eia.jpg",';
				echo '"/wp-content/themes/emcc/badgeHigh-eqa.jpg",';
				echo '"/wp-content/themes/emcc/badgeHigh-membership.jpg",';
                for($i=0; $i<sizeof($bannersList); $i++)
                {
                    echo '"'.$bannersList[$i][0].'"';
                    if($i< sizeof($bannersList))
                        echo ',';
                }
                echo ']);';

                echo '</script>'."\n";
            ?>
            <div class="banner">
            	<div class="bannerInner1"></div><div class="bannerInner2"></div>
                <?php include 'includes/badgeBanners.php'; ?>
            </div>
            
            <?php include 'includes/badges.php'; ?>
            
            <div class="clear"></div>
            
            <div class="colLeft">
            	<?php include 'includes/news.php'; ?>
            </div>
            
            <div class="colMain">
           <?php $content = get_post($post_ID);
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
