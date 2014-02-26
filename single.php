<?php
/**
 * @package WordPress
 * @subpackage emcc
 */

get_header(); ?>
<body>

	<div class="body">
    
    	<?php include 'includes/header.php'; ?>
        
        <div class="content">
        	<div class="strap" style="padding-bottom:8px">
        	
        	<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2012/05/news-small-11.jpg" border="0" />

			

            	<div class="badge"><a href="<?php bloginfo('url'); ?>/ethics-standards/eqa/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-eqa.jpg" width="184" height="64" alt="EMCC European Quality Award" /></a></div>
            	<div class="badge"><a href="<?php bloginfo('url'); ?>/ethics-standards/eia/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-eia.jpg" width="184" height="64" alt="EMCC European Individual Accreditation" /></a></div>
            	<div class="badge" style="margin-right:0px;"><a href="<?php bloginfo('url'); ?>/membership/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-membership.jpg" width="184" height="64" alt="EMCC UK Membership" /></a></div>
            </div>
            
            <div class="clear"></div>
            
            <div class="colLeft">
            	<?php include 'includes/news.php'; ?>
            </div>
            
            <div class="colMain">
            <h1><?php the_title(); ?></h1><?php $content = get_post($post_ID);
$content = $content ->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content; ?>




            </div>
            
            <div class="colRight">
				<?php
					if($post->post_parent != 0)
					{
						if($depth == 2)
							$pages = get_pages('parent='.$post->post_parent.'&child_of='.$post->post_parent.'&post_type=page&sort_column=menu_order&sort_order=ASC');
						else
							$pages = get_pages('parent='.$post->ID.'&child_of='.$post->ID.'&post_type=page&sort_column=menu_order&sort_order=ASC&exclude=2');
						
						if(sizeof($pages) > 0)
						{
							echo '<div class="subsubnavi">';
							for($i=0; $i<sizeof($pages); $i++)
							{
								echo '<div class="subsubnaviItem">';
								echo '<a ';
								if($pages[$i]->ID == $post->ID)
									echo 'class="active" ';
								echo 'href="/'.$pages[$i]->post_name.'/" title="Go to '.$pages[$i]->post_title.'">'.$pages[$i]->post_title.'</a>';
								echo '</div>';
							}
							echo '</div>';
						}
					}
                ?>
                
                
             <div> <?php get_search_form( $echo ); ?> <br/></div>
             
            	<?php include 'includes/stories.php'; ?>
            </div>
        </div>
    	
		<?php include 'includes/cufon.php'; ?>
        
    	<?php get_footer() ?>