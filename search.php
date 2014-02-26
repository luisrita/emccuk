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
        	
        	<img src="<?php echo get_post_meta($post->ID, 'strapimage', true); ?>" border="0" />
<div class="badge"><a href="http://emccuk.org/ethics-standards/eqa/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-eqa.jpg" width="184" height="64" alt="EMCC European Quality Award" /></a></div>
            	<div class="badge"><a href="http://emccuk.org/ethics-standards/eia/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-eia.jpg" width="184" height="64" alt="EMCC European Individual Accreditation" /></a></div>
            	<div class="badge" style="margin-right:0px;"><a href="http://emccuk.org/membership/"><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/badge-membership.jpg" width="184" height="64" alt="EMCC UK Membership" /></a></div>
            </div>
            
            <div class="clear"></div>
            
            <div class="colLeft">
            &nbsp;
            </div>
            
            <div class="colMain">
            <h1>Search Results: </h1>
            <p>You searched for " <?php the_search_query() ?> ". Here are the results & the pages associated:</p>
            <hr>
           	<?php while (have_posts()) : the_post(); ?>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<?php the_excerpt(); ?>
				
		<?php endwhile; ?>            

		<div class="navigation">
		<br>
		<?php wp_pagenavi( array( 'options' => PageNavi_Core::$options->get_defaults() ) ); ?>
		<br></div>

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
        
  <div class="footer">
        	<div class="footerNavi">
            	<a href="http://emccuk.org/sitemap.xml" target="_blank">Sitemap</a>
                <a href="http://emccuk.org/about-us/contact-us/">Contact Us</a>
                <a href="">Resources</a>
                <a href="">Terms of Use</a>
                <a href="">Privacy Policy</a>
                <span class="blue">&copy; EMCCUK 2012</span>
            </div>
            
            <div class="social">
            	<div class="socialIcon"><a href=""><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/icon-twitter.gif" width="24" height="25" alt="Twitter" /></a></div>
            	<div class="socialIcon"><a href=""><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/icon-facebook.gif" width="24" height="25" alt="Facebook" /></a></div>
            	<div class="socialIcon"><a href=""><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/icon-linkedin.gif" width="24" height="25" alt="LinkedIn" /></a></div>
            </div>
            
            <div class="accreditation">
            	<img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/logo-eia.gif" alt="EMCC European Individual Accreditation" />
            	<img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/logo-eqa.gif" alt="EMCC European Quality Award" />
            </div>
            
                       
            <div class="resources">
            	<a href=""><img src="<?php bloginfo('url');?>/wp-content/themes/emcc/images/resources-downloads.gif" width="184" height="81" alt="Resources & Downloads" /></a>
            </div>
        </div>