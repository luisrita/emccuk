<?php
/**
 * @package WordPress
 * @subpackage emcc
 template name: news
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
            
            <div class="colMain">
           
                        
<?php $news = query_posts('cat=4');

for($i=0; $i<sizeof($news); $i++)
{
 echo '<div class="newsStory">';
 echo '<div class="newsStoryHeader"><a href="/'.$news[$i]->post_name.'/">'.$news[$i]->post_title.'</a></div>';
 echo '<div style="color: #757575; font-size: 13px;">'.$news[$i]->post_excerpt.'</div>';
 echo '<br/><a href="/'.$news[$i]->post_name.'/">more...</a>';
 echo '</div>';
}
?>
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